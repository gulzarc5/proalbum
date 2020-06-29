<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HappyClient extends Model
{
    protected $table = 'happy_client';
    protected $fillable = [
        'name',
        'image',
        'designation',
        'comment',
    ];
}
