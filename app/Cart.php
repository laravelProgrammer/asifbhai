<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Cart;

class Cart extends Model
{
    static public function totalitems($id){

    	return Cart::where('user_id',$id)->count();
    }
}
