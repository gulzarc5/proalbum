<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PageData extends Model
{
    protected $table = 'page_data';
    protected $fillable = [
        'about_us',
        't_c',
        'return_policy',
        'privacy_policy',
    ];
}
