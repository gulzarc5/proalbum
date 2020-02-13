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
            ->leftJoin('category', 'products.category_id', '=', 'category.id')
    		->where('products.id', $product_id)
            ->select('products.*', 'category.name as category_name')
    		->first();

    	$related_product = DB::table('products')
    		->where('category_id', $product_detail->category_id)
    		->get();

        $product_sizes = DB::table('product_size')
            ->where('p_id', $product_id)
            ->get();

        $product_options = DB::table('product_option')
            ->where('p_id', $product_id)
            ->get();

        $option = [];

        foreach ($product_options as $key => $item) {
            
            $product_options = DB::table('product_option_details')
                ->where('option_id', $item->id)
                ->get();

            $option [] = [
                'option_id' => $item->id,
                'option_name' => $item->name,
                'option_details' => $product_options
            ];
        }

        // dd($option);

    	return view('web.product.shop-single', ['product_detail' => $product_detail, 'related_product' => $related_product, 'product_sizes' => $product_sizes, 'option' => $option]);
    }
}
