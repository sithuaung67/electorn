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

//Banner
Route::get('banner','Api\Banner\BannerApiController@index');

//Wishlist
Route::post('wishlist/user','Api\Wishlist\WishlistApiController@user');
Route::post('wishlist/store','Api\Wishlist\WishlistApiController@store');
Route::post('wishlist/destroy','Api\Wishlist\WishlistApiController@destroy');

//Login
Route::get('login/customer','Api\Login\LoginApiController@index');
Route::post('login/customer/store','Api\Login\LoginApiController@store');
Route::post('login/customer/update','Api\Login\LoginApiController@update');
//supposrt_center
Route::get('support_center','Api\Login\LoginApiController@support_center');
//destination
Route::get('destination','Api\Destination\DestinationApiController@index');
Route::get('destination/limit','Api\Destination\DestinationApiController@limit');


//blog
Route::post('hotdeals','Api\HotDeal\HotDealApiController@index');
//home
Route::get('home_video','Api\HomeVideo\HomeVideoApiController@index');

//Explore
//search country
Route::post('search_country','Api\Explore\ExploreApiController@index');
Route::post('search_destination','Api\Explore\ExploreApiController@search_destination');

Route::post('destination_click','Api\Explore\ExploreApiController@destination_click');
Route::get('country_all','Api\Explore\ExploreApiController@country');

//Booking
Route::post('booking','Api\Booking\BookingApiController@index');
Route::post('booking/store','Api\Booking\BookingApiController@store');
Route::post('booking/history','Api\Booking\BookingApiController@history');

//Setting
//Notification
Route::get('notification','Api\Notification\NotificationApiController@index');
//Tutorial
Route::get('tutorial','Api\Tutorial\TutorialApiController@index');
//SpportCenter
Route::get('support_center','Api\SupportCenter\SupportCenterApiController@index');
//Question
Route::get('question_answer','Api\Question\QuestionApiController@index');
//About
Route::get('about','Api\About\AboutApiController@index');
//Recent View
Route::post('recent_view','Api\HotDeal\HotDealApiController@recent_view');
Route::post('package_all','Api\HotDeal\HotDealApiController@package_all');
Route::get('travel_blog_all','Api\HotDeal\HotDealApiController@travel_blog_all');


//TourLogin
Route::post('tour_leader_login','Api\Login\LoginApiController@tour_leader_login');
Route::post('tour_leader_package','Api\Login\LoginApiController@tour_leader_package');
Route::post('tour_leader_update','Api\Login\LoginApiController@tour_leader_update');
//Feedback
Route::post('feedback/store','Api\Feedback\FeedBackApiController@store');
Route::post('package/feedback/store','Api\Feedback\FeedBackApiController@package_store');
Route::post('package/feedback/edit','Api\Feedback\FeedBackApiController@edit');

//Tour Group Update
Route::post('tour_group/update','Api\TourGroup\TourGroupApiController@update');
//Customer Update
Route::post('customer/detail','Api\TourGroup\TourGroupApiController@detail');

//chatting image store//
Route::post('chatting_image/store','Api\Chatting\ChattingApiController@store');

//chatting image store//
Route::get('popup','Api\Chatting\ChattingApiController@index');

//Hotel
Route::post('hotel_hotdeal','Api\Hotel\HotelApiController@index');
Route::post('hotel/see_more','Api\Hotel\HotelApiController@hotel_all');
Route::post('hotel/search','Api\Hotel\HotelApiController@search');
//Hotel wishlist
Route::post('hotel_wishlist/user','Api\Hotel\HotelWishlistApiController@index');
Route::post('hotel_wishlist/store','Api\Hotel\HotelWishlistApiController@store');
Route::post('hotel_wishlist/destroy','Api\Hotel\HotelWishlistApiController@destroy');
//Hotel Booking
Route::post('hotel_booking','Api\Hotel\HotelBookingApiController@index');
Route::post('new/booking/for/hotel/store','Api\Hotel\HotelBookingApiController@store');
Route::post('hotel_booking/history','Api\Hotel\HotelBookingApiController@history');

Route::get('test','Api\Hotel\HotelApiController@test');
//NRC Image Store
Route::post('nrc/store','Api\Hotel\HotelBookingApiController@nrc_image_store');
//Passport Image Store
Route::post('passport/store','Api\Hotel\HotelBookingApiController@passport_image_store');


