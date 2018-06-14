<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function getProducts(){
        $products = Product::orderBy('created_at','DESC')->get();
        $products->load('images');
        return response()->json($products);
    }
}
