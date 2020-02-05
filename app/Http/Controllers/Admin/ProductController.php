<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use DB;
use Image;
use File;

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

    public function productAdd(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'p_prefix' => 'required',
            'p_code' => 'required',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'category' => 'required',
            'unit' => 'required',
            'dpi' => 'required',

            'swidth.*' => 'required',
            'sheight.*' => 'required',
            'displaysize.*' => 'required',

            'sheet_type' => 'required',
            'option' => 'required',
            'shot_desc' => 'required',
        ]);

        $name = $request->input('name');
        $slug = $request->input('slug');
        $p_prefix = $request->input('p_prefix');
        $p_code = $request->input('p_code');

        $category = $request->input('category');
        $unit = $request->input('unit');
        $dpi = $request->input('dpi');
        $swidth = $request->input('swidth'); // Array of Size Width
        $sheight = $request->input('sheight'); // Array of Size Height
        $displaysize = $request->input('displaysize'); // Array of Size Display
        $sheet_type = $request->input('sheet_type');        
        $sheet_type_name = null;
        $sheet_type_value = null;

        $option = $request->input('option'); // Array Of Options
        $shot_desc = $request->input('shot_desc');
        $desc_title = $request->input('desc_title');
        $long_desc = $request->input('long_desc');
        $seo_page_title = $request->input('seo_page_title');
        $seo_meta_desc = $request->input('seo_meta_desc');
        $seo_meta_tag = $request->input('seo_meta_tag');

        $product_code = $p_prefix.$p_code;

        if (isset($sheet_type) && !empty($sheet_type)) {
            if ($sheet_type == 1) {
                $sheet_type_name = $request->input('page_display');
                $sheet_type_value = $request->input('page_value');
            } elseif ($sheet_type == 2) {
                $sheet_type_name = $request->input('spread_display');
                $sheet_type_value = $request->input('spread_value');
            } else{
                $sheet_type_name = $request->input('quantity_display');
                $sheet_type_value = $request->input('quantity_value');
            }
            
        }
        $image_name = null;

        ///////////Image
        if ($request->hasFile('img')) {
            $image = $request->file('img');  
            $image_name   = time().date('Y-M-d').'.'.$image->getClientOriginalExtension();

            //Category Thumbnail
            $destinationPath = public_path('/assets/product/thumb');
            $img = Image::make($image->getRealPath());
            $img->resize(600, 600, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$image_name);
         
            //Category Original Image
            $destinationPath = public_path('/assets/product');
            $img = Image::make($image->getRealPath());
            $img->save($destinationPath.'/'.$image_name);
        }

        ////////////Product
        $product = DB::table('products')->insertGetId([
            'name' => $name,
            'slug' => $slug,
            'product_code' => $product_code,
            'category_id' => $category,
            'image' => $image_name,
            'unit_id' => $unit,
            'dpi' => $dpi,
            'sheet_type' => $sheet_type,
            'sheet_name' => $sheet_type_name,
            'sheet_value' => $sheet_type_value,
            'p_short_desc' => $shot_desc,
            'p_long_description_title' => $desc_title,
            'p_long_description' => $long_desc,
            'seo_page_title' => $seo_page_title,
            'seo_meta_desc' => $seo_meta_desc,
            'seo_meta_tag' => $seo_meta_tag,
            'created_at' => Carbon::now()->setTimezone('Asia/Kolkata')->toDateTimeString(),
            'updated_at' => Carbon::now()->setTimezone('Asia/Kolkata')->toDateTimeString(),
        ]);
        if ($product) {
            //////////////Size Insert//////////
            if (isset($swidth) && !empty($swidth)) {
                $sort_size = 1;
                for ($i=0; $i < count($swidth); $i++) { 
                   if (isset($swidth[$i]) && isset($sheight[$i]) && isset($displaysize[$i]) && !empty($swidth[$i]) && !empty($sheight[$i]) && !empty($displaysize[$i])) {
                    DB::table('product_size')->insert([
                        'p_id' => $product,
                        'width' => $swidth[$i],
                        'height' => $sheight[$i],
                        'display_name' => $displaysize[$i],
                        'sort' => $sort_size,
                        'created_at' => Carbon::now()->setTimezone('Asia/Kolkata')->toDateTimeString(),
                        'updated_at' => Carbon::now()->setTimezone('Asia/Kolkata')->toDateTimeString(),
                    ]);
                    $sort_size++;
                   }
                }
            }
            ////////////Product Options///////////
            if (isset($option) && !empty($option)) {
                $sort_option = 1;
                for ($i=0; $i < count($option); $i++) { 
                   if (isset($option[$i]) && isset($option[$i])) {
                    DB::table('product_option')->insert([
                        'p_id' => $product,
                        'name' => $option[$i],
                        'sort' => $sort_size,
                        'created_at' => Carbon::now()->setTimezone('Asia/Kolkata')->toDateTimeString(),
                        'updated_at' => Carbon::now()->setTimezone('Asia/Kolkata')->toDateTimeString(),
                    ]);
                    $sort_option++;
                   }
                }
            }

            return redirect()->route('admin.product_option_form',['p_id'=>encrypt($product)]);

        }else {
            return redirect()->back()->with('error','Something Went Wrong Please Try Again');
        }
        
    }

    public function productOptionForm($product_id)
    {
        try {
            $product_id = decrypt($product_id);
        }catch(DecryptException $e) {
            abort(404);
        }

        $option = DB::table('product_option')->where('p_id',$product_id)->get();
        $size = DB::table('product_size')->where('p_id',$product_id)->get();
        $product = DB::table('products')->where('id',$product_id)->first();
        return view('admin.products.add_product_option',compact('option','size','product'));
    }
}
