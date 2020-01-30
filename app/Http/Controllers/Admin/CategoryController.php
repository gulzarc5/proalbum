<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function categoryAdd()
    {
        return view('admin.category.add_category');
    }
}
