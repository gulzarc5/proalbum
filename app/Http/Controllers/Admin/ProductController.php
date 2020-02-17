<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use DB;
use Image;
use File;
use Illuminate\Contracts\Encryption\DecryptException;
use DataTables;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function productList()
    {
        return view('admin.products.product_list');
    }

    public function productListAjax()
    {
        $query = DB::table('products')
        ->select('products.*','category.name as cat_name')
        ->leftjoin('category','category.id','=','products.category_id')
        ->orderBy('id','desc');
        return datatables()->of($query->get())
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn ='<a href="#" class="btn btn-warning btn-sm" >Edit</a>
                <a href="'.route('admin.product_option_form',['p_id'=>encrypt($row->id)]).'" class="btn btn-warning btn-sm">Edit Options</a>
                <a href="'.route('admin.product_single_view',['p_id'=>encrypt($row->id)]).'" class="btn btn-info btn-sm" target="_blank">View</a>';
                return $btn;
            })
            ->addColumn('status_tab', function($row){
                if ($row->status == '1') {
                    $btn = '<button class="btn btn-sm btn-success">Enabled</button>';
                } else {
                    $btn = '<button class="btn btn-sm btn-danger">Disabled</button>';
                }
                
                return $btn;
            })
            ->rawColumns(['action','status_tab'])
            ->make(true);
    }

    public function singleView($product_id)
    {
        try {
            $product_id = decrypt($product_id);
        }catch(DecryptException $e) {
            abort(404);
        }
        $product = DB::table('products')
            ->select('products.*','category.name as cat_name')
            ->leftjoin('category','category.id','=','products.category_id')
            ->where('products.id',$product_id)
            ->first();
        $product_images = DB::table('product_images')
            ->where('product_id',$product_id)
            ->get();
        $option = DB::table('product_option')->where('p_id',$product_id)->get();
        $size = DB::table('product_size')->where('p_id',$product_id)->get();

        if ($option->count() > 0) {
            foreach ($option as $key => $value) {
                $option_details = DB::table('product_option_details')->where('option_id',$value->id)->get();
                $value->option_details = $option_details;
                foreach ($option_details as $key => $value1) {
                    $option_details_price = DB::table('product_option_details_price')
                        ->select('product_option_details_price.*','product_size.display_name as size_name')
                        ->join('product_size','product_size.id','=','product_option_details_price.size_id')
                        ->where('option_details_id',$value1->id)->get();
                    $value1->option_details_price = $option_details_price;
                }
            }
        }
        return view('admin.products.product_detail',compact('option','size','product','tab','product_images'));
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
            'p_prefix' => 'required',
            'p_code' => 'required',
            'img.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'category' => 'required',
            'unit' => 'required',
            'dpi' => 'required',
            'swidth.*' => 'required',
            'sheight.*' => 'required',
            'displaysize.*' => 'required',
            'sprice.*' => 'required',
            'sheet_type' => 'required',
            'option' => 'required',
            'shot_desc' => 'required',
        ]);

        $name = $request->input('name');
        $slug = Str::slug($request->input('name'), '-');
        $p_prefix = $request->input('p_prefix');
        $p_code = $request->input('p_code');

        $category = $request->input('category');
        $unit = $request->input('unit');
        $dpi = $request->input('dpi');
        $swidth = $request->input('swidth'); // Array of Size Width
        $sheight = $request->input('sheight'); // Array of Size Height
        $displaysize = $request->input('displaysize'); // Array of Size Display        
        $sprice = $request->input('sprice'); // Array of Size Price
        $sheet_type = $request->input('sheet_type');        
        $sheet_type_name = null;
        $sheet_type_value = null;

        $option = $request->input('option'); // Array Of Options
        $shot_desc = $request->input('shot_desc');
        $desc_title = $request->input('desc_title');
        $long_desc = $request->input('long_desc');
        $product_code = $p_prefix."-".$p_code;

        if (isset($sheet_type) && !empty($sheet_type)) {
            if ($sheet_type == 1) {
                $sheet_type_name = $request->input('page_display');
                $sheet_type_value = $request->input('page_value');
                $sheet_type_price = $request->input('page_price');
            } elseif ($sheet_type == 2) {
                $sheet_type_name = $request->input('spread_display');
                $sheet_type_value = $request->input('spread_value');
                $sheet_type_price = $request->input('spread_price');
            } else{
                $sheet_type_name = $request->input('quantity_display');
                $sheet_type_value = $request->input('quantity_value');
                $sheet_type_price = $request->input('quantity_price');
            }
            
        }
        $image_name = null;

        ////////////Product
        $product = DB::table('products')->insertGetId([
            'name' => $name,
            'slug' => $slug,
            'product_code' => $product_code,
            'category_id' => $category,
            'unit' => $unit,
            'dpi' => $dpi,
            'sheet_type' => $sheet_type,
            'sheet_name' => $sheet_type_name,
            'sheet_value' => $sheet_type_value,
            'sheet_price' => $sheet_type_price,
            'p_short_desc' => $shot_desc,
            'p_long_description_title' => $desc_title,
            'p_long_description' => $long_desc,
            'created_at' => Carbon::now()->setTimezone('Asia/Kolkata')->toDateTimeString(),
            'updated_at' => Carbon::now()->setTimezone('Asia/Kolkata')->toDateTimeString(),
        ]);

        if ($product) {

            /** Images Upload **/
            if ($request->hasFile('img')) {
                
                for ($i=0; $i < count($request->file('img')); $i++) { 
                    
                    $image = $request->file('img')[$i];  
                    $image_name = $i.time().date('Y-M-d').'.'.$image->getClientOriginalExtension();

                    if ($i == 0)
                        $banner = $image_name;

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

                    DB::table('product_images')
                        ->insert([
                            'product_id' => $product,
                            'images' => $image_name
                        ]);
                }

                DB::table('products')
                    ->where('id', $product)
                    ->update([
                        'image' => $banner
                    ]);
            }

            //////////////Size Insert//////////
            if (isset($swidth) && !empty($swidth)) {
                $sort_size = 1;
                for ($i=0; $i < count($swidth); $i++) { 
                   if (isset($swidth[$i]) && isset($sheight[$i]) && isset($displaysize[$i]) && !empty($swidth[$i]) && !empty($sheight[$i]) && !empty($displaysize[$i]) && isset($sprice[$i]) && !empty($sprice[$i])) {
                    DB::table('product_size')->insert([
                        'p_id' => $product,
                        'width' => $swidth[$i],
                        'height' => $sheight[$i],
                        'display_name' => $displaysize[$i],
                        'extra_page_price' => $sprice[$i],
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
                        'sort' => $sort_option,
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

    public function productOptionForm($product_id,$tab = null)
    {
        try {
            $product_id = decrypt($product_id);
        }catch(DecryptException $e) {
            abort(404);
        }

        $option = DB::table('product_option')->where('p_id',$product_id)->get();
        $size = DB::table('product_size')->where('p_id',$product_id)->get();
        $product = DB::table('products')->where('id',$product_id)->first();
        if ($option->count() > 0) {
            foreach ($option as $key => $value) {
                $option_details = DB::table('product_option_details')->where('option_id',$value->id)->get();
                $value->option_details = $option_details;
                foreach ($option_details as $key => $value1) {
                    $option_details_price = DB::table('product_option_details_price')
                        ->select('product_option_details_price.*','product_size.display_name as size_name')
                        ->join('product_size','product_size.id','=','product_option_details_price.size_id')
                        ->where('option_details_id',$value1->id)->get();
                    $value1->option_details_price = $option_details_price;
                }
            }
        }
        // dd($option);
        return view('admin.products.add_product_option',compact('option','size','product','tab'));
    }

    public function productOptionAddd(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'size_id.*' => 'required',
            'price.*' => 'required',
            'option_id' => 'required',
            'pro_id' => 'required',
            'main_option_id' => 'required',
        ]);
        $file = null;
        $product_id = $request->input('pro_id');
        $main_option_id = $request->input('main_option_id');

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $file   = time().date('Y-m-d').'.'.$image->getClientOriginalExtension();
            //Category Thumbnail
            $destinationPath = public_path('/assets/option_image/thumb');
            $img = Image::make($image->getRealPath());
            $img->resize(400, 400, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$file);
         
            //Category Original Image
            $destinationPath = public_path('/assets/option_image');
            $img = Image::make($image->getRealPath());
            $img->save($destinationPath.'/'.$file);
        }

        $addOption = DB::table('product_option_details')
            ->insertGetId([
                'option_id' => $request->input('option_id'),
                'name' => $request->input('name'),
                'image' => $file,
                'created_at' => Carbon::now()->setTimezone('Asia/Kolkata')->toDateTimeString(),
                'updated_at' => Carbon::now()->setTimezone('Asia/Kolkata')->toDateTimeString(),
            ]);
        if ($addOption) {
            $size_id = $request->input('size_id'); //Array of size Id
            $price = $request->input('price'); // Array of Product price
            for ($i=0; $i < count($size_id); $i++) { 
                $option_detail_price = DB::table('product_option_details_price')
                ->insert([
                    'option_details_id' => $addOption,
                    'size_id' => $size_id[$i],
                    'price' => $price[$i],
                    'created_at' => Carbon::now()->setTimezone('Asia/Kolkata')->toDateTimeString(),
                    'updated_at' => Carbon::now()->setTimezone('Asia/Kolkata')->toDateTimeString(),
                ]);
            }
            return redirect()->route('admin.product_option_form',['p_id'=>encrypt($product_id),'tab'=>$main_option_id]);
        }else{
            return redirect()->route('admin.product_option_form',['p_id'=>encrypt($product_id),'tab'=>$main_option_id]);
        }
    }

    public function productOptionEdit(Request $request)
    {
        $request->validate([
            'option_detail_id' => 'required',
            'option_name' => 'required',   
            'pro_id' => 'required',
            'main_option_id' => 'required',         
        ]);
        $product_id = $request->input('pro_id');
        $main_option_id = $request->input('main_option_id');

        $option_details_price_id = $request->input('option_size_id'); // Array of ids
        $option_details_price = $request->input('option_size_price'); // array of prices
        $file = null;
        if ($request->hasFile('img')) {
            $request->validate([           
                'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            ]);
            $image = $request->file('img');
            $file   = time().date('Y-m-d').'.'.$image->getClientOriginalExtension();
            //Category Thumbnail
            $destinationPath = public_path('/assets/option_image/thumb');
            $img = Image::make($image->getRealPath());
            $img->resize(400, 400, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$file);
         
            //Category Original Image
            $destinationPath = public_path('/assets/option_image');
            $img = Image::make($image->getRealPath());
            $img->save($destinationPath.'/'.$file);

            DB::table('product_option_details')
                ->where('id',$request->input('option_detail_id'))
                ->update([
                    'image' => $file,
                    'updated_at' => Carbon::now()->setTimezone('Asia/Kolkata')->toDateTimeString(),
                ]);
        }

        $option_update = DB::table('product_option_details')
            ->where('id',$request->input('option_detail_id'))
            ->update([
                'name' => $request->input('option_name'),                
                'updated_at' => Carbon::now()->setTimezone('Asia/Kolkata')->toDateTimeString(),
            ]);
        if ($option_update) {
            if (isset($option_details_price_id) && !empty($option_details_price_id) && (count($option_details_price_id) > 0)) {
                for ($i=0; $i < count($option_details_price_id); $i++) { 
                    if (isset($option_details_price_id[$i]) && isset($option_details_price[$i]) && !empty($option_details_price_id[$i]) && !empty($option_details_price[$i])) {
                        $option_detail_price = DB::table('product_option_details_price')
                        ->where('id',$option_details_price_id[$i])
                        ->update([
                            'price' => $option_details_price[$i],
                            'updated_at' => Carbon::now()->setTimezone('Asia/Kolkata')->toDateTimeString(),
                        ]);
                    }                   
                }
            }

            return redirect()->route('admin.product_option_form',['p_id'=>encrypt($product_id),'tab'=>$main_option_id]);
        } else {
            return redirect()->route('admin.product_option_form',['p_id'=>encrypt($product_id),'tab'=>$main_option_id]);
        }
    }


}
