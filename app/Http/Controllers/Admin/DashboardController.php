<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class DashboardController extends Controller
{
    public function dashboardView()
    {
        $total_products = DB::table('products')->count();
        $total_customers = DB::table('users')->count();
        $new_orders = DB::table('orders')->where('order_status',1)->count();        
        $processing_orders = DB::table('orders')->where('order_status',2)->count();
        $dispatched_orders = DB::table('orders')->where('order_status',3)->count();
        $last_orders = DB::table('orders')            
            ->select('orders.*','users.name as user_name','users.email as user_email')
            ->leftjoin('users','users.id','=','orders.user_id')
            ->orderBy('orders.id','DESC')
            ->limit(10)
            ->get();
        return view('admin.dashboard',compact('total_products','total_customers','new_orders','processing_orders','dispatched_orders','last_orders'));
    }
}
