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
use App\User;
use App\Post;

Route::get('/', function () {
    return view('welcome');
});

//insert
Route::get('/insert', function() {
    $user = User::findOrFail(2);
    $post = new Post(['title'=>'test', 'content'=>'test 2']);
    $user->post()->save($post);

    return 'inserted';
});
