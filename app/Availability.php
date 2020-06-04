<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Availability extends Model
{
    //
    public function save(array $options = [])
    {
        if(!isset($this->teacher_id)){
            $this->teacher_id = Auth::user()->id;
        }
        parent::save();
    }


    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function subject(){
        return $this->belongsTo(Subject::class);
    }

    public function level(){
        return $this->belongsTo(Level::class);
    }
}
