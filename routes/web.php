<?php

use Illuminate\Support\Facades\Route;
use App\Subject;
use App\Level;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	
	   $subjects=Subject::all();
	   $levels=Level::all();

    return view('welcome',compact('subjects','levels'));

})->name('/');


Route::group(['prefix' => 'dashboard'], function () {
    Voyager::routes();
    Route::get('tutor', 'SearchTutorController@index')->middleware('admin.user');
    Route::get('search', 'SearchTutorController@search')->middleware('admin.user')->name('search_availabilities');
});


//    WEBSITE ROUTES   //

Route::group(['namespace'=>'website'],function(){


   	// Teachers controller
   	Route::get('teachers','TeachersController@teachers')->name('teachers');

    // Find Teacher
    Route::get('find-teacher/{id}','TeachersController@findteacher')->name('find-teacher');

   	// Search controller
   	Route::post('search-result','SearchController@search')->name('search-result');

    //  add to cart
    Route::post('add-to-cart','CartController@addCart')->name('add-to-cart');

    //  cart items
    Route::get('cart-items','CartController@items')->name('cart-items');

    //  Login Controller
    Route::get('login-form','LoginController@loginform')->name('login-form');

    //  Login Controller
    Route::post('login','LoginController@login')->name('login');

    //  Checkout Controller
    Route::post('checkout','CheckoutController@checkout')->name('checkout');


}); 
