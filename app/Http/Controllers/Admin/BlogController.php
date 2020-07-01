<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Blog;
use Image;
use File;

use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function showBlogAddForm()
    {
        return view('admin.blog.add_blog');
    }

    public function addBlog(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'banner' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
        ]);
        $blog = new Blog();

        if ($request->hasFile('banner')) {
                    
            $image = $request->file('banner');  
            $image_name = uniqid().time().date('Y-M-d').'.'.$image->getClientOriginalExtension();

            //Category Thumbnail
            $destinationPath = public_path('/assets/blog/thumb');
            $img = Image::make($image->getRealPath());
            $img->resize(600, 600, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$image_name);

            //Category Original Image
            $destinationPath = public_path('/assets/blog');
            $img = Image::make($image->getRealPath());
            $img->save($destinationPath.'/'.$image_name);        

            $blog->image = $image_name;
        }

        $blog->title = $request->input('title');
        $blog->body = $request->input('body');
        $blog->slug = Str::slug($request->input('title'), '-');

        $blog->save();
        return redirect()->back()->with('message','Blog Added Successfully');
    }

    public function BlogList()
    {
        $blog = Blog::orderBy('id','desc')->get();

        return view('admin.blog.blog_list', ['blog' => $blog]);
    }

    public function editBlog($id)
    {
        $blog = Blog::find($id);
        return view('admin.blog.edit_blog',compact('blog'));
    }

    public function updateBlog(Request $request,$id)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'banner' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10240',
        ]);
        $blog = Blog::find($id);

        if ($request->hasFile('banner')) {
                    
            $image = $request->file('banner');  
            $image_name = uniqid().time().date('Y-M-d').'.'.$image->getClientOriginalExtension();

            //Category Thumbnail
            $destinationPath = public_path('/assets/blog/thumb');
            $img = Image::make($image->getRealPath());
            $img->resize(600, 600, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$image_name);

            //Category Original Image
            $destinationPath = public_path('/assets/blog');
            $img = Image::make($image->getRealPath());
            $img->save($destinationPath.'/'.$image_name);        

            $blog->image = $image_name;
        }

        $blog->title = $request->input('title');
        $blog->body = $request->input('body');
        $blog->slug = Str::slug($request->input('title'), '-');

        $blog->save();
        return redirect()->back()->with('message','Blog Updated Successfully');
    }

    public function viewBlog($id)
    {
        $blog = Blog::find($id);
        return view('admin.blog.blog_view',compact('blog'));
    }

    public function deleteBlog($id)
    {
        Blog::where('id',$id)->delete();
        return redirect()->back();
    }
}
