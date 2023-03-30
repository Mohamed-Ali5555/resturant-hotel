<?php

use Illuminate\Support\Facades\Route;
//Route::get('show_invoice/{id}','Backend\InvoiceController@show_invoice')->name('show_invoice');
Route::group(['middleware'=>'guest','namespace'=>'Backend'],function() {
    Route::get('/login','usercontroller@login')->name('admin.login');
    Route::post('/login','usercontroller@auth_admin')->name('admin.auth');
    Route::post('/register','usercontroller@register_user')->name('user.register');
    Route::post('/new_password','usercontroller@new_password')->name('new_password');
   Route::get('verify_email','usercontroller@verify_email')->name('verify_email');
    Route::get('/verify_email/{id}/{token}','usercontroller@verify_email_post')->name('verify_email_post');
    Route::get('/rest_password/{id}/{token}','usercontroller@rest_password')->name('rest_password');
 Route::get('/send_verify','usercontroller@send_verify')->name('send_verify');
 Route::post('/send_rest_password','usercontroller@send_rest_password')->name('send_rest_password');



});
Route::group(['middleware'=>'auth','namespace'=>'Backend','prefix'=>'dashboard'],function() {
    Route::get('/logout','usercontroller@logout')->name('admin.logout');
    Route::get('/','Dashboard@dashboard')->name('dashboard');

    Route::get('my_profile','usercontroller@my_profile')->name('my_profile');
    Route::post('save_profile','usercontroller@save_profile')->name('save_profile');
    Route::post('update_image','usercontroller@update_image')->name('update_image');
    Route::get('new_user/{type}','usercontroller@new_user')->name('new_user');




    Route::group(['middleware'=>'active_admin'],function (){
        Route::post('save_image','backendController@editor_upload')->name('save_image');
        Route::resource('settings','settingController');
        Route::resource('options','OptionController');
        Route::resource('roomviews','RoomViewController');
        Route::resource('rooms','RoomController');
        Route::resource('sliders','SliderController');
        Route::resource('policies','PolicyController');
        Route::resource('phototypes','PhotoTyptController');
        Route::resource('categories','CategoryController');
        Route::resource('albums','AlbumController');
        Route::resource('videos','VideoController');
        Route::resource('dinings','DiningCntroller');
        Route::resource('restaurants','RestaurantController');
        Route::resource('mealtypes','MealTypeController');
        Route::resource('meals','MealController');
        Route::resource('offers','OfferController');
        Route::resource('activities','ActivityController');
        Route::resource('divings','DivingController');
        Route::resource('spas','SpaController');
        Route::resource('spaitems','SpaItemController');
        Route::resource('itemspas','ItemSpaController');
        Route::resource('resorts','ResortController');
        Route::resource('meetings','MeetingController');
        Route::resource('meetingitems','MettingItemController');
        Route::resource('weddings','WeddingController');
        Route::resource('weddingitems','WeddingItemController');
        Route::resource('itemwediings','ItemWeddingController');
        Route::resource('bookings','ReservationController');
        Route::resource('contacts','ContactUs');
        Route::resource('subscribes','SubscribeController');
        Route::resource('news','NewsController');
        Route::get("request_reservation","ReservationController@request_reservation")->name('request_reservation');
        Route::get("approved_reservation","ReservationController@approved_reservation")->name('approved_reservation');

  Route::get("change_reservation","ReservationController@change_reservation")->name('change_reservation');

        Route::resource('users','ProductOptionController');


    });

});
