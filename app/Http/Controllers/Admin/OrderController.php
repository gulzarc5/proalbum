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
            $btn ='<a href="'.route('admin.order_details',['order_id'=>encrypt($row->id)]).'" class="btn btn-info btn-sm" target="_blank">View</a>
            <a href="#" class="btn btn-danger btn-sm" target="_blank">Cancel</a>';
            return $btn;
        })
        ->addColumn('status_tab', function($row){
            if ($row->order_status == '1') {
                $btn = '<button class="btn btn-sm btn-info">Processing</button>';
            } elseif($row->order_status == '2'){
                $btn = '<button class="btn btn-sm btn-warning">Waiting For Dispatch</button>';
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
        # code...
    }
}
