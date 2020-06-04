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

class AvailabilityController extends VoyagerBaseController
{
    use BreadRelationshipParser;

    public function index(Request $request)
    {
        $slug = $this->getSlug($request);
        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();
        $availabilities = Auth::user()->availabilities()->with('subject')->get();
        $view = 'voyager::availabilities.browse';
        if(Auth::user()->isTeacher()){
            $view = 'voyager::availabilities.browse';
        }
        return Voyager::view($view, compact(
            'dataType',
            'availabilities'
        ));
    }

    public function show(Request $request, $id)
    {
        $availability = Availability::find($id);
        // Check permission
        $this->authorize('read', $availability);
         
        $view = 'voyager::availabilities.read';

        return Voyager::view($view, compact('availability'));
    }

}
