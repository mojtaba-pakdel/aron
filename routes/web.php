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

use App\User;

Route::group(['namespace'=> 'Admin','middleware' => ['auth:web', 'checkAdmin'] , 'prefix' => 'admin'],function (){
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
    Route::resource('roles' , 'RoleController');
    Route::resource('permissions' , 'PermissionController');
    Route::group(['prefix' => 'users'], function(){
        Route::get('/' , 'UserController@index');
        Route::delete('/{user}' , 'UserController@destroy');
        Route::resource('/level' , 'LevelManageController' , ['parameters' => ['level'=>'user']]);
        Route::post('/create' , 'UserController@create')->name('users.create');
    });
});
Route::group(['namespace' => 'Auth'] , function(){
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login');
    Route::get('logout', 'LoginController@logout')->name('logout');

    Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'RegisterController@register');
    Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'ResetPasswordController@reset')->name('password.update');
});

Route::get('/' , 'HomeController@index');
Route::get('user/active/email/{token}' , 'UserController@activation')->name('activation.account');

