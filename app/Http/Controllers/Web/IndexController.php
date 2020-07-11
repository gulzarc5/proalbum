<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\HomePage;
use App\Slider;
use App\HappyClient;
use App\PageData;
use App\GalleryAlbum;
use App\Gallery;
use App\Blog;
use App\ContactUs;
use App\OrderContact;

class IndexController extends Controller
{
    public function index()
    {
        $slider = Slider::where('status',1)->get();
        $home_page = HomePage::where('id',1)->first();
        $first_cat = DB::table('products')->where('best_seller',2)->get();
        $second_cat = DB::table('products')->where('new_arrival',2)->get();
        $third_cat = DB::table('products')->where('feature_product',2)->get();
        $fourth_cat = DB::table('products')->where('weeding',2)->get();
        $top_cat = DB::table('category')->where('top_cat_status',2)->get();
        $HappyClient = HappyClient::orderBy('id','desc')->get();
        return view('web.index',compact('home_page','slider','first_cat','second_cat','third_cat','fourth_cat','top_cat','HappyClient'));
    }

    public function about()
    {
        $page_data = PageData::find(1);
        $data = $page_data->about_us;
        return view('web.about',compact('data'));
    }

    public function termsCondition()
    {
        $page_data = PageData::find(1);
        $data = $page_data->t_c;
        return view('web.about',compact('data'));
    }

    public function returnPolicy()
    {
        $page_data = PageData::find(1);
        $data = $page_data->return_policy;
        return view('web.about',compact('data'));
    }

    public function privacyPolicy()
    {
        $page_data = PageData::find(1);
        $data = $page_data->privacy_policy;
        return view('web.about',compact('data'));
    }

    public function showAlbums()
    {
        
        $album = GalleryAlbum::orderBy('id','desc')->get();
        return view('web.gallery-cat',compact('album'));
    }

    public function showGalery($album_id)
    {
        try {
            $album_id = decrypt($album_id);
        }catch(DecryptException $e) {
            return redirect()->back();
        }
        $album = GalleryAlbum::find($album_id);
        $images = Gallery::where('album_id',$album_id)->orderBy('id','desc')->get();
        return view('web.gallery',compact('images','album'));
    }

    public function showBlog()
    {
        $blog = Blog::orderBy('id','desc')->paginate(12);
        return view('web.blog',compact('blog'));
    }

    public function singleBlog($slug,$id)
    {
        $blog = Blog::find($id);
        return view('web.single-blog',compact('blog'));
    }

    public function contactSubmit(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);
        $contact_us = new ContactUs();
        $contact_us->name = $request->input('name');
        $contact_us->email = $request->input('email');
        $contact_us->mobile = $request->input('mobile');
        $contact_us->subject = $request->input('subject');
        $contact_us->message = $request->input('message');

        $contact_us->save();
        return redirect()->back()->with('message','Thanks For Contacting With Us . We will get back to you soon !!');
    }

    public function orderContactSubmit(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
        ]);

        $contact_us = new OrderContact();
        $contact_us->name = $request->input('name');
        $contact_us->email = $request->input('email');
        $contact_us->mobile = $request->input('mobile');
        $contact_us->save();

        $product_id = $request->input('p_id');

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

        
       $data_status = 1;
    	return view('web.product.shop-single', ['product_detail' => $product_detail, 'related_product' => $related_product, 'product_sizes' => $product_sizes, 'option' => $option,'product_images'=>$product_images,'data_status'=>$data_status]);
    }
}
