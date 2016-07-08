<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;
use Input;

class ntbnsServiceController extends Controller
{
    //

    public function login(){
    	$rules	=	array(
	    		'email'		=>	'required|email',
	    		'password'	=>	'required|alphaNum|min:3'
    		);

    	$validator	=	Validator::make(Input::all(),	$rules);

    	if ($validator->fails()) {
    		return Redirect::to('login')
        			->withErrors($validator) // send back all errors to the login form
        			->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
		} else {

    		$userdata = array(
        						'email'     => Input::get('email'),
        						'password'  => Input::get('password')
   	 						);
  			dd($userdata);
    	}
    }	
}
