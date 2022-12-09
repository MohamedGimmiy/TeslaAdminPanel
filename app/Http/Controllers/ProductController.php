<?php

namespace App\Http\Controllers;

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
        $products = Product::with('category')->get();
        return response()->json([
            'products' => $products
        ]);
    }

    public function latestProducts(){

        $products = Product::with('category')->latest('updated_at', 'desc')->take(6)->get();
        //$products = Product::orderBy('created_at', 'desc')->take(4)->get();

        return response()->json([
            'products' => $products,
            'status' => 'success'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'category_id' => 'required'
        ]);

        $image_new_name = '';
        if($request->image){

            $image = $request->image;
            $image_new_name = time(). $image->getClientOriginalName();
            $image->move('products/', $image_new_name);
            $result += ['image' => $image_new_name];
        }

        if($request->description){
            $result +=['description' => $request->description];
        }
        Product::create($result);
        return response()->json([
            'name' => $result['name'],
            'order' => $result['price'],
            'category_id' => $result['category_id'],
            'image' => $image_new_name,
            'description' => $request->description? $request->description: '',
            'status' => 201

        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $image_new_name = null;
        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->category_id = $request->category_id;

        if($request->image && $request->image !== $product->image){
            $image = $request->image;
            $image_new_name = time(). $image->getClientOriginalName();
            $image->move(public_path('products') . '/', $image_new_name);
            $product->image = $image_new_name;
        }

        $product->save();

        return response()->json([
            'name' => $product->name,
            'price' => $product->price,
            'image' => $image_new_name?  $image_new_name: 'empty',
            'status' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return response()->json([
            'message' => 'Product is deleted successfully',
            'status' => 'success'
        ]);
    }
}
