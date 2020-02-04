<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use DB;

class ProductController extends Controller
{
    public function productList()
    {
        return view('admin.products.product_list');
    }

    public function productAddForm()
    {
        $category = DB::table('category')->where('status',1)->get();
        $unit = DB::table('units')->get();
        return view('admin.products.add_product',compact('category','unit'));
    }
}
