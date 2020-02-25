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
        return view('admin.orders.order_detail');
    }
}
