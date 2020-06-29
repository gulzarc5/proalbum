<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\HomePage;
use Image;
use File;
use DB;
use App\HappyClient;
use App\PageData;

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


        if ($request->hasFile('quality1')) {   

            $request->validate([
                'quality1.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            ]); 
                
            $image = $request->file('quality1');  
            $image_name = uniqid().time().date('Y-M-d').'.'.$image->getClientOriginalExtension();                
            //Category Original Image
            $destinationPath = public_path('/assets/home_page');
            $img = Image::make($image->getRealPath());
            $img->save($destinationPath.'/'.$image_name);     

            $home_page->quality1 = $image_name;
        }

        if ($request->hasFile('quality2')) {   

            $request->validate([
                'quality2.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            ]); 
                
            $image = $request->file('quality2');  
            $image_name = uniqid().time().date('Y-M-d').'.'.$image->getClientOriginalExtension();                
            //Category Original Image
            $destinationPath = public_path('/assets/home_page');
            $img = Image::make($image->getRealPath());
            $img->save($destinationPath.'/'.$image_name);     

            $home_page->quality2 = $image_name;
        }

        if ($request->hasFile('quality3')) {   

            $request->validate([
                'quality3.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            ]); 
                
            $image = $request->file('quality3');  
            $image_name = uniqid().time().date('Y-M-d').'.'.$image->getClientOriginalExtension();                
            //Category Original Image
            $destinationPath = public_path('/assets/home_page');
            $img = Image::make($image->getRealPath());
            $img->save($destinationPath.'/'.$image_name);     

            $home_page->quality3 = $image_name;
        }

        if ($request->hasFile('quality4')) {   

            $request->validate([
                'quality4.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            ]); 
                
            $image = $request->file('quality4');  
            $image_name = uniqid().time().date('Y-M-d').'.'.$image->getClientOriginalExtension();                
            //Category Original Image
            $destinationPath = public_path('/assets/home_page');
            $img = Image::make($image->getRealPath());
            $img->save($destinationPath.'/'.$image_name);     

            $home_page->quality4 = $image_name;
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

        $home_page->happy_heading = $request->input('happy_heading');
        $home_page->happy_tag = $request->input('happy_tag');

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

    public function happyAddForm()
    {
        return view('admin.home_page.happy_client_add_form');
    }

    public function happyAdd(Request $request)
    {
        $request->validate([
            'happy_image.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
        ]);
       
        $name = $request->input('happy_name');
        $happy_image = $request->input('happy_image');
        $happy_designation = $request->input('happy_designation');
        $happy_comment = $request->input('happy_comment');


        if ($request->hasFile('happy_image')) {
        
            for ($i=0; $i < count($request->file('happy_image')); $i++) { 
                
                $image = $request->file('happy_image')[$i];  
                $image_name = $i.time().date('Y-M-d').'.'.$image->getClientOriginalExtension();

                
                //Category Original Image
                $destinationPath = public_path('/assets/home_page');
                $img = Image::make($image->getRealPath());
                $img->save($destinationPath.'/'.$image_name);

                $happy_client = new HappyClient();
                $happy_client->name = $name[$i];
                $happy_client->image = $image_name;
                $happy_client->designation = $happy_designation[$i];
                $happy_client->comment = $happy_comment[$i];
                $happy_client->save();
               
            }
        }

        return redirect()->back()->with('message',"Happy Client Data Added Successfully");

    }

    public function happyList()
    {
        $happy = HappyClient::orderBy('id','desc')->get();
        $home_page = HomePage::where('id',1)->first();

        return view('admin.home_page.happy_client_list',compact('happy','home_page'));
    }

    public function happyDelete($id)
    {
        $home_page = HappyClient::where('id',$id)->delete();

        return redirect()->back();
    }

    public function aboutUs()
    {
        $about = PageData::find(1);
        return view('admin.page_data.about',compact('about'));
    }

    public function aboutUsAdd(Request $request)
    {
        $request->validate([
            'about' => 'required',
        ]);

        $about = PageData::find(1);
        $about->about_us = $request->input('about');
        $about->save();

        return redirect()->back()->with('message','Data Updated Successfully');
    }

    public function termsCondition()
    {
        $t_c = PageData::find(1);
        return view('admin.page_data.terms_condition',compact('t_c'));
    }

    public function termsConditionAdd(Request $request)
    {
        $request->validate([
            't_c' => 'required',
        ]);

        $t_c = PageData::find(1);
        $t_c->t_c = $request->input('t_c');
        $t_c->save();

        return redirect()->back()->with('message','Data Updated Successfully');
    }


    public function returnPolicy()
    {
        $ret_policy = PageData::find(1);
        return view('admin.page_data.return_policy',compact('ret_policy'));
    }

    public function returnPolicyAdd(Request $request)
    {
        $request->validate([
            'ret_policy' => 'required',
        ]);

        $ret_policy = PageData::find(1);
        $ret_policy->return_policy = $request->input('ret_policy');
        $ret_policy->save();

        return redirect()->back()->with('message','Data Updated Successfully');
    }


    public function privacyPolicy()
    {
        $privacy_policy = PageData::find(1);
        return view('admin.page_data.privacy_policy',compact('privacy_policy'));
    }

    public function privacyPolicyAdd(Request $request)
    {
        $request->validate([
            'privacy_policy' => 'required',
        ]);

        $privacy_policy = PageData::find(1);
        $privacy_policy->privacy_policy = $request->input('privacy_policy');
        $privacy_policy->save();

        return redirect()->back()->with('message','Data Updated Successfully');
    }
}
