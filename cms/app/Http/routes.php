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

Route::get('admin/posts/example', array('as' => 'admin.home', function () {
    return "123";
}));

//controller route

Route::get('/post/{data}', 'PostController@index');

//resource route/ controller

Route::resource('posts', 'PostController');

// route for custom function
Route::get('/contact', 'PostController@contact');

// passing data to view route
Route::get('/mPost/{id}/{name}', 'PostController@post');

//inserting using raw sql queries
Route::get('/insert', function () { 
    DB::insert('insert into posts(title,body) values(?,?)',['test0','test number 0']);
    return "inserted";
});


//read using raw sql queries
Route::get('/read', function () { 
    $result = DB::select('select * from posts');
    
    foreach($result as $post) {
        return $post->title . " " . $post->body;
    }

    //return $result;
    
});

//update using raw sql queries
Route::get('/update', function () { 
    
    $updated = DB::update('update posts set title="new title" where id = ?', [1]);
    return $updated;
});

//delete using raw sql queries
Route::get('/delete', function () { 
    
    $deleted = DB::delete('delete from posts where id = ?', [1]);
    return $deleted;
});