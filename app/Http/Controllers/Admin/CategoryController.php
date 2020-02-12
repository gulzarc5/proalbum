<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use DB;
use Image;
use Str;
use File;

class CategoryController extends Controller
{
    public function categoryAdd()
    {
        return view('admin.category.add_category');
    }

    public function categoryInsert(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'desc' => 'required',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'page_title' => 'required',
            'meta_desc' => 'required',
            'meta_tag' => 'required'
        ]);

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $file   = time().date('Y-m-d').'.'.$image->getClientOriginalExtension();

            //Category Thumbnail
            $destinationPath = public_path('/assets/category/thumbnail');
            $img = Image::make($image->getRealPath());
            $img->resize(150, 150, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$file);
         
            //Category Original Image
            $destinationPath = public_path('/assets/category');
            $img = Image::make($image->getRealPath());
            $img->save($destinationPath.'/'.$file);

            DB::table('category')
                ->insert([ 
                    'name' => $request->input('name'), 
                    'url_slug' => strtolower(Str::slug($request->input('slug'), '-')),
                    'image' => $file, 
                    'description' => $request->desc,
                    'seo_page_title' => $request->input('page_title'), 
                    'seo_meta_desc' => $request->input('meta_desc'), 
                    'seo_meta_keward' => $request->input('meta_tag'), 
                    'created_at' => Carbon::now()->setTimezone('Asia/Kolkata')->toDateTimeString(),
                    'updated_at' => Carbon::now()->setTimezone('Asia/Kolkata')->toDateTimeString(),
                ]);

            return redirect()->back()->with('message', 'Category has been added successfully');

        } else 
            return redirect()->back()->with('message', 'Please ! select a image');
    }

    public function ckEditorImageUpload(Request $request)
    {
        if($request->hasFile('upload')) {
            //get filename with extension
            $filenamewithextension = $request->file('upload')->getClientOriginalName();
       
            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
       
            //get file extension
            $extension = $request->file('upload')->getClientOriginalExtension();
       
            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;
       
            //Upload File
            // $request->file('upload')->storeAs('assets/category/ckeditor/', $filenametostore);

            $request->file('upload')->move(public_path('assets/category/ckeditor'), $filenametostore);
     
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('assets/category/ckeditor/'.$filenametostore); 
            $msg = 'Image successfully uploaded'; 
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
              
            // Render HTML output 
            @header('Content-type: text/html; charset=utf-8'); 
            echo $re;
        }
    }

    public function showCategoryList(Request $request)
    {
        $categories = DB::table('category')->get();

        return view('admin.category.category_list', ['categories' => $categories]);
    }

    public function showCategoryEditForm($category_id) 
    {
        try {
            $category_id = decrypt($category_id);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        $category_record = DB::table('category')
            ->where('id', $category_id)
            ->first();

        return view('admin.category.edit_category', ['category_record' => $category_record]);
    }

    public function updateCategory(Request $request) 
    {
        try {
            $category_id = decrypt($request->input('category_id'));
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        $validatedData = $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'desc' => 'required',
            'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'page_title' => 'required',
            'meta_desc' => 'required',
            'meta_tag' => 'required',
            'sort' => 'required|numeric'
        ]);

        $category_record = DB::table('category')
            ->where('id', $category_id)
            ->first();

        DB::table('category')
            ->where('id', $category_id)
            ->update([ 
                'name' => $request->input('name'), 
                'url_slug' => strtolower(Str::slug($request->input('slug'), '-')),
                'description' => $request->desc,
                'seo_page_title' => $request->input('page_title'), 
                'seo_meta_desc' => $request->input('meta_desc'), 
                'seo_meta_keward' => $request->input('meta_tag'), 
                'sort' => $request->input('sort'), 
                'updated_at' => Carbon::now()->setTimezone('Asia/Kolkata')->toDateTimeString(),
            ]);

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $file   = time().'.'.$image->getClientOriginalExtension();

            //Deleting old file
            File::delete(public_path('/assets/category/thumbnail/'.$category_record->image));
            File::delete(public_path('/assets/category/'.$category_record->image));

            //Category Thumbnail
            $destinationPath = public_path('/assets/category/thumbnail');
            $img = Image::make($image->getRealPath());
            $img->resize(150, 150, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$file);
         
            //Category Original Image
            $destinationPath = public_path('/assets/category');
            $img = Image::make($image->getRealPath());
            $img->save($destinationPath.'/'.$file);

            DB::table('category')
                ->where('id', $category_id)
                ->update([ 
                    'image' => $file
                ]);

            return redirect()->back()->with('message', 'Category has been added successfully');
        }

        return redirect()->back()->with('message', 'Category has been updated successfully');
    }

    public function updateCategoryStatus($category_id, $status) 
    {
        try {
            $category_id = decrypt($category_id);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        try {
            $status = decrypt($status);
        }catch(DecryptException $e) {
            return redirect()->back();
        }

        DB::table('category')
            ->where('id', $category_id)
            ->update([ 
                'status' => $status
            ]);

        return redirect()->back();
    }
}
