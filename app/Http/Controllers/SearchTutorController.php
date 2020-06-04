<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Level;
use \App\Subject;
use \App\Availability;

class SearchTutorController extends Controller
{
	
    public function index(Request $request)
    {
    	$this->authorize('browse_tutor');
    	$levels = Level::all();
    	$subjects = Subject::all();
    	return view('tutor.find')->withLevels($levels)->withSubjects($subjects);
    }

    public function search(Request $request)
    {
    	$this->authorize('browse_search_tutor');
    	$levelId = $request->get("level");
    	$subjectId = $request->get('subject');
 		$where = [];
 		if($levelId){
 			$where[] = [
 				'level_id', '=', $levelId
 			];
 		}
 		if($subjectId){
 			$where[] = [
 				'subject_id', '=', $subjectId
 			];
 		}

    	$availabilities = Availability::where($where)->get();

    	return view('tutor.list')->withAvailabilities($availabilities);
    }
}
