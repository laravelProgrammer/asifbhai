<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    public function loginform(){

    	return view('web-site.pages.login');
    }

    public function login(Request $request){

    	if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){

    		return redirect('/');

    	}else{

    		return back()->with('msg','These crediantals do not match our record');
    	}
    }
}
