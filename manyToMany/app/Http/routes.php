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
use App\Role;

Route::get('/', function () {
    return view('welcome');
});

//insert
Route::get('/insert', function () {
    $user = User::findOrFail(1);
    $role = new Role(['name' => 'subscriber']);
    $user->roles()->save($role);

    return "data inserted";
});


//read
Route::get('/read', function () {
    $user = User::findOrFail(1);

    foreach ($user->roles as $role) {
        echo $role->name;
    }
});

//update
Route::get('/update', function () {
    $user = User::findOrFail(1);
    //echo $user;


    // something is worng with it
    if ($user->has('role')) {
        foreach ($user->roles as $role) {
            if ($role->name == 'jkadjf') {
                $role->name = 'Admin';
                $role->save();
            }
        }
    }
});

//delete
Route::get('/delete', function () {
    $user = User::findOrFail(1);

    $user->roles()->delete();
    
});
