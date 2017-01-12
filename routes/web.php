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
