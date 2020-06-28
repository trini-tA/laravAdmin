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
    
    Route::namespace('Admin')->prefix('admin')->group(function () {

        
        //TODO:: change restriction 
        Route::group(['middleware' => ['role:superadministrator']], function() {
            Route::resource( 'user', 'UserController' );
            Route::resource( 'role', 'RoleController' );
            Route::resource( 'permission', 'PermissionController' );
            Route::get( 'assignment', 'PermissionController@assignment' )->name( 'assignment.index' );
            Route::post( 'assignment', 'PermissionController@assignmentStore' )->name( 'assignment.store' );

            Route::get( 'activity-logs', 'ActivityLogController@index' )->name('activity_log.index');
            Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->name('logs.index');

        });

        Route::get( 'contact', function(){
            return view( 'admin.contact');
        })->name( 'contact.index' );
    });

    
});

