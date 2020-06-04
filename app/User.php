<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Subject;
use App\Level;

class User extends \TCG\Voyager\Models\User
{
    use Notifiable;

    static public function getrecord($id){

        return User::find($id);

    }

    static public function getsubject($id){

        return Subject::find($id);
        
    }

    static public function getlevel($id){

        return Level::find($id);
        
    }

    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function availabilities(){
        return $this->hasMany(Availability::class, 'teacher_id');
    }

    public function isTeacher(){
        return $this->role->name == 'teacher';
    }

    public function bookings(){
        return $this->hasMany(Booking::class);
    }

    public function sessions(){
        return $this->hasManyThrough(
            Booking::class,
            Availability::class,
            'teacher_id',
            'availability_id',
            'id',
            'id'
        );

//         return $this->hasManyThrough(
//             'App\Post',
//             'App\User',
//             'country_id', // Foreign key on users table...
//             'user_id', // Foreign key on posts table...
//             'id', // Local key on countries table...
//             'id' // Local key on users table...
//         );



// countries => users
//     id - integer
//     name - string

// users => availabilities
//     id - integer
//     country_id - integer => teacher_id
//     name - string

// posts => bookings
//     id - integer
//     user_id - integer => availability_id
//     title - string
    }
}
