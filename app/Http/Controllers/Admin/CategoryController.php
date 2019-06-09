<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AdminController;

class CategoryController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::latest()->paginate(20);
        return view('admin.category.all',compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('Admin.category.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $imageUrl = $this->uploadImages($request->file('images'),'category');
        $status =  ($request->input('status') == "on") ? 1:0 ;
        $category = Category::create([
           'title'=>$request->input('title'),
           'parent_id'=>$request->input('parent_id'),
           'description'=>$request->input('description'),
           'body'=>$request->input('body'),
           'images'=> $imageUrl,
           'status' =>$status,
           'meta_keywords'=>$request->input('meta_keywords'),
           'meta_description'=>$request->input('meta_description'),
        ]);
            return redirect()->back();
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
        $categories = Category::all();
        return view('admin.category.edit',compact('category' , 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $file = $request->file('images');
        $inputs = $request->all();
        $inputs['status'] = ($request->input('status') == "on") ? 1:0 ;
        if($file){
            $inputs['images'] = $this->uploadImages($request->file('images') , 'category');
        }else{
            $inputs['images']= $category->images;
            $inputs['images']['thumb']= $inputs['imagesThumb'];
        }
        unset($inputs['imagesThumb']);
        $category->update($inputs);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json([
           'status' => 1
        ]);
    }
}
