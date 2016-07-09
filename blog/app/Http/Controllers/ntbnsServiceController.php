<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;
use Input;
use App\UserDetails;
use App\Users;
use Hash;
use Redirect;
use DB;

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

    public function  addUser(Request $request){
        
        $statusCode     =   200;
        $message        =   "";
        $success        =   "";
        DB::begintransaction();
        try{
            $firstName  =   $request->input('firstName');
            $lastName   =   $request->input('lastName');    
            $email      =   $request->input('email');
            $batch      =   $request->input('batch');
            $faculty    =   $request->input('faculty');
            $rollNo     =   $request->input('rollNo');
            $password   =   $request->input('password');
            $rePassword =   $request->input('rePassword');

           /* if($password != $rePassword){
                return Redirect::to('login')
                                ->withErrors('Passwords does not match. Try again')
                                ->withInput(Input::except('password'));
            }*/

            $userDetails    =   new UserDetails();
            $users          =   new Users();


            $newPassword    =   Hash::make($password);
            $userDetails->firstName =   $firstName;
            $userDetails->lastName  =   $lastName;
            $userDetails->email     =   $email;
            $userDetails->batch     =   $batch;
            $userDetails->faculty   =   $faculty;
            $userDetails->rollNo    =   $rollNo;
            
            $users->email       =   $email;
            $users->password    =   $newPassword;

            $userDetails->save();
            $users->save();
            DB::commit();
            return Redirect::to('admin/addUser');
        }
        catch(Exception $e){
            DB::rollback();
            return Redirect::to('error.500',$e);
        }

        return ;
    }	
}
