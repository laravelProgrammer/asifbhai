<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Availability;
use App\User;

class TeachersController extends Controller
{
    public function teachers(){

    	 $teachers=DB::table('users')->join('roles','roles.id','=','users.role_id')
    	          ->select('users.*')->where('users.role_id',3)->paginate(6);

    	return view('web-site.pages.teachers',compact('teachers'));
    }

    public function findteacher($id){
                
          $teacher=User::getrecord($id);
          
		  $teachers=Availability::where('teacher_id',$id)->get(); 

		 return view('web-site.pages.avail',compact('teachers','teacher'));   	
    }
}
