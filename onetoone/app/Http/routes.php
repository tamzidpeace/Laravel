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
use App\Address;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/insert/{id}', function($id) {
    $user = User::findOrFail($id);
    $address = new Address(['name'=>'cumilla']);

    $user->address()->save($address);
    return 'data inserted';
});


