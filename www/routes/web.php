<?php
Route::get('logout', 'AuthController@getLogout')->name('logout');


Route::get('/',[
    'uses'=>'AuthController@getLogin',
    'as'=>'login'
]);

Route::post('/login',[
    'uses'=>'AuthController@postLogin',
    'as'=>'login'
]);

Route::group(['prefix'=>'admin','as'=>'admin.','middleware'=>['auth']], function(){
	//Dashboard
	Route::get('dashboard','Backend\Dashboard\DashboardController@index')->name('dashboard');

	//User
    Route::get('users','Backend\User\UserController@index')->name('users.index');
    Route::get('users/create','Backend\User\UserController@create')->name('users.create');
    Route::post('users/store','Backend\User\UserController@store')->name('users.store');
    Route::get('users/edit/{id}','Backend\User\UserController@edit')->name('users.edit');
    Route::post('users/update/{id}','Backend\User\UserController@update')->name('users.update');
    Route::delete('users/delete/{user_id}','Backend\User\UserController@destroy')->name('users.destroy');

    //Role
    Route::get('roles','Backend\Role\RoleController@index')->name('roles.index');
    Route::get('roles/create','Backend\Role\RoleController@create')->name('roles.create');
    Route::post('roles/store','Backend\Role\RoleController@store')->name('roles.store');
    Route::get('roles/edit/{id}','Backend\Role\RoleController@edit')->name('roles.edit');
    Route::post('roles/update/{id}','Backend\Role\RoleController@update')->name('roles.update');
    Route::delete('roles/delete/{id}','Backend\Role\RoleController@destroy')->name('roles.destroy');

    //WishList
    Route::get('wishlist','Backend\Wishlist\WishlistController@index')->name('wishlist.index');
    Route::get('wishlist/search','Backend\Wishlist\WishlistController@search')->name('wishlist.search');

    //Support Center
    Route::get('support_center','Backend\Support\SupportCenterController@index')->name('support_center.index');
    Route::get('support_center/create','Backend\Support\SupportCenterController@create')->name('support_center.create');
    Route::post('support_center/store','Backend\Support\SupportCenterController@store')->name('support_center.store');
    Route::get('support_center/edit/{id}','Backend\Support\SupportCenterController@edit')->name('support_center.edit');
    Route::post('support_center/update/{id}','Backend\Support\SupportCenterController@update')->name('support_center.update');
    Route::delete('support_center/delete/{id}','Backend\Support\SupportCenterController@destroy')->name('support_center.destroy');

    //Feedback
    Route::get('feedback','Backend\Feedback\FeedbackController@index')->name('feedback.index');;
    Route::delete('feedback/delete/{id}','Backend\Feedback\FeedbackController@destroy')->name('feedback.destroy');
    Route::get('feedback/search','Backend\Feedback\FeedbackController@search')->name('feedback.search');

    //video tutorial
    Route::get('tutorial','Backend\Tutorial\TutorialController@index')->name('tutorial.index');
    Route::get('tutorial/create','Backend\Tutorial\TutorialController@create')->name('tutorial.create');
    Route::post('tutorial/store','Backend\Tutorial\TutorialController@store')->name('tutorial.store');
    Route::get('tutorial/edit/{id}','Backend\Tutorial\TutorialController@edit')->name('tutorial.edit');
    Route::post('tutorial/update/{id}','Backend\Tutorial\TutorialController@update')->name('tutorial.update');
    Route::delete('tutorial/delete/{id}','Backend\Tutorial\TutorialController@destroy')->name('tutorial.destroy');

    //Home video
    Route::get('home_video','Backend\HomeVideo\HomeVideoController@index')->name('home_video.index');
    Route::get('home_video/create','Backend\HomeVideo\HomeVideoController@create')->name('home_video.create');
    Route::post('home_video/store','Backend\HomeVideo\HomeVideoController@store')->name('home_video.store');
    Route::get('home_video/edit/{id}','Backend\HomeVideo\HomeVideoController@edit')->name('home_video.edit');
    Route::post('home_video/update/{id}','Backend\HomeVideo\HomeVideoController@update')->name('home_video.update');
    Route::delete('home_video/delete/{id}','Backend\HomeVideo\HomeVideoController@destroy')->name('home_video.destroy');

    //Ask Question
    Route::get('ask_question','Backend\AskQuestion\AskQuestionController@index')->name('ask_question.index');
    Route::get('ask_question/create','Backend\AskQuestion\AskQuestionController@create')->name('ask_question.create');
    Route::post('ask_question/store','Backend\AskQuestion\AskQuestionController@store')->name('ask_question.store');
    Route::get('ask_question/edit/{id}','Backend\AskQuestion\AskQuestionController@edit')->name('ask_question.edit');
    Route::post('ask_question/update/{id}','Backend\AskQuestion\AskQuestionController@update')->name('ask_question.update');
    Route::delete('ask_question/delete/{id}','Backend\AskQuestion\AskQuestionController@destroy')->name('ask_question.destroy');
    Route::get('ask_question/view/{id}','Backend\AskQuestion\AskQuestionController@view')->name('ask_question.view');

    //Booking
    Route::get('booking','Backend\Booking\BookingController@index')->name('booking.index');
    Route::get('booking_edit/view/{id}','Backend\Booking\BookingController@booking_edit_view')->name('booking_edit.view');
    //booking edit one
    Route::get('booking/edit/{id}','Backend\Booking\BookingController@edit')->name('booking.edit');
    //booking edit all
    Route::get('booking_all/edit/{id}','Backend\Booking\BookingController@edit_all')->name('booking_all.edit');

    Route::post('booking/update/{id}','Backend\Booking\BookingController@update')->name('booking.update');
    Route::get('booking/search','Backend\Booking\BookingController@search')->name('booking.search');
    Route::get('booking/view/{id}','Backend\Booking\BookingController@view')->name('booking.view');
    Route::post('booking/status/edit/{id}','Backend\Booking\BookingController@booking_edit')->name('booking.status.edit');
    //only one
    Route::delete('booking/delete/{id}','Backend\Booking\BookingController@destroy')->name('booking.destroy');
    //group
    Route::delete('booking_all/delete/{booking_id}','Backend\Booking\BookingController@destroy_all')->name('booking_all.destroy');



    //Country
    Route::get('country','Backend\Country\CountryController@index')->name('country.index');
    Route::get('country/create','Backend\Country\CountryController@create')->name('country.create');
    Route::post('country/store','Backend\Country\CountryController@store')->name('country.store');
    Route::get('country/edit/{id}','Backend\Country\CountryController@edit')->name('country.edit');
    Route::post('country/update/{id}','Backend\Country\CountryController@update')->name('country.update');
    Route::delete('country/delete/{id}','Backend\Country\CountryController@destroy')->name('country.destroy');
    Route::get('country/search','Backend\Country\CountryController@search')->name('country.search');

    //Customer
    Route::get('customer','Backend\Customer\CustomerController@index')->name('customer.index');
    Route::get('customer/create','Backend\Customer\CustomerController@create')->name('customer.create');
    Route::post('customer/store','Backend\Customer\CustomerController@store')->name('customer.store');
    Route::get('customer/edit/{id}','Backend\Customer\CustomerController@edit')->name('customer.edit');
    Route::post('customer/update/{id}','Backend\Customer\CustomerController@update')->name('customer.update');
    Route::delete('customer/delete/{id}','Backend\Customer\CustomerController@destroy')->name('customer.destroy');
    Route::get('customer/search','Backend\Customer\CustomerController@search')->name('customer.search');

    //Destination
    Route::get('destination','Backend\Destination\DestinationController@index')->name('destination.index');
    Route::get('destination/create','Backend\Destination\DestinationController@create')->name('destination.create');
    Route::post('destination/store','Backend\Destination\DestinationController@store')->name('destination.store');
    Route::get('destination/edit/{id}','Backend\Destination\DestinationController@edit')->name('destination.edit');
    Route::post('destination/update/{id}','Backend\Destination\DestinationController@update')->name('destination.update');
    Route::delete('destination/delete/{id}','Backend\Destination\DestinationController@destroy')->name('destination.destroy');
    Route::get('destination/search','Backend\Destination\DestinationController@search')->name('destination.search');


    //Notification
    Route::get('notification','Backend\Notification\NotificationController@index')->name('notification.index');
    Route::get('notification/create','Backend\Notification\NotificationController@create')->name('notification.create');
    Route::post('notification/store','Backend\Notification\NotificationController@store')->name('notification.store');
    Route::get('notification/edit/{id}','Backend\Notification\NotificationController@edit')->name('notification.edit');
    Route::post('notification/update/{id}','Backend\Notification\NotificationController@update')->name('notification.update');
    Route::delete('notification/delete/{id}','Backend\Notification\NotificationController@destroy')->name('notification.destroy');
    Route::get('notification/search','Backend\Notification\NotificationController@search')->name('notification.search');
    Route::get('notification/view/{id}','Backend\Notification\NotificationController@view')->name('notification.view');


    //Package
    Route::get('package','Backend\Package\PackageController@index')->name('package.index');
    Route::get('package/create','Backend\Package\PackageController@create')->name('package.create');
    Route::post('package/store','Backend\Package\PackageController@store')->name('package.store');
    Route::get('package/edit/{id}','Backend\Package\PackageController@edit')->name('package.edit');
    Route::post('package/update/{id}','Backend\Package\PackageController@update')->name('package.update');
    Route::delete('package/delete/{id}','Backend\Package\PackageController@destroy')->name('package.destroy');
    Route::get('package/search','Backend\Package\PackageController@search')->name('package.search');

    Route::get('package/view/{id}','Backend\Package\PackageController@package_view')->name('package.view');

    //Pakcage Image
    Route::get('image/view/{id}','Backend\Package\PackageController@image_view')->name('image.view');
    Route::post('image/store/{id}','Backend\Package\PackageController@image_store')->name('image.store');

    Route::get('portrait_image/edit/{id}','Backend\Package\PackageController@portrait_image_edit')->name('portrait_image.edit');
    Route::post('portrait_image/update/{id}','Backend\Package\PackageController@portrait_image_update')->name('portrait_image.update');

    Route::get('image/edit/{id}','Backend\Package\PackageController@image_edit')->name('image.edit');
    Route::post('image_only_one/update/{id}','Backend\Package\PackageController@image_only_update')->name('image_only_one.update');
    Route::delete('image/delete/{id}','Backend\Package\PackageController@image_destroy')->name('image.destroy');
    



    //Point History
    Route::get('point_history','Backend\PointHistory\PointHistoryController@index')->name('point_history.index');
    Route::get('point_history/edit/{id}','Backend\PointHistory\PointHistoryController@edit')->name('point_history.edit');
    Route::post('point_history/update/{id}','Backend\PointHistory\PointHistoryController@update')->name('point_history.update');
    Route::delete('point_history/delete/{id}','Backend\PointHistory\PointHistoryController@destroy')->name('point_history.destroy');

    //Totur Group
    Route::get('tour_group','Backend\TourGroup\TourGroupController@index')->name('tour_group.index');
    Route::get('tour_group/create','Backend\TourGroup\TourGroupController@create')->name('tour_group.create');
    Route::post('tour_group/store','Backend\TourGroup\TourGroupController@store')->name('tour_group.store');
    Route::get('tour_group/edit/{id}','Backend\TourGroup\TourGroupController@edit')->name('tour_group.edit');
    Route::post('tour_group/update/{id}','Backend\TourGroup\TourGroupController@update')->name('tour_group.update');
    Route::delete('tour_group/delete/{id}','Backend\TourGroup\TourGroupController@destroy')->name('tour_group.destroy');
    Route::get('tour_group/search','Backend\TourGroup\TourGroupController@search')->name('tour_group.search');

    //Totur leader
    Route::get('tour_leader','Backend\TourLeader\TourLeaderController@index')->name('tour_leader.index');
    Route::get('tour_leader/create','Backend\TourLeader\TourLeaderController@create')->name('tour_leader.create');
    Route::post('tour_leader/store','Backend\TourLeader\TourLeaderController@store')->name('tour_leader.store');
    Route::get('tour_leader/edit/{id}','Backend\TourLeader\TourLeaderController@edit')->name('tour_leader.edit');
    Route::post('tour_leader/update/{id}','Backend\TourLeader\TourLeaderController@update')->name('tour_leader.update');
    Route::delete('tour_leader/delete/{id}','Backend\TourLeader\TourLeaderController@destroy')->name('tour_leader.destroy');
    Route::get('tour_leader/search','Backend\TourLeader\TourLeaderController@search')->name('tour_leader.search');

    //Travel Blog
    Route::get('travel_blog','Backend\TravelBlog\TravelBlogController@index')->name('travel_blog.index');
    Route::get('travel_blog/create','Backend\TravelBlog\TravelBlogController@create')->name('travel_blog.create');
    Route::post('travel_blog/store','Backend\TravelBlog\TravelBlogController@store')->name('travel_blog.store');
    Route::get('travel_blog/edit/{id}','Backend\TravelBlog\TravelBlogController@edit')->name('travel_blog.edit');
    Route::post('travel_blog/update/{id}','Backend\TravelBlog\TravelBlogController@update')->name('travel_blog.update');
    Route::delete('travel_blog/delete/{id}','Backend\TravelBlog\TravelBlogController@destroy')->name('travel_blog.destroy');
    Route::get('travel_blog/view/{id}','Backend\TravelBlog\TravelBlogController@view')->name('travel_blog.view');
    Route::get('travel_blog/search','Backend\TravelBlog\TravelBlogController@search')->name('travel_blog.search');

    //Join_Blog_Destination
     Route::get('travel_blog_destination/create/{id}','Backend\TravelBlog\TravelBlogController@destination_create')->name('travel_blog_destination.create');
    Route::post('travel_blog_destination/store','Backend\TravelBlog\TravelBlogController@destination_store')->name('travel_blog_destination.store');
    Route::get('travel_blog_destination/edit/{id}','Backend\TravelBlog\TravelBlogController@destination_edit')->name('travel_blog_destination.edit');

    Route::post('travel_blog_destination/update/{id}','Backend\TravelBlog\TravelBlogController@destination_update')->name('travel_blog_destination.update');
    Route::delete('travel_blog_destination/delete/{id}','Backend\TravelBlog\TravelBlogController@destination_destroy')->name('travel_blog_destination.destroy');
    
    //Join Table
    Route::get('join_table','Backend\JoinTable\JoinTableController@index')->name('join_table.index');
    Route::get('join_table/create','Backend\JoinTable\JoinTableController@create')->name('join_table.create');
    Route::post('join_table/store','Backend\JoinTable\JoinTableController@store')->name('join_table.store');
    Route::get('join_table/edit/{id}','Backend\JoinTable\JoinTableController@edit')->name('join_table.edit');
    Route::post('join_table/update/{id}','Backend\JoinTable\JoinTableController@update')->name('join_table.update');
    Route::delete('join_table/delete/{id}','Backend\JoinTable\JoinTableController@destroy')->name('join_table.destroy');
    Route::get('join_table/search','Backend\JoinTable\JoinTableController@search')->name('join_table.search');


    //About
    Route::get('about','Backend\About\AboutController@index')->name('about.index');
    Route::get('about/create','Backend\About\AboutController@create')->name('about.create');
    Route::post('about/store','Backend\About\AboutController@store')->name('about.store');
    Route::get('about/edit/{id}','Backend\About\AboutController@edit')->name('about.edit');
    Route::post('about/update/{id}','Backend\About\AboutController@update')->name('about.update');
    Route::delete('about/delete/{user_id}','Backend\About\AboutController@destroy')->name('about.destroy');
    Route::get('about/view/{id}','Backend\About\AboutController@view')->name('about.view');

     //Popup
    Route::get('popup','Backend\Popup\PopupController@index')->name('popup.index');
    Route::get('popup/create','Backend\Popup\PopupController@create')->name('popup.create');
    Route::post('popup/store','Backend\Popup\PopupController@store')->name('popup.store');
    Route::get('popup/edit/{id}','Backend\Popup\PopupController@edit')->name('popup.edit');
    Route::post('popup/update/{id}','Backend\Popup\PopupController@update')->name('popup.update');
    Route::delete('popup/delete/{user_id}','Backend\Popup\PopupController@destroy')->name('popup.destroy');

    //Hotel
    Route::get('hotel','Backend\Hotel\HotelController@index')->name('hotel.index');
    Route::get('hotel/create','Backend\Hotel\HotelController@create')->name('hotel.create');
    Route::post('hotel/store','Backend\Hotel\HotelController@store')->name('hotel.store');
    Route::get('hotel/edit/{id}','Backend\Hotel\HotelController@edit')->name('hotel.edit');
    Route::post('hotel/update/{id}','Backend\Hotel\HotelController@update')->name('hotel.update');
    Route::delete('hotel/delete/{id}','Backend\Hotel\HotelController@destroy')->name('hotel.destroy');
    // Route::get('hotel/search','Backend\Hotel\HotelController@search')->name('hotel.search');
    Route::get('hotel/list/{id}','Backend\Hotel\HotelController@list');
    Route::get('hotel/list/view/{id}','Backend\Hotel\HotelController@hotel_list_view')->name('hotel.list.view');

    //Hotel Image
    Route::get('hotel/image/view/{id}','Backend\Hotel\HotelController@image_view_index')->name('hotel.image.view.index');
    Route::post('hotel/image/store/{id}','Backend\Hotel\HotelController@hotel_image_store')->name('hotel.image.store');
    Route::get('hotel/image/edit/{id}','Backend\Hotel\HotelController@hotel_image_edit')->name('hotel.image.edit');
    Route::post('hotel/image/update/{id}','Backend\Hotel\HotelController@hotel_image_update')->name('hotel.image.update');
    Route::delete('hotel/image/delete/{id}','Backend\Hotel\HotelController@hotel_image_destroy')->name('hotel.image.destroy');

    //HotelView
    Route::get('hotel_view/{id}','Backend\Hotel\HotelController@view_index')->name('hotel_view.index');
    Route::get('hotel/view/create/{id}','Backend\Hotel\HotelController@view_create')->name('hotel.view.create');
    Route::post('hotel/view/store/{id}','Backend\Hotel\HotelController@room_store')->name('hotel.view.store');
    Route::get('hotel/new/room/view/create/{id}','Backend\Hotel\HotelController@new_room_create')->name('hotel.new.room.view.create');
    Route::post('hotel/new/room/view/store/{id}','Backend\Hotel\HotelController@new_room_store')->name('hotel.new.room.view.store');
    Route::get('hotel/room/view/edit/{id}','Backend\Hotel\HotelController@room_edit')->name('hotel.room.view.edit');
    Route::post('hotel/room/update/{id}','Backend\Hotel\HotelController@room_update')->name('hotel.room.update');
    Route::delete('hotel/room/delete/{id}','Backend\Hotel\HotelController@room_destroy')->name('hotel.room.destroy');
    // Route::get('hotel_view/search','Backend\Hotel\HotelController@search')->name('hotel_view.search');

    //Hotel Booking
    Route::get('hotel_booking','Backend\Hotel\HotelBookingController@index')->name('hotel.booking.index');
    Route::get('hotel/booking_edit/view/{id}','Backend\Hotel\HotelBookingController@hotel_booking_edit_view')->name('hotel.booking_edit.view');
    //booking edit one
    Route::get('hotel/booking/edit/{id}','Backend\Hotel\HotelBookingController@hotel_booking_edit_each')->name('hotel.booking.edit');
    //booking edit all
    Route::get('hotel/booking_all/edit/{id}','Backend\Hotel\HotelBookingController@hotel_booking_edit_all')->name('hotel.booking_all.edit');

    Route::post('hotel/booking/each/update/{id}','Backend\Hotel\HotelBookingController@hotel_booking_update_each')->name('hotel.booking.each.update');
        Route::post('hotel/booking/all/update/{id}','Backend\Hotel\HotelBookingController@hotel_booking_update_all')->name('hotel.booking.all.update');
    Route::get('hotel/booking/search','Backend\Hotel\HotelBookingController@hotel_booking_search')->name('hotel.booking.search');
    Route::get('hotel/booking/view/{id}','Backend\Hotel\HotelBookingController@hotel_booking_view')->name('hotel.booking.view');
    Route::post('hotel/booking/status/edit/{id}','Backend\Hotel\HotelBookingController@hotel_booking_edit')->name('hotel.booking.status.edit');
    //only one
    Route::delete('hotel/booking/delete/{id}','Backend\Hotel\HotelBookingController@hotel_booking_destroy')->name('hotel.booking.destroy');
    //group
    Route::delete('hotel/booking_all/delete/{booking_id}','Backend\Hotel\HotelBookingController@hotel_booking_destroy_all')->name('hotel.booking_all.destroy');

    //WishList
    Route::get('hotel_wishlist','Backend\Hotel\HotelWishlistController@index')->name('hotel.wishlist.index');
    Route::get('hotel_wishlist/search','Backend\Hotel\HotelWishlistController@search')->name('hotel.wishlist.search');



    

    
});

