<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class SearchController extends Controller
{
    public function search(Request $request){

    	
    	 $teachers=DB::table('users')
    	           ->join('availabilities','users.id','=','availabilities.teacher_id')
    	           ->select('users.*')
    	           ->distinct('availabilities.teacher_id')
    	           ->where('availabilities.level_id',$request->search_class)
    	           ->orWhere('availabilities.subject_id',$request->search_subject)->paginate(6);

    	return view('web-site.pages.searched-result',compact('teachers'));
    }
}
