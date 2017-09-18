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



Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function() {

    Route::get('{any?}', function($any = null) {
      return view('admin.index');
    })->where('any', '.*');
});


Route::group(['prefix' => ''], function() {

    Route::get('{any?}', function($any = null) {
      return view('index');
    })->where('any', '.*');
});
