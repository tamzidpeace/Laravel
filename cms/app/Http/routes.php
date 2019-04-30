<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

// route with parameter

Route::get('/post/{id}/{title}', function ($id, $title) {
    return $id . " " . $title; 
});

//naming routes

Route::get('admin/posts/example', array ( 'as' => 'admin.home' ,function () {
    return "123";
}));