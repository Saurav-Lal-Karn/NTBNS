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

/*Route::get('/', function () {
    return view('index');
});*/

Route::get('events', function () {
    return view('events');
});

Route::get('/', 'NTBNSController@indexInit');
Route::get('contact', 'NTBNSController@contactInit');
Route::get('about', 'NTBNSController@aboutInit');
Route::get('gallery', 'NTBNSController@gallery');
Route::get('downloads/{folder}', 'NTBNSController@downloadInit');
Route::get('members/{category}', 'NTBNSController@memberInit');
Route::get('notices/{category}', 'NTBNSController@noticeInit');
Route::get('profile/{id}', 'NTBNSController@profileInit');

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

    Route::get('editDownloadList',[
        'middleware'=>'auth',
        'uses'      =>'ntbnsServiceController@editDownloadList'
    ]);

    Route::get('editNoticeList',[
        'middleware'=>'auth',
        'uses'      =>'ntbnsServiceController@editNoticeList'
    ]);

    Route::get('editMemberList',[
        'middleware'=>'auth',
        'uses'      =>'ntbnsServiceController@editMemberList'
    ]);

    Route::get('editAboutList',[
        'middleware'=>'auth',
        'uses'      =>'ntbnsServiceController@editAboutList'
    ]);



    Route::get('editUser/{id}',[
        'middleware'=>'auth', 
        'uses'      =>'ntbnsServiceController@editUser'
    ]);
    
    Route::get('editContact/{id}',[
        'middleware'=>'auth',
        'uses'      =>'ntbnsServiceController@editContact'
    ]);

    Route::get('editDownload/{id}',[
        'middleware'=>'auth',
        'uses'      =>'ntbnsServiceController@editDownload'
    ]);

    Route::get('editNotice/{id}',[
        'middleware'=>'auth',
        'uses'      =>'ntbnsServiceController@editNotice'
    ]);

    Route::get('editMember/{id}',[
        'middleware'=>'auth',
        'uses'      =>'ntbnsServiceController@editMember'
    ]);

    Route::get('editAbout/{id}',[
        'middleware'=>'auth',
        'uses'      =>'ntbnsServiceController@editAbout'
    ]);


    Route::get('deleteUser/{id}',[
        'middleware'=>'auth', 
        'uses'      =>'ntbnsServiceController@editUser'
    ]);
    

    Route::get('deleteContact/{id}',[
        'middleware'=>'auth',
        'uses'      =>'ntbnsServiceController@deleteContact'
    ]);

    Route::get('deleteDownload/{id}',[
        'middleware'=>'auth',
        'uses'      =>'ntbnsServiceController@deleteDownload'
    ]);

    Route::get('deleteNotice/{id}',[
        'middleware'=>'auth',
        'uses'      =>'ntbnsServiceController@deleteNotice'
    ]);

    Route::get('deleteMember/{id}',[
        'middleware'=>'auth',
        'uses'      =>'ntbnsServiceController@deleteMember'
    ]);

    Route::get('deleteAbout/{id}',[
        'middleware'=>'auth',
        'uses'      =>'ntbnsServiceController@deleteAbout'
    ]);

    Route::post('addUser', 'ntbnsServiceController@addUser');
    Route::post('addUser/{id}', 'ntbnsServiceController@addUser');
    Route::post('addContact', 'ntbnsServiceController@addContact');
    Route::post('addAbout', 'ntbnsServiceController@addAbout');
    Route::post('addDownload', 'ntbnsServiceController@addDownload');
    Route::post('addMember', 'ntbnsServiceController@addMember');
    Route::post('addNotice', 'ntbnsServiceController@addNotice');

});



