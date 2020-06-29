<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\HomePage;
use App\Slider;
use App\HappyClient;
use App\PageData;

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
}
