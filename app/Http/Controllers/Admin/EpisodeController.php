<?php

namespace App\Http\Controllers\Admin;

use App\CategoryCourse;
use App\Course;
use App\Episode;
use App\Http\Requests\EpisodeRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\AdminController;

class EpisodeController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $episodes = Episode::latest()->paginate(20);
        return view('admin.episodes.all',compact("episodes"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        auth()->loginUsingId(1);
        $courses = Course::all();
        return view('admin.episodes.create',compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EpisodeRequest $request)
    {
        $imagesUrl = $this->uploadImages($request->file('images'),'episode');
        $videoUrl = $this->uploadVideo($request->file('videoUrl'),'episode');
        $status =  ($request->input('status') == "on") ? 1:0 ;
        $inputs = $request->all();
        $inputs['status'] = $status;
        $inputs['images'] = $imagesUrl;
        $inputs['videoUrl'] = $videoUrl;
        $episode = auth()->user()->episode()->create($inputs);
        $this->setCourseTime($episode);
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
     * @param Episode $episode
     * @return \Illuminate\Http\Response
     */
    public function edit(Episode $episode)
    {
        $courses = Course::all();
        return view('Admin.episodes.edit' , compact('courses','episode'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EpisodeRequest $request, Episode $episode)
    {
        $file = $request->file('images');
        $videoFile = $request->file('videoUrl');
        $inputs = $request->all();
        if($file){
            $inputs['images'] = $this->uploadImages($request->file('images'),'episode');
        }else{
            $inputs['images'] = $episode->images;
            $inputs['images']['thumb'] = $inputs['imagesThumb'];
        }
        if($videoFile){
            $inputs['videoUrl'] = $this->uploadVideo($request->file('videoUrl'), 'episode');
        }else{
            $inputs['videoUrl'] = $episode->videoUrl;
        }
        $inputs['status'] = ($request->input('status') == 'on') ? 1:0;
        unset($inputs['imagesThumb']);
        $episode->update($inputs);
        $this->setCourseTime($episode);
        return redirect()->back();


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Episode $episode)
    {
        $episode->delete();
        return response()->json([
            'status'=>1,
        ]);
    }
}
