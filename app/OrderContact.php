<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderContact extends Model
{
    protected $table = 'order_contact';
    protected $fillable = [
        'name',
        'email',
        'mobile',
    ];
}
