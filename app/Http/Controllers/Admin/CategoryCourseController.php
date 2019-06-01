<?php

namespace App\Http\Controllers\Admin;

use App\CategoryCourse;
use App\Http\Requests\CategoryCourseRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\AdminController;

class CategoryCourseController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = CategoryCourse::all();
        return view('Admin.category_courses.all' , compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = CategoryCourse::all();
        return view('Admin.category_courses.create' , compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryCourseRequest $request)
    {
        $imageUrl = $this->uploadImages($request->file('images'),'category_courses');
        $status =  ($request->input('status') == "on") ? 1:0 ;
        $category = CategoryCourse::create([
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param CategoryCourse $category
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryCourse $category_course)
    {
        $category =  $category_course;
        $categories = CategoryCourse::all();
        return view('Admin.category_courses.edit' , compact('categories','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CategoryCourseRequest $request
     * @param CategoryCourse $category_course
     * @return void
     */
    public function update(CategoryCourseRequest  $request,CategoryCourse $category_course)
    {
        $file = $request->file('images');
        $inputs = $request->all();
        if($file){
            $inputs['images'] = $this->uploadImages($request->file('images'),'category_courses');
        }else{
            $inputs['images'] = $category_course->images;
            $inputs['images']['thumb'] = $inputs['imagesThumb'];
        }
        $inputs['status'] = ($request->input('status') == 'on') ? 1:0;
        unset($inputs['imagesThumb']);
        $category_course->update($inputs);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param CategoryCourse $categoryCourse
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(CategoryCourse $categoryCourse)
    {
        $categoryCourse->delete();
        return response()->json([
            'status'=>1,
        ]);
    }
}
