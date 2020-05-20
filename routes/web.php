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

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
Route::get('/', 'HomeController@index');
Route::get('/movie/{id}','ContentPageController@movie');
Route::get('/series/{id}/{epId}',function($id){
    return view('series');
});
Route::post('/movie/comment','ContentPageController@movieComment');
/*Route::get('/catalog',function(){
    return view('catalog');
});*/

Route::get('/movies-catalog', 'HomeController@catalogM');
Route::get('/series-catalog', 'HomeController@catalogS');
Route::get('/watched-top100', 'HomeController@watched');
Route::get('/rated-top100', 'HomeController@rated');

Route::prefix('admin')->group(function() {
    Route::get('/', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/panel', 'AdminController@index')->name('admin.home');
});

Route::get('/profile', 'Auth\ProfileController@profile');
Route::post('/profile/change-password', 'Auth\ProfileController@changePassword')->name('password.update');
Route::get('/premium', 'Auth\ProfileController@premium');
Route::post('/activate-premium', 'Auth\ProfileController@activatePremium')->name('premium.activate');
Route::post('/profile/change-name', 'Auth\ProfileController@changeName')->name('name.change');
Route::post('/profile/change-photo', 'Auth\ProfileController@changePhoto')->name('photo.change');
Route::delete('/delete-premium', 'Auth\ProfileController@deletePremium')->name('premium.delete');
Route::delete('/delete-profile', 'Auth\ProfileController@deleteProfile')->name('user.delete');

Route::get('/offer', 'HomeController@offer');