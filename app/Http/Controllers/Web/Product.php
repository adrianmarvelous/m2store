<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Product extends Controller
{
    public function products($slug)
    {
        return view('web.product.detail');
    }
}
