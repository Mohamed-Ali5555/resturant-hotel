<?php

use Illuminate\Support\Facades\Route;

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


Route::post('file-upload/upload-large-files', 'FileUploadController@uploadLargeFiles')
    ->name('files.upload.large');
Route::get('remove_image', 'FileUploadController@remove_image')
    ->name('remove_image');
Route::group(['namespace'=>'Frontend'],function() {
    Route::get('/sitemap.xml', 'HomeController@site_map');
    Route::get('/', "HomeController@index")->name("home");
    Route::get('/accommodations', "HomeController@accommodations")->name("accommodations");
    Route::get('/check_rate', "HomeController@check_rate")->name("check_rate");
    Route::get('/dining', "HomeController@dining")->name("dining");
    Route::get('/gallery', "HomeController@gallery")->name("gallery");
    Route::get('/activities', "HomeController@activities")->name("activities");
    Route::get('/spa', "HomeController@spa")->name("spa");
    Route::get('/spa/{id}/{slug}', "HomeController@show_spa")->name("show_spa");
    Route::get('/offer', "HomeController@offer")->name("offer");
     Route::post('reservation',"HomeController@reservation")->name('reservation');
     Route::post('booking',"HomeController@booking")->name('booking');
     Route::post('subscribe',"HomeController@subscribe")->name('subscribe');
     Route::get('check_reservation',"HomeController@check_reservation")->name('check_reservation');
    Route::get('room/{id}/{slug}','HomeController@show_room')->name("show_rom");
    Route::get('resort/{id}/{slug}','HomeController@show_resort')->name("show_resort");
    Route::get('news/{id}/{slug}','HomeController@show_news')->name("show_news");
    Route::get('show_restaurant/{id}/{slug}','HomeController@show_restaurant')->name("show_restaurant");
    Route::get('/meeting', "HomeController@meeting")->name("meeting");
    Route::get('/meeting/{id}/{slug}', "HomeController@show_meeting")->name("show_meeting");
    Route::get('/wedding', "HomeController@wedding")->name("wedding");
    Route::get('/wedding/{id}/{slug}', "HomeController@show_wedding")->name("show_wedding");
    Route::get('/private', "HomeController@private")->name("private");
    Route::get('/contact', "HomeController@contact")->name("contact");
    Route::post('/save_contact', "HomeController@save_contact")->name("save_contact");

});
Route::get('404',
function (){
    return view('frontend.404');
}
)->name('404');




//Route::fallback(function (){
//    return redirect()->route('404');
//});


Auth::routes();


