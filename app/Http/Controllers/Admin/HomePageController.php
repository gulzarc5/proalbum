<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\HomePage;
use Image;
use File;
use DB;

use Illuminate\Support\Str;

class HomePageController extends Controller
{
    public function homeEdit()
    {
        $home_page = HomePage::where('id',1)->first();
        return view('admin.home_page.home_page',compact('home_page'));
    }

    public function homeUpdate(Request $request)
    {
        $home_page = HomePage::find(1);

        /** Header Logo **/
        if ($request->hasFile('header_logo')) {   

            $request->validate([
                'header_logo.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            ]); 
                
            $image = $request->file('header_logo');  
            $image_name = uniqid().time().date('Y-M-d').'.'.$image->getClientOriginalExtension();                
            //Category Original Image
            $destinationPath = public_path('/assets/home_page');
            $img = Image::make($image->getRealPath());
            $img->save($destinationPath.'/'.$image_name);     

            $home_page->header_logo = $image_name;
        }
         /** Footer Logo **/
        if ($request->hasFile('footer_logo')) {   

            $request->validate([
                'footer_logo.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            ]); 
                
            $image = $request->file('footer_logo');  
            $image_name = uniqid().time().date('Y-M-d').'.'.$image->getClientOriginalExtension();                
            //Category Original Image
            $destinationPath = public_path('/assets/home_page');
            $img = Image::make($image->getRealPath());
            $img->save($destinationPath.'/'.$image_name);     

            $home_page->footer_logo = $image_name;
        }
          /** Footer Logo **/
        if ($request->hasFile('banner')) {   

            $request->validate([
                'banner.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            ]); 
                
            $image = $request->file('banner');  
            $image_name = uniqid().time().date('Y-M-d').'.'.$image->getClientOriginalExtension();                
            //Category Original Image
            $destinationPath = public_path('/assets/home_page');
            $img = Image::make($image->getRealPath());
            $img->save($destinationPath.'/'.$image_name);     

            $home_page->banner = $image_name;
        }

        $home_page->pro_cat_heading = $request->input('pro_heading');
        $home_page->pro_cat_tag = $request->input('pro_tag');
        $home_page->pro_cat_1 = $request->input('pro_cat_1');
        $home_page->pro_cat_2 = $request->input('pro_cat_2');
        $home_page->pro_cat_3 = $request->input('pro_cat_3');
        $home_page->pro_cat_4 = $request->input('pro_cat_4');

        $home_page->top_cat_heading = $request->input('top_heading');
        $home_page->top_cat_tag = $request->input('top_tag');

        $home_page->home_video = $request->input('video');

        $home_page->order_heading = $request->input('order_heading');
        $home_page->order_tag = $request->input('order_tag');

        $home_page->footer_address = $request->input('address');
        $home_page->footer_phone = $request->input('phone');
        $home_page->footer_email = $request->input('email');
        
        $home_page->save();
        return redirect()->back()->with('message','Home Page Data Updated Successfully');

    }

    public function firstCategory()
    {
        $home_page = HomePage::where('id',1)->first();
        $first_cat = DB::table('products')->where('best_seller',2)->get();
        return view('admin.home_page.first_cat',compact('home_page','first_cat'));
    }

    public function secondCategory()
    {
        $home_page = HomePage::where('id',1)->first();
        $second_cat = DB::table('products')->where('new_arrival',2)->get();
        return view('admin.home_page.second_cat',compact('home_page','second_cat'));
    }

    public function thirdCategory()
    {
        $home_page = HomePage::where('id',1)->first();
        $third_cat = DB::table('products')->where('feature_product',2)->get();
        return view('admin.home_page.third_cat',compact('home_page','third_cat'));
    }

    public function fourthCategory()
    {
        $home_page = HomePage::where('id',1)->first();
        $fourth_cat = DB::table('products')->where('weeding',2)->get();
        return view('admin.home_page.fourth_cat',compact('home_page','fourth_cat'));
    }
}
