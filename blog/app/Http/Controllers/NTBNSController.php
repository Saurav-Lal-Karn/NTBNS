<?php

namespace App\Http\Controllers;

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

class NTBNSController extends Controller
{
    //
    public function gallery(){
    	return view('gallery');
    }

    public function notices(){
    	return view('notice');
    }


    public function members(){
    	return view('member');
    }

    public function login(){
    	return view('login');
    }

    public function contactInit(){
        $contacts    =   contacts::get();
        return view('contact',['contacts' => $contacts]);
    }

    public function downloadInit($folder){
        
        if($folder == 'Notes'){
            $downloads  =   downloads::where('category','Notes')
                                        ->get();
        }
        else if($folder == 'Books'){
            $downloads  =   downloads::where('category','Books')
                                        ->get();
        } 
        else if($folder == 'Syllabus'){
            $downloads  =   downloads::where('category','Syllabus')
                                        ->get();
        }
        else if($folder == 'Reports'){
            $downloads  =   downloads::where('category','Reports')
                                        ->get();
        }
        else if($folder == 'Miscellaneous'){
            $downloads  =   downloads::where('category','Miscellaneous')
                                        ->get();
        }
        else{
            $downloads  =   downloads::get();
        }

        return view('downloads',['downloads' => $downloads]);

    }

    public function noticeInit($category){
        $notices    =   notices::get();
        return view('notice',['notices' => $notices]);        
    }

    public function memberInit($category){

        if($category == 'Faculty Members'){
            $members    =   members::where('category',$category)
                                        ->get();
        }
        else if($category == 'Committee Members'){
            $members    =   members::where('category',$category)
                                        ->get();
        }
        else if($category == 'General Members'){
            $members    =   members::where('category',$category)
                                        ->get();
        }
        else{
            abort(404);
        }

        return view('member',['members' => $members]);
    }

}
