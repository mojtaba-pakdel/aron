<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::namespace('Admin')->prefix('admin')->group(function (){
    Route::get('/panel' , 'PanelController@index');
    Route::post('/panel/upload-image' , 'PanelController@uploadImageSubject');
    Route::post('/articles/{article}', 'ArticleController@destroy');
    Route::post('/categories/{category}', 'CategoryController@destroy');
    Route::post('/category_courses/{category_course}', 'CategoryCourseController@destroy');
    Route::post('/courses/{course}' , 'CourseController@destroy');
    Route::post('/episodes/{episode}' , 'EpisodeController@destroy');
    Route::resource('articles' , 'ArticleController');
    Route::resource('categories' , 'CategoryController');
    Route::resource('category_courses' , 'CategoryCourseController');
    Route::resource('courses' , 'CourseController');
    Route::resource('episodes' , 'EpisodeController');
});

