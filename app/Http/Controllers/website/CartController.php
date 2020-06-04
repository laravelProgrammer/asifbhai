<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cart;
use Auth;
use DB;

class CartController extends Controller
{
    public function addCart(Request $request)
    {
      
     if (Auth::check()) {

      $avail=$request->avail_id;
      if (!empty($avail)) {
        
        foreach ($avail as $a) {

            $cart=new Cart();
            $cart->availability_id=$a;
            $cart->user_id=$request->user_id;
            $cart->save();
       
      }

      return back()->with('msg','Record Added Successfully!');

      }else{

        return back()->with('msg','Select at leatest one aailability!');

      }
      

    }else{

      return redirect(route('login-form'));

    }

    }

     public function items()
    {
      
       $items=DB::table('carts')
               ->join('availabilities','carts.availability_id','=','availabilities.id')
               ->select('availabilities.*')->where('user_id',Auth::user()->id)->get();
    
       return view('web-site.pages.cart-items',compact('items'));

    }

    
}
