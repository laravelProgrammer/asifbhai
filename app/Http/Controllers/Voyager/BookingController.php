<?php

namespace App\Http\Controllers\Voyager;

use Exception;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use TCG\Voyager\Database\Schema\SchemaManager;
use TCG\Voyager\Events\BreadDataAdded;
use TCG\Voyager\Events\BreadDataDeleted;
use TCG\Voyager\Events\BreadDataRestored;
use TCG\Voyager\Events\BreadDataUpdated;
use TCG\Voyager\Events\BreadImagesDeleted;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Http\Controllers\Traits\BreadRelationshipParser;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;
use \App\Availability;
use \App\Booking;
use \App\User;

class BookingController extends VoyagerBaseController
{
    use BreadRelationshipParser;

    public function index(Request $request)
    {

        $slug = $this->getSlug($request);
        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();
        $view = 'voyager::bookings.browse';
        $user = auth()->user();
        $isAdmin = $user->hasRole("admin");
        $isStudent = $user->hasRole("student");
        $isTeacher = $user->hasRole("teacher");
        $bookings = null;
        if($isAdmin){
            $bookings = Booking::all();
        }else if($isStudent){
            $bookings = $user->bookings;
        }else if($isTeacher){
            $bookings = $user->sessions;
        }
        // return $bookings;
        return Voyager::view($view, compact(
            'dataType',
            'bookings',
            'isAdmin',
            'isStudent',
            'isTeacher'
        ));
    }

    public function store(Request $request)
    {
        $slug = $this->getSlug($request);
        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();
        $input = $request->only('availability_id', 'user_id');
        $availability = Availability::findOrFail($input["availability_id"]);
        $user = User::findOrFail($input["user_id"]);
        $user->bookings()->create([
            "availability_id" => $availability->id,
            "status" => "new"
        ]);
        $view = 'voyager::bookings.browse';
        $isAdmin = $user->hasRole("admin");
        $isStudent = $user->hasRole("student");
        return Voyager::view($view, compact(
            'dataType',
            'bookings',
            'isAdmin',
            'isStudent'
        ));
    }


}
