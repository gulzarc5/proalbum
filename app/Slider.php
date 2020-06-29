<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = 'banner';
    protected $fillable = [
        'slider',
        'status',
        'url',
    ];
}
