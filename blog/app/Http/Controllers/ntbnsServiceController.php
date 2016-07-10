<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;


use App\Http\Requests;
use App\UserDetails;
use App\Users;
use App\contacts;
use App\notices;
use App\downloads;
use App\members;
use App\about;
use Hash;
use DB;
use Auth;
use DateTime;

class ntbnsServiceController extends Controller
{
    //

    public function login(){

        $rules  =   array(
                'email'     =>  'required|email',
                'password'  =>  'required|alphaNum|min:3'
            );

        $validator  =   Validator::make(Input::all(),   $rules);

        if ($validator->fails()) {
            return Redirect::to('login')
                    ->withErrors($validator) // send back all errors to the login form
                    ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
        } else {

            $userdata = array(
                                'email'     => Input::get('email'),
                                'password'  => Input::get('password')
                            );
        }


         if (Auth::attempt(['email' => $userdata['email'], 'password' => $userdata['password']])) {
            // Authentication passed...
            return redirect()->intended('admin/index');
        }else{
            return redirect()->intended('login');
        }




/*
    	$userdata = array(
                            'email'     => Input::get('email'),
                            'password'  => Input::get('password')
                        );
        
        dd($userdata);*/
    
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

    public function  addContact(Request $request){
        
        $statusCode     =   200;
        $message        =   "";
        $success        =   "";

        DB::begintransaction();
        
        try{
            $email          =   $request->input('email');
            $address        =   $request->input('address');     
            $phoneNumber    =   $request->input('phoneNo');

            if(($email == null || $email == "") && ($address == null || $address == "") && ($phoneNumber == null || $phoneNumber == "")) {
                return Redirect::to('admin/addContact');
            }

            if($email   !=  ""){
                $contactEmail               =   new contacts();
                $contactEmail->contact      =   $email;
                $contactEmail->category     =   "Email";
                $contactEmail->save();
            }

            if($address     !=  ""){
                $contactAddress             =   new contacts();
                $contactAddress->contact    =   $address;
                $contactAddress->category   =   "Address";
                $contactAddress->save();
            }

            if($phoneNumber     !=  ""){
                $contactPhoneNumber                 =   new contacts();
                $contactPhoneNumber->contact        =   $phoneNumber;
                $contactPhoneNumber->category       =   "Contact Number";
                $contactPhoneNumber->save();
            }

            DB::commit();
            return Redirect::to('admin/addContact');
        }
        catch(Exception $e){
            DB::rollback();
            return Redirect::to('error.500',$e);
        }

        return ;
    }

    public function  addNotice(Request $request){
        
        $statusCode     =   200;
        $message        =   "";
        $success        =   "";

        DB::begintransaction();
        
        try{

            $title          =   $request->input('title');
            $description    =   $request->input('description');     
            $source         =   $request->file('source');

            $destinationPath = 'uploads/notices';
            
            $notices            =   new notices();
            $notices->title     =   $title;
            
            $notices->uploadedBy =  Auth::user()->id;

            if($description != ""){
                $notices->description   =   $description;
            }

            $newName    =   value(function() use ($source){
                $fileName   =   str_random(10).'.'.$source->getClientOriginalExtension();
                return strtolower($fileName);
            });

            $fileSize   =   $source->getSize();
            $upload     =   $source->move($destinationPath,$newName);
            if($upload){
                $notices->source =  $newName;
            }

            $notices->save();
            DB::commit();
            return Redirect::to('admin/addNotice');
        }
        catch(Exception $e){
            DB::rollback();
            return Redirect::to('error/500',$e);
        }

        return ;
    }   

    public function  addDownload(Request $request){
        
        $statusCode     =   200;
        $message        =   "";
        $success        =   "";

        DB::begintransaction();
        
        try{

            $title          =   $request->input('title');
            $description    =   $request->input('description');
            $category       =   $request->input('category');     
            $source         =   $request->file('source');   

            $destinationPath = 'uploads/downloads/'.$category;
            
            $downloads            =   new downloads();
            $downloads->title     =   $title;
            
            if($description != ""){
                $downloads->description   =   $description;
            }

            $newName    =   value(function() use ($source){
                $fileName   =   str_random(10).'.'.$source->getClientOriginalExtension();
                return strtolower($fileName);
            });

            $fileSize   =   $source->getSize();
            $upload     =   $source->move($destinationPath,$newName);
            if($upload){
                $downloads->source =  $newName;
            }

            $downloads->category    =   $category;

            $downloads->save();
            
            DB::commit();
            return Redirect::to('admin/addDownload');
        }
        catch(Exception $e){
            DB::rollback();
            return Redirect::to('error/500',$e);
        }

        return ;
    }

    public function  addMember(Request $request){
        
        $statusCode     =   200;
        $message        =   "";
        $success        =   "";

        DB::begintransaction();
        
        try{

            $members    =   new members();


            $firstName      =   $request->input('firstName');
            $lastName       =   $request->input('lastName');
            $email          =   $request->input('email');
            $batch          =   $request->input('batch');
            $faculty        =   $request->input('faculty');
            $rollNo         =   $request->input('rollNo');
            $address        =   $request->input('address');
            $category       =   $request->input('category');
            $about          =   $request->input('about');
            $phoneNumber    =   $request->input('phoneNo');     
            $source         =   $request->file('picture');   

            $fullName       =   $firstName.' '.$lastName;

            $destinationPath = 'uploads/profilepictures/'.$category;
            
            $members                =   new members();
            $members->name          =   $fullName;
            $members->faculty       =   $faculty;          
            $members->batch         =   $batch;          
            $members->rollNo        =   $rollNo;          
            $members->email         =   $email;
            
            if($address != ""){
                $members->address   =   $address;
            }

            $members->category      =   $category;          
            
            if($about != ""){
                $members->about     =   $about;
            }

            if($phoneNo != ""){
                $members->phoneN0   =   $phoneNo;
            }         


            if($source != null){
                $newName    =   value(function() use ($source){
                    $fileName   =   str_random(10).'.'.$source->getClientOriginalExtension();
                    return strtolower($fileName);
                });

                $fileSize   =   $source->getSize();
                $upload     =   $source->move($destinationPath,$newName);
                if($upload){
                    $members->picture =  $newName;
                }
            }

            $members->save();
            
            DB::commit();
            return Redirect::to('admin/addMember');
        }
        catch(Exception $e){
            DB::rollback();
            return Redirect::to('error/500',$e);
        }

        return ;
    }

    public function  addAbout(Request $request){
        
        $statusCode     =   200;
        $message        =   "";
        $success        =   "";

        DB::begintransaction();
        
        try{
            $goals          =   $request->input('goals');
            $objective      =   $request->input('objective');  
            $motto          =   $request->input('motto');

            if(($goals == null || $goals == "") && ($objective == null || $objective == "") && ($motto == null || $motto == "")) {
                return Redirect::to('admin/addAbout');
            }

            if($goals   !=  ""){
                $aboutGoals          =   new about();            
                $aboutGoals->points       =   $goals;
                $aboutGoals->category     =   "Goals";  
                $aboutGoals->save();
            }

            if($objective     !=  ""){
                $aboutObjectives                =   new about();
                $aboutObjectives->points        =   $objective;
                $aboutObjectives->category      =   "Objectives";
                $aboutObjectives->save();
            }

            if($motto   !=  ""){
                $aboutMotto                 =   new about();
                $aboutMotto->points         =   $motto;
                $aboutMotto->category       =   "Motto";
                $aboutMotto->save();
            }

            DB::commit();
            return Redirect::to('admin/addAbout');
        }
        catch(Exception $e){
            DB::rollback();
            return Redirect::to('error/500',$e);
        }

        return ;
    }

    public function editUserList(){
        
        $user_details = DB::select('select * from user_details where status = "1"');
        return view('admin.editUserList',['user_details' => $user_details]);
    }

    public function editContactList(){
        
        $contacts = DB::select('select * from contacts where status = "1"');   
        return view('admin.editContactList',['contacts' => $contacts]);
    }

    public function editList(){
        
        $contacts = DB::select('select * from contacts where status = "1"');
        return view('admin.editContactList',['contacts' => $contacts]);
    }

}
