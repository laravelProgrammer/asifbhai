<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cart;
use App\Checkout;
use App\Booking;
use Auth;

class CheckoutController extends Controller
{
    public function checkout(Request $request){

        
    	 // Set your secret key: remember to change this to your live secret key in production
        // See your keys here: https://dashboard.stripe.com/account/apikeys
        \Stripe\Stripe::setApiKey('sk_test_TlwaHaEWTzOhhCA6uttCs7Zh00c7oZVa2Y');

        // Token is created using Checkout or Elements!
        // Get the payment token ID submitted by the form:
        $token = $_POST['stripeToken'];

        $charge = \Stripe\Charge::create([

            'amount' => $request->prices,

            'currency' => 'usd',

            'source' => $token,

         
        ]);

    	$cart=Cart::all()->where('user_id',Auth::user()->id);

    	 $checkout=new Checkout();
    	 $checkout->amount=$charge->amount;
    	 $checkout->save();

    	 foreach ($cart as $value) {
    	    
    	    $book=new Booking();
    	    $book->availability_id=$value->availability_id;
    	    $book->user_id=$value->user_id;
    	    $book->checkout_id=$checkout->id;	    
    	    $book->save();

    	 }

    	 $deleted=Cart::where('user_id',Auth::user()->id)->delete();

    	 return redirect(route('/'));
    }
}
