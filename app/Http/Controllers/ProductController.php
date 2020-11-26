<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function allProduct(){

        $products = Product::get();

        return view('welcome',['products' => $products]);
    }
}
