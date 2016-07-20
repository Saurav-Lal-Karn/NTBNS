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
        $contacts    =   contacts::where('status',1)
                                    ->get();
        return view('contact',['contacts' => $contacts]);
    }

    public function downloadInit($folder){
        
        if($folder == 'Notes'){
            $downloads  =   downloads::where('category','Notes')
                                        ->where('status',1)
                                        ->get();
        }
        else if($folder == 'Books'){
            $downloads  =   downloads::where('category','Books')
                                        ->where('status',1)
                                        ->get();
        } 
        else if($folder == 'Syllabus'){
            $downloads  =   downloads::where('category','Syllabus')
                                        ->where('status',1)
                                        ->get();
        }
        else if($folder == 'Reports'){
            $downloads  =   downloads::where('category','Reports')
                                        ->where('status',1)
                                        ->get();
        }
        else if($folder == 'Miscellaneous'){
            $downloads  =   downloads::where('category','Miscellaneous')
                                        ->where('status',1)
                                        ->get();
        }
        else{
            $downloads  =   downloads::where('status',1)
                                    ->get();
        }

        return view('downloads',['downloads' => $downloads]);

    }

    public function noticeInit($category){
        $notices    =   notices::where('status',1)
                                ->get();
        return view('notice',['notices' => $notices]);        
    }

    public function memberInit($category){

        if($category == 'Faculty Members'){
            $members    =   members::where('category','Faculty Member')
                                    ->where('status',1)
                                    ->get();
        }
        else if($category == 'Committee Members'){
            $members    =   members::where('category','Committee Member')
                                        ->where('status',1)
                                        ->get();
        }
        else if($category == 'General Members'){
            $members    =   members::where('category', 'General Member')
                                        ->where('status',1)
                                        ->get();
        }
        else{
            abort(404);
        }

        return view('member',['members' => $members]);
    }

    public function profileInit($id){
        if($id){
            $member_details =   members::where('id',$id)
                                        ->where('status',1)
                                        ->first();

            return view('profile',['member_details' => $member_details]);
        }else{
            abort(404);
        }
    }

    public function aboutInit(){
        
        $aboutMottos = about::where('status',1)
                            ->where('category','Motto')
                            ->get();

        $aboutGoals = about::where('status',1)
                            ->where('category','Goals')
                            ->get();

        $aboutObjectives = about::where('status',1)
                            ->where('category','Objectives')
                            ->get();

        return view('about',[
                        'aboutMottos' => $aboutMottos, 
                        'aboutGoals' => $aboutGoals, 
                        'aboutObjectives' => $aboutObjectives
                    ]);
    }

}
