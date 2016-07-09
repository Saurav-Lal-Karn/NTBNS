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
    return view('index');
});

Route::get('profile', function () {
    return view('profile');
});

Route::get('contact', function () {
    return view('contact');
});

Route::get('about', function () {
    return view('about');
});

Route::get('gallery', 'NTBNSController@gallery');
Route::get('downloads', 'NTBNSController@downloads');
Route::get('members', 'NTBNSController@members');
Route::get('notices', 'NTBNSController@notices');
Route::get('login', 'NTBNSController@login');

Route::post('login',	'Controller@login');
Route::get('admin/index', function(){
	return view('admin.index');
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('addUser', function ()    {
        return view('admin.addUser');
    });

    Route::get('editUser', function ()    {
        return view('admin.editUser');
    });

    Route::get('deleteUser', function ()    {
        return view('admin.deleteUser');
    });

    Route::post('login', 'ntbnsServiceController@login');
    Route::post('addUser', 'ntbnsServiceController@addUser');

});



