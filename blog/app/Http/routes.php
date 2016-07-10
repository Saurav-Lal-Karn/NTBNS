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
Route::post('login', 'ntbnsServiceController@login');


Route::group(['prefix' => 'admin'], function () {
    
    Route::get('test', ['middleware' => 'auth', function(){ 
        return view('admin.test');
    }]);

    Route::get('index', ['middleware' => 'auth', function(){ 
        return view('admin.index');
    }]);

    Route::get('addUser',['middleware'=>'auth', function ()    {
        return view('admin.addUser');
    }]);

    Route::get('addContact',['middleware'=>'auth',function(){
        return view('admin.addContact');
    }]);

    Route::get('addMember',['middleware'=>'auth',function(){
        return view('admin.addMember');
    }]);

    Route::get('addNotice',['middleware'=>'auth',function(){
        return view('admin.addNotice');
    }]);

    Route::get('addDownload',['middleware'=>'auth',function(){
        return view('admin.addDownload');
    }]);

    Route::get('addAbout',['middleware'=>'auth',function(){
        return view('admin.addAbout');
    }]);

    Route::get('editUserList',[
        'middleware'=>'auth', 
        'uses'      =>'ntbnsServiceController@editUserList'
    ]);
    
    Route::get('editContactList',[
        'middleware'=>'auth',
        'uses'      =>'ntbnsServiceController@editContactList'
    ]);

    Route::get('editMemberList',['middleware'=>'auth', function (){
        return view('admin.editMemberList');
    }]);

    Route::get('editNoticeList',['middleware'=>'auth', function (){
        return view('admin.editNoticeList');
    }]);

    Route::get('editDownloadList',['middleware'=>'auth', function (){
        return view('admin.editDownloadList');
    }]);

    Route::get('editAboutList',['middleware'=>'auth', function (){
        return view('admin.editAboutList');
    }]);    

    Route::post('addUser', 'ntbnsServiceController@addUser');
    Route::post('addContact', 'ntbnsServiceController@addContact');
    Route::post('addAbout', 'ntbnsServiceController@addAbout');
    Route::post('addDownload', 'ntbnsServiceController@addDownload');
    Route::post('addMember', 'ntbnsServiceController@addMember');
    Route::post('addNotice', 'ntbnsServiceController@addNotice');

});



