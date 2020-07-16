<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*
http://laravadmin.test/api/user?api_token=A2EZwOnVipr45kJ4kICXdYmowOPwYg5C5GYG4ci1m1g3k3l87ubnuFpOmvQGR7VgP7fM28TYVnrm9OAq
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
