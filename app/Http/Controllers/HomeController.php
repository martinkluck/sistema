<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function getProducts(){
        $products = Product::where(['status'=>1])->orderBy('created_at','DESC')->get();
        $products->load('images');
        return response()->json($products);
    }

    public function getProduct(Product $product){
        $product->load('images');
        return response()->json($product);
    }

    public function getCategories(){
        $categories = Category::query()->where(['status'=>1])->orderBy('name','DESC')->get();
        return response()->json($categories);
    }

    public function getProductsByCategory(Category $category){
        $products = $category->products()->where(['status'=>1])->get();
        $products->load('images');
        return response()->json(['products'=>$products,'category'=>$category]);
    }
}
