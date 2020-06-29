<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomePage extends Model
{
    protected $table = 'home_page';
    protected $fillable = [
        'header_logo',
        'footer_logo',
        'banner',
        'pro_cat_1',
        'pro_cat_2',
        'pro_cat_3',
        'pro_cat_4',
        'pro_cat_heading',
        'pro_cat_tag',
        'top_cat_heading',
        'top_cat_tag',
        'home_video',
        'order_heading',
        'order_tag',
        'footer_address',
        'footer_phone',
        'footer_email',
        'home_video',
        'home_video',
    ];
}
