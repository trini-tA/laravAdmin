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
Auth::routes(['register' => false]);

Route::middleware(['web', 'auth'])->group(function () {

    Route::get('/', 'AdminController@index')->name('admin');
    Route::get('/admin', 'AdminController@index')->name('admin');
    
    Route::namespace('Admin')->group(function () {
        Route::resource( 'user', 'UserController' );
    });

    //test
    Route::get('/admin/user', function () {
        return view('admin.user.edit');
    });
});

