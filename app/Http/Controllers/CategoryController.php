<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return response()->json(compact('categories'));
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
            'order' => 'required'
        ]);

        $image_new_name = '';
        if($request->image){

            $image = $request->image;

            $image_new_name = time(). $image->getClientOriginalName();
            $image->move('categories/', $image_new_name);

            $result += ['image' => $image_new_name];

        }
        
        Category::create($result);
        return response()->json([
            'name' => $result['name'],
            'order' => $result['order'],
            'image' => $image_new_name,
            'status' => 201
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $image_new_name = null;
        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->order = $request->order;

        if($request->image && $request->image !== $category->image){
            $image = $request->image;
            $image_new_name = time(). $image->getClientOriginalName();
            $image->move(public_path('categories') . '/', $image_new_name);
            $category->image = $image_new_name;
        }

        $category->save();

        return response()->json([
            'name' => $category->name,
            'order' => $category->order,
            'image' => $image_new_name?  $image_new_name: 'empty',
            'status' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return response()->json([
            'status' => 'success',
            'msg' => 'category has been deleted successfully!'
        ]);
    }
}
