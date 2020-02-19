<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;
use DB;
use Illuminate\Contracts\Encryption\DecryptException;

class CustomerController extends Controller
{
    public function customerList()
    {
        return view('admin.customer.customer_list');
    }

    public function customerListAjax()
    {
        $query = DB::table('users')
        ->orderBy('id','desc');
        return datatables()->of($query->get())
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn ='<a href="'.route('admin.customer_details',['id'=>encrypt($row->id)]).'" class="btn btn-info btn-sm" target="_blank">View</a>';
                return $btn;
            })
            ->addColumn('profile_type', function($row){
                if ($row->profile_type == '1') {
                    $btn = '<button class="btn btn-sm btn-success">Lab Owner</button>';
                } elseif($row->profile_type == '2'){
                    $btn = '<button class="btn btn-sm btn-info">Distributor</button>';
                }else{
                    $btn = '<button class="btn btn-sm btn-primary">Studio/Photographer</button>';
                }
                
                return $btn;
            })
            ->rawColumns(['action','profile_type'])
            ->make(true);
    }

    public function customerDetails($id)
    {
        try {
            $id = decrypt($id);
        }catch(DecryptException $e) {
            abort(404);
        }

        $customer = DB::table('users')->where('id',$id)->first();
        return view('admin.customer.customer_detail',compact('customer'));
    }
}
