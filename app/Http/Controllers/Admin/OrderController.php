<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Contracts\Encryption\DecryptException;
use DataTables;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function orderList()
    {
        return view('admin.orders.order_list');
    }

    public function orderListAjax()
    {

        $oder = DB::table('orders')
            ->select('orders.*','users.name as user_name','users.email as user_email')
            ->leftjoin('users','users.id','=','orders.user_id')
            ->orderBy('orders.id','desc');
        return datatables()->of($oder->get())
        ->addIndexColumn()
        ->addColumn('action', function($row){
            $btn ='<a href="'.route('admin.order_details',['order_id'=>encrypt($row->id)]).'" class="btn btn-primary btn-sm" target="_blank">View</a>
            <a href="'.route('admin.order_invoice',['order_id'=>encrypt($row->id)]).'" class="btn btn-info btn-sm" target="_blank">View Invoice</a';
            return $btn;
        })
        ->addColumn('status_tab', function($row){
            if ($row->order_status == '1') {
                $btn = '<button class="btn btn-sm btn-info">New</button>';
            } elseif($row->order_status == '2'){
                $btn = '<button class="btn btn-sm btn-warning">Processing</button>';
            } elseif($row->order_status == '3'){
                $btn = '<button class="btn btn-sm btn-primary">Dispatched</button>';
            } elseif($row->order_status == '4'){
                $btn = '<button class="btn btn-sm btn-success">Delivered</button>';
            }else{
                $btn = '<button class="btn btn-sm btn-danger">Cancelled</button>';
            }
            return $btn;
        })
        ->rawColumns(['action','status_tab'])
        ->make(true);
    }

    public function orderDetails($order_id)
    {
        try {
            $order_id = decrypt($order_id);
        }catch(DecryptException $e) {
            abort(404);
        }
        $order = DB::table('orders')->where('id',$order_id)->first();
        if ($order) {
            $user = DB::table('users')->where('id',$order->user_id)->first();
            $shipping =  DB::table('shipping_address')->where('id',$order->address_id)->first();

            $ord_detail= DB::table('order_detail')
                ->select('order_detail.*','products.name as p_name','products.image as p_image','product_size.display_name as size_name','products.sheet_name as p_sheet_name','products.sheet_value as p_sheet_value')
                ->leftjoin('products','products.id','=','order_detail.product_id')
                ->leftjoin('product_size','product_size.id','=','order_detail.size_id')
                ->where('order_detail.order_id',$order_id)->get();
                
            if ($ord_detail->count()) {
                foreach ($ord_detail as $key1 => $value1) {
                    $ord_options = DB::table('order_options')
                        ->select('product_option.name as option_name','product_option_details.name as option_details_name')
                        ->leftjoin('product_option','product_option.id','=','order_options.option_id')
                        ->leftjoin('product_option_details','product_option_details.id','=','order_options.option_details_id')
                        ->where('order_options.order_details_id',$value1->id)
                        ->get();
                    $value1->options = $ord_options;
                }                   
            }
        }
        return view('admin.orders.order_detail',compact('order','user','shipping','ord_detail'));
    }

    public function orderStatusUpdate($order_details_id,$status)
    {
        DB::table('order_detail')
            ->where('id',$order_details_id)
            ->update([
                'order_status'=> $status,
                'cancelled_by' => 2,
            ]);
        $order_details = DB::table('order_detail')->where('id',$order_details_id)->first();
        $order_cancel_check =  DB::table('order_detail')->where('order_id',$order_details->order_id)->get();
        $cancel_status = true;
        foreach ($order_cancel_check as $key => $value) {
            if ($value->order_status < $status){
                $cancel_status = false;
                break;
            }
        }
        if ($cancel_status == true) {
                DB::table('orders')
                ->where('id',$order_details->order_id)
                ->update([
                    'order_status'=>$status,
                    'cancelled_by'=>'2',
                ]);
        }
        return redirect()->back();
    }

    public function orderInvoice($order_id)
    {
        try {
            $order_id = decrypt($order_id);
        }catch(DecryptException $e) {
            abort(404);
        }

        $order = DB::table('orders')->where('id',$order_id)->first();
        if ($order) {
            $user = DB::table('users')->where('id',$order->user_id)->first();
            $shipping =  DB::table('shipping_address')->where('id',$order->address_id)->first();

            $ord_detail= DB::table('order_detail')
                ->select('order_detail.*','products.name as p_name','products.image as p_image','product_size.display_name as size_name','products.sheet_name as p_sheet_name','products.sheet_value as p_sheet_value')
                ->leftjoin('products','products.id','=','order_detail.product_id')
                ->leftjoin('product_size','product_size.id','=','order_detail.size_id')
                ->where('order_detail.order_id',$order_id)->get();
                
            if ($ord_detail->count()) {
                foreach ($ord_detail as $key1 => $value1) {
                    $ord_options = DB::table('order_options')
                        ->select('product_option.name as option_name','product_option_details.name as option_details_name')
                        ->leftjoin('product_option','product_option.id','=','order_options.option_id')
                        ->leftjoin('product_option_details','product_option_details.id','=','order_options.option_details_id')
                        ->where('order_options.order_details_id',$value1->id)
                        ->get();
                    $value1->options = $ord_options;
                }                   
            }
        }

        return view('admin.orders.order_invoice',compact('order','user','shipping','ord_detail'));
    }
}
