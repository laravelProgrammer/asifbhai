<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Booking extends Model
{
    protected $fillable = ["availability_id", "status"];

    public function availability()
    {
    	return $this->belongsTo(Availability::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
