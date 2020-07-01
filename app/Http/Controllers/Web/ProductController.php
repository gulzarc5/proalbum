<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ProductController extends Controller
{
    public function productList($slug,$id)
    {
        $category = DB::table('category')
            ->where('id',$id)
            ->first();
        $products = DB::table('products')
            ->where('category_id',$id)
    		->where('status', 1)
            ->get();
    	return view('web.product.shop-list',compact('category','products'));
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

        
        $option_detail_id = $request->input('option_detail_id');
        $price = 0;
        
        $product = DB::table('products')
            ->select('id','sheet_value','sheet_price')
            ->where('id',$p_id)
            ->first();
        if ($product) {
            $price = $product->sheet_price;
            if ($size_value >= $product->sheet_value) {
                $size = DB::table('product_size')->select('extra_page_price')->where('id',$size_id)->first();
                if ($size) {
                    $extra_sheet = ($size_value - $product->sheet_value);
                    $extra_shheet_price = ($extra_sheet * $size->extra_page_price);
                    $price +=$extra_shheet_price;
                }
            }

            foreach ($option_detail_id as $key => $value) {
                if (isset($value[0]) && !empty($value[0])) {
                    // print "option id  ".$key." Option value id ".$value[0]."<br>";
                    $option_price = DB::table('product_option_details_price')
                        ->select('price')
                        ->where('option_details_id',$value[0])
                        ->where('size_id',$size_id)
                        ->first();
                    if ($option_price) {
                        $price +=$option_price->price;
                    }
                }
            }           
        }
        return $price;       
    }
}
