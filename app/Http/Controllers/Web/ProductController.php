<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ProductController extends Controller
{
    public function productList($slug,$id)
    {
        $products = DB::table('products')
            ->where('category_id',$id)
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
            ->limit(4)
    		->get();

        $product_sizes = DB::table('product_size')
            ->where('p_id', $product_id)
            ->get();

        $product_options = DB::table('product_option')
            ->where('p_id', $product_id)
            ->get();
        $product_images = DB::table('product_images')->where('product_id',$product_id)->get();
        
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
    	return view('web.product.shop-single', ['product_detail' => $product_detail, 'related_product' => $related_product, 'product_sizes' => $product_sizes, 'option' => $option,'product_images'=>$product_images]);
    }

    public function productDetailPriceFetch(Request $request)
    {
        $this->validate($request, [
            'product_id'   => 'required',
            'size_id' => 'required',
            'size_value' => 'required',
        ]);

        $p_id = $request->input('product_id');
        $size_id = $request->input('size_id');
        $size_value = $request->input('size_value');

        $option_id = $request->input('option_id');
        $option_detail_id = $request->input('option_detail_id');
        return $option_detail_id;

    }
}
