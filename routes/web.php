<?php

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

Route::get('/', function () {
    return view('index');
});
// Route::get('user', function () {
//     return view('user');
// });

Route::prefix('/')->group(function () {
    Route::get('index', function () {
    	return view('index');
    });
    Route::get('user', function () {
    	return view('user');
    });
    Route::get('table', function () {
    	return view('table');
    });
    Route::get('create', function () {
    	return view('create');
    });
    Route::get('maps', function () {
        return view('maps');
    });
    Route::get('icons', function () {
    	return view('icons');
    });
    Route::get('notifications', function () {
    	return view('notifications');
    });
});

Route::resource('create','ArticlesController');
Route::resource('items','itemController');
Route::get('table', 'ArticlesController@table');
Route::get('aboutus', 'PagesController@about');