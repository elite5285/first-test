<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('login', 'Api\Auth\LoginController@login');
Route::post('fblogin', 'Api\Auth\LoginController@fblogin');
Route::post('register', 'Api\Auth\RegisterController@register');
Route::post('refresh', 'Api\Auth\LoginController@refresh');
 
Route::post('forgotpassword', 'Api\Auth\LoginController@forgotApi');
Route::post('verifycode', 'Api\Auth\LoginController@verifyApi');
Route::post('resetpassword', 'Api\Auth\LoginController@resetApi');

Route::get('home', 'Api\MainController@home');


Route::get('bundle/courses', 'Api\MainController@bundle');
Route::get('user/faq', 'Api\MainController@studentfaq');
Route::get('instructor/faq', 'Api\MainController@instructorfaq');


Route::group(['middleware' => ['auth:api']], function (){
 	 
	Route::get('main', 'Api\MainController@main');
	Route::post('logout','Api\Auth\LoginController@logoutApi');
   	
    //wishlist
	Route::post('addtowishlist', 'Api\MainController@addtowishlist');
	Route::post('remove/wishlist', 'Api\MainController@removewishlist');
	Route::post('show/wishlist', 'Api\MainController@showwishlist');

    //userprofile
	Route::post('show/profile', 'Api\MainController@userprofile');
	Route::post('update/profile', 'Api\MainController@updateprofile');
	Route::post('my/courses', 'Api\MainController@mycourses');

    //cart
	Route::post('addtocart', 'Api\MainController@addtocart');
 	Route::post('remove/cart', 'Api\MainController@removecart');
	Route::post('show/cart', 'Api\MainController@showcart');
	Route::post('remove/all/cart', 'Api\MainController@removeallcart');
	Route::post('addtocart/bundle', 'Api\MainController@addbundletocart');
	Route::post('remove/bundle', 'Api\MainController@removebundlecart');

    //userprofile
	Route::get('notifications', 'Api\MainController@allnotification');
	Route::get('readnotification/{id}', 'Api\MainController@notificationread');
	Route::post('readall/notification', 'Api\MainController@readallnotification');

});

Route::post('course/detail', 'Api\MainController@detailpage');
Route::get('all/pages', 'Api\MainController@pages');
Route::post('instructor/profile', 'Api\MainController@instructorprofile');
Route::post('course/review', 'Api\MainController@review');
Route::post('chapter/duration', 'Api\MainController@duration');

Route::get('apikeys', 'Api\MainController@apikeys');
Route::get('all/courses/detail', 'Api\MainController@coursedetail');
Route::get('all/coupons', 'Api\MainController@showcoupon');

Route::get('aboutus', 'Api\MainController@aboutus');

Route::post('contactus', 'Api\MainController@contactus');

Route::get('payment/apikeys', 'Api\PaymentController@apikeys');

Route::get('terms_policy', 'Api\MainController@terms');
Route::get('career', 'Api\MainController@career');
Route::get('zoom', 'Api\MainController@zoom');
Route::get('bigblue', 'Api\MainController@bigblue');
