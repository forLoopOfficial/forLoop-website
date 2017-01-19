<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/about', 'AboutController@index');
Route::get('/team', 'HomeController@team');
Route::get('/members', 'HomeController@members');
Route::get('/event', 'HomeController@events');
Route::get('/home', 'HomeController@home');
Route::get('/meetups', 'HomeController@meetup');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function() {

    Route::get('{any?}', function($any = null) {
      return view('admin.index');
    })->where('any', '.*');
});


    // Route::get('/', 'DashboardController@index');
    //
    // Route::get('login', 'LoginController@index');
    // Route::post('login', 'LoginController@index');
    //
    // Route::get('events', 'EventController@index');
    // Route::post('events', 'EventController@index');
    //
    // Route::get('sponsors', 'SponsorController@index');
    // Route::put('sponsors', 'SponsorController@index');
    // Route::post('sponsors', 'SponsorController@index');
    // Route::delete('sponsors', 'SponsorController@index');
    //
    // Route::group(['prefix' => 'pages'], function() {
    //
    //   Route::get('about', 'LoginController@index');
    //   Route::post('about', 'LoginController@index');
    //
    //   Route::get('team', 'LoginController@index');
    //   Route::post('team', 'LoginController@index');
    //
    //
    //   Route::get('members', 'LoginController@index');
    //   Route::post('members', 'LoginController@index');
