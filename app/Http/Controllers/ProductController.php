<?php

namespace App\Http\Controllers;

use App\Category;
use App\Image;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id','ASC')->with('categories')->paginate(10);
//        dd($products);
        return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('name','ASC')->pluck('name','id');
        return view('admin.product.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = Product::create($request->all());

        $files = $request->file('images');
        $destinationPath = 'images';

        $images = [];
        foreach($files as $file) {
            $filename = $file->getClientOriginalName();
            $images[] = new Image(['description'=>$product->name,'url'=>$filename,'status'=>true]);
            $upload_success = $file->move($destinationPath, $filename);
        }
        foreach ($request->category_id as $id){
            $product->categories()->attach($id);
        }

        $product->images()->saveMany($images);

        return redirect()->route('products.index')
            ->with('info', 'Producto creado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $product->load('images');
        return view('admin.product.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::orderBy('name','ASC')->pluck('name','id');
        $product->load('categories');
        return view('admin.product.edit',compact('categories','product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        if($request->status){
            $product->status = 1;
        }else{
            $product->status = 0;
        }
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->imei = $request->imei;
        $product->code = $request->code;
        if($request->file('images')){
            $files = $request->file('images');
            $destinationPath = 'images';

            $images = [];
            foreach($files as $file) {
                $filename = $file->getClientOriginalName();
                $images[] = new Image(['description'=>$product->name,'url'=>$filename,'status'=>true]);
                $upload_success = $file->move($destinationPath, $filename);
            }
            foreach ($request->category_id as $id){
                $product->categories()->attach($id);
            }

            $product->images()->saveMany($images);
        }
        $product->external_link = $request->external_link;
        $product->save();
        return redirect()->route('products.index', $product->id)
            ->with('info', 'Producto actualizado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->status = false;
        $product->save();
        return redirect()->route('products.index')
            ->with('info', 'Producto eliminado correctamente');
    }
}
