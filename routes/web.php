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
Route::get('/series/{id}/{epId}','ContentPageController@serie');
Route::post('/movie/comment','ContentPageController@movieComment');
Route::post('/movie/review','ContentPageController@movieReview');
Route::post('/serie/comment','ContentPageController@serieComment');
Route::post('/serie/review','ContentPageController@serieReview');

Route::post('/movie/comment/like','ContentPageController@likeComment');
Route::post('/movie/comment/unlike','ContentPageController@unlikeComment');
Route::post('/movie/comment/report','ContentPageController@reportComment');
Route::post('/movie/report','ContentPageController@reportMovie');
Route::post('/movie/playlist','ContentPageController@playlist');

Route::post('/serie/comment/like','ContentPageController@likeSerieComment');
Route::post('/serie/comment/unlike','ContentPageController@unlikeSerieComment');
Route::post('/serie/comment/report','ContentPageController@reportSerieComment');
Route::post('/serie/report','ContentPageController@reportEpisode');
Route::post('/serie/playlist','ContentPageController@playlistEpisode');

Route::get('/movies-catalog', 'HomeController@catalogM');
Route::get('/series-catalog', 'HomeController@catalogS');
Route::get('/watched-top100', 'HomeController@watched');
Route::get('/rated-top100', 'HomeController@rated');

Route::post('/catalog/filter', 'HomeController@filter');

Route::prefix('admin')->group(function() {
    Route::get('/', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/panel', 'AdminController@index')->name('admin.home');

    Route::get('/add-movie','AdminContentController@loadMovie');
    Route::get('/add-serie','AdminContentController@loadSerie');
    Route::get('/add-season','AdminContentController@loadSeason');
    Route::get('/add-episode','AdminContentController@loadEpisode');
    Route::get('/add-caption','AdminContentController@loadCaption');

    Route::post('/add-movie/form','AdminContentController@addMovie');
    Route::post('/add-serie/form','AdminContentController@addSerie');
    Route::post('/add-season/form','AdminContentController@addSeason');
    Route::post('/add-episode/form','AdminContentController@addEpisode');
    Route::post('/add-caption/form','AdminContentController@addCaption');
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
Route::post('/search', 'HomeController@search');

Route::get('/profile/playlist', 'Auth\ProfileController@playlist');