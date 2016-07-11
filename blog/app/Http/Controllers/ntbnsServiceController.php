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

    public function  addUser(Request $request,$id){
        
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

            if($id){
                $userDetails    =   UserDetails::where('id',$id);
                $users          =   Users::where('id',$id);
            }else{
                $userDetails    =   new UserDetails();
                $users          =   new Users();
            }

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
            //$users->save();

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

            if($phoneNumber != ""){
                $members->phoneNo   =   $phoneNumber;
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



    public function editUser($id){
        $user_details = DB::select('select * from user_details where status = 1 AND id = '.$id);
        return view('admin.addUser',['user_details' => $user_details]);
    }

    public function editContact($id){
        $contact_details = DB::select('select * from contacts where status = 1 AND id = '.$id);
        return view('admin.addContact',['contact_details' => $contact_details]);
    }


    public function editNotice($id){
        $notice_details = DB::select('select * from notices where status = 1 AND id = '.$id);
        return view('admin.addNotice',['notice_details' => $notice_details]);
    }

    public function editDownload($id){
        $download_details = DB::select('select * from downloads where status = 1 AND id = '.$id);
        return view('admin.addDownload',['download_details' => $download_details]);
    }

    public function editMember($id){
        $member_details = DB::select('select * from members where status = 1 AND id = '.$id);
        return view('admin.addMember',['member_details' => $member_details]);
    }


    public function editAbout($id){
        $about_details = DB::select('select * from about where status = 1 AND id = '.$id);
        return view('admin.addAbout',['about_details' => $about_details]);
    }





    public function editUserList(){
        
        $user_details = DB::select('select * from user_details where status = "1"');
        return view('admin.editUserList',['user_details' => $user_details]);
    }

    public function editContactList(){
        
        $contacts = DB::select('select * from contacts where status = "1"');   
        return view('admin.editContactList',['contacts' => $contacts]);
    }

    public function editDownloadList(){        
        $downloads = DB::select('select * from downloads where status = "1"');
        return view('admin.editDownloadList',['downloads' => $downloads]);
    }

    public function editNoticeList(){        
        $notices = DB::select('select * from notices where status = "1"');

        foreach($notices as $n){
            $id         =   $n->uploadedBy;
            if($id != ""){
                $uploadedBy = DB::select('select firstName,lastName from user_details where id = '.$id.' Limit 1');
                
                $fullName = $uploadedBy[0]->firstName." ".$uploadedBy[0]->lastName;
                $n->uploadedBy = $fullName;
            }
        }
        return view('admin.editNoticeList',['notices' => $notices]);
    }

    public function editMemberList(){        
        $members = DB::select('select * from members where status = "1"');
        return view('admin.editMemberList',['members' => $members]);
    }

    public function editAboutList(){        
        $about = DB::select('select * from about where status = "1"');
        return view('admin.editAboutList',['abouts' => $about]);
    }

    public function deleteUser($id){

        $user = UserDetails::where('id',$id)
                        ->where('status', '<>', 3)
                        ->first();

        $user->status = 3;

        $user->save();

        return redirect::to('admin/editUserList');
    }

    public function deleteContact($id){

        $contacts = contacts::where('id',$id)
                        ->where('status', '<>', 3)
                        ->first();

        $contacts->status = 3;

        $contacts->save();

        return redirect::to('admin/editContactList');
    }

    public function deleteDownload($id){

        $downloads = downloads::where('id',$id)
                        ->where('status', '<>', 3)
                        ->first();

        $downloads->status = 3;

        $downloads->save();

        return redirect::to('admin/editDownloadList');
    }

    public function deleteNotice($id){

        $notices = notices::where('id',$id)
                        ->where('status', '<>', 3)
                        ->first();

        $notices->status = 3;

        $notices->save();

        return redirect::to('admin/editNoticeList');
    }

    public function deleteMember($id){
        $members = members::where('id',$id)
                        ->where('status', '<>', 3)
                        ->first();

        $members->status = 3;

        $members->save();

        return redirect::to('admin/editMemberList');
    }

    public function deleteAbout($id){

        $about = about::where('id',$id)
                        ->where('status', '<>', 3)
                        ->first();

        $about->status = 3;

        $about->save();

        return redirect::to('admin/editAboutList');
    }



}
