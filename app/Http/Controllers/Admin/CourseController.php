<?php

namespace App\Http\Controllers\Admin;

use App\CategoryCourse;
use App\Course;
use App\Http\Requests\CourseRequest;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AdminController;

class CourseController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::latest()->paginate(20);
        return view('admin.courses.all',compact("courses"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        auth()->loginUsingId(1 , true);
        $categories = CategoryCourse::all();
        return view('admin.courses.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseRequest $request)
    {
        $imagesUrl = $this->uploadImages($request->file('images'),'courses');
        $status =  ($request->input('status') == "on") ? 1:0 ;
        $course = Course::create([
            'title'=>$request->input('title'),
            'user_id'=>auth()->user()->id,
            'body'=>$request->input('body'),
            'tags'=>$request->input('tags'),
            'price'=>$request->input('price'),
            'type'=>$request->input('type'),
            'images'=> $imagesUrl,
            'status'=> $status,
            'meta_keywords'=>$request->input('meta_keywords'),
            'meta_description'=>$request->input('meta_description'),
        ]);
        $course->categories()->attach($request->input('category'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $categories = CategoryCourse::all();
        return view('admin.courses.edit',compact('course','categories'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CourseRequest $request, Course $course)
    {
        $file = $request->file('images');
        $inputs = $request->all();
        $inputs['status'] = ($request->input('status') == "on") ? 1:0 ;
        if($file){
            $inputs['images'] = $this->uploadImages($request->file('images'),'courses');
        }else{
            $inputs['images'] = $course->images;
            $inputs['images']['thumb'] = $inputs['imagesThumb'];
        }
        unset($inputs['imagesThumb']);
        unset($inputs['category']);
        $course->update($inputs);
        $course->categories()->sync($request->input('category'));
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Course $course
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->back();
    }
}
