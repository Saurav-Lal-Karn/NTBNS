<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
<<<<<<< HEAD
=======
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
>>>>>>> 1c7c8fb3f1680cb7f0e94d5085418444e759bf65

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;
<<<<<<< HEAD
}
=======


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
  		
  			return Redirect::to('admin/index');
    	}
    }	
}
>>>>>>> 1c7c8fb3f1680cb7f0e94d5085418444e759bf65
