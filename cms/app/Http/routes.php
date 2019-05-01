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

use App\Post;

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

//Eloquent ORM

//read data
Route::get('/find', function() {
    //$posts = Post::all();
    $posts = Post::find(2); // 2 is id here

    return $posts->body;
});

// 2nd way to read data
Route::get('/find2', function() {
    $posts = Post::where('title', 'test0')->orderBy('id','desc')->get();
    foreach($posts as $post) {
        echo $post->title . '<br>';
    }

    //return $posts;
});

//3rd way
Route::get('/find3', function(){
    $posts = Post::findOrFail(2); // 2 is id here
    return $posts;
});


// insert

Route::get('/basicinsert', function() {
    $post = new Post;

    $post->title = "test 1";
    $post->body = "this is test 1";

    $post->save();

    return "inserted";

});

//update

Route::get('/basicupdate', function() {
    $post = Post::find(4);

    $post->title = "test 1";
    $post->body = "test for update";

    $post->save();

    return "updated";

});

//mass assignment insert

Route::get('/create', function() {
    Post::create(['title'=>'test 2', 'body'=>'this is test number 2']);
    return "mass assignment";
});

// ORM update
Route::get('/basicupdate', function() {
    Post::where('id',2)->where('is_admin', 0)->update(['title'=>'orm title', 'body' => 'this is body']);
    return "updated";
});

//ORM delete
Route::get('/basicdelete', function() {
    $post = Post::find(2);  
    $post->delete();
    /* 
    other ways:
        Post::destroy(2);
        Post::destroy([2,3]);
        Post::where(conditon)->delete();
    */
    return "deleted";
});
