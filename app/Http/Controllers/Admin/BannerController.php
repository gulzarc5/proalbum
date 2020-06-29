<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Image;
use Str;
use File;
use App\Slider;

class BannerController extends Controller
{
     public function showBannerAddForm()
    {
        $slider = Slider::get();
        return view('admin.banner.add_banner',compact('slider'));
    }

    public function addBanner(Request $request)
    {
        $validatedData = $request->validate([
            'banner' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'url' => 'required',
        ]);

        if ($request->hasFile('banner')) {
            $image = $request->file('banner');
            $file   = time().'.'.$image->getClientOriginalExtension();

            //Banner Thumbnail
            $destinationPath = public_path('/assets/banner/thumb');
            $img = Image::make($image->getRealPath());
            $img->resize(150, 150, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$file);
         
            //Banner Original Image
            $destinationPath = public_path('/assets/banner');
            $img = Image::make($image->getRealPath());
            $img->save($destinationPath.'/'.$file);

            $slider = new Slider();
            $slider->slider = $file;
            $slider->url = $request->input('url');
            $slider->save();
            return redirect()->back()->with('message', 'Banner has been added successfully');

        } else 
            return redirect()->back()->with('message', 'Please ! select a image');
    }

    public function editBanner($id) 
    {
        $slider = Slider::find($id);

        return view('admin.banner.edit_banner',compact('slider'));
    }

    public function updateBanner(Request $request,$id) 
    {
       $slider = Slider::find(1);

       if ($request->hasFile('banner')) {
            $image = $request->file('banner');
            $file   = time().'.'.$image->getClientOriginalExtension();

            //Banner Thumbnail
            $destinationPath = public_path('/assets/banner/thumb');
            $img = Image::make($image->getRealPath());
            $img->resize(150, 150, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$file);
        
            //Banner Original Image
            $destinationPath = public_path('/assets/banner');
            $img = Image::make($image->getRealPath());
            $img->save($destinationPath.'/'.$file);

            $slider->slider = $file;

        }
        
        $slider->url = $request->input('url');
        $slider->save();
        
       return redirect()->back()->with('message', 'Category has been added successfully');
    }

    public function updateStatus($id, $status) 
    {
        Slider::where('id',$id)->update([
            'status'=>$status,
        ]);

        return redirect()->back();
    }

    public function deleteBanner($id) 
    {
        Slider::where('id',$id)->delete();

        return redirect()->back();
    }
}
