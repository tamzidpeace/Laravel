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

//insert
Route::get('/insert/{id}', function ($id) {
    $user = User::findOrFail($id);
    $address = new Address(['name' => 'cumilla']);

    $user->address()->save($address);
    return 'data inserted';
});

//update
Route::get('/update', function () {
    //$address = Address::findOrFail($id);
    // $address->name = 'Dahaka';
    // $address->save();
    //return $address;

    // --read data
    // $address = DB::table('addresses')->where('user_id', 2)->first();
    // echo $address->name;

    // can change value
    // $address = Address::where('user_id', 1)->first();
    // $address->name = 'a';
    // $address->save();
    // echo $address->name;

    // -- trying new way and it work
    $user = User::findOrFail(1);
    $user->address()->where('user_id', 1)->update(['name'=>'dhaka']);
    return 'updated';

});

// read
Route::get('/read', function() {
    $user = User::findOrFail(1);
    echo $user->address->name;
});

// delete
Route::get('/delete', function() {
    $user = User::findOrFail(2);
    // delete all match value
    $user->address()->delete();
    // delete a single value
    $user->address()->delete();
    echo 'deleted';
});
