<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ProductController extends Controller
{
    public function productList()
    {
    	$products = DB::table('products')
    		->where('status', 1)
    		->get();

    	return view('web.product.shop-list', ['products' => $products]);
    }

    public function productDetail($slug, $product_id) {

    	$product_detail = DB::table('products')
    		->where('id', $product_id)
    		->first();

    	$related_product = DB::table('products')
    		->where('category_id', $product_detail->category_id)
    		->get();

    	return view('web.product.shop-single', ['product_detail' => $product_detail, 'related_product' => $related_product]);
    }
}
