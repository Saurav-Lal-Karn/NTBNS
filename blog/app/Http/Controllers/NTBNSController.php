<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class NTBNSController extends Controller
{
    //
    public function gallery(){
    	return view('gallery');
    }

    public function downloads(){
    	return view('downloads');
    }

    public function notices(){
    	return view('notice');
    }


    public function members(){
    	return view('member');
    }
}
