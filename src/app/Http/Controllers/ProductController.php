<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function products() {
        return view('products');
    }

    public function detail()
    {
        return view('detail');
    }

    public function register()
    {
        return view('register');
    }
}
