<?php

use Illuminate\Http\Request;

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

Route::group([
  'middleware' => 'api',
  'prefix' => 'auth',
], function ($router) {
  Route::post('login', 'AuthController@login');  
  Route::get('logout', 'AuthController@logout');
  Route::get('refresh', 'AuthController@refresh');
  Route::get('me', 'AuthController@me');
});

Route::group([
  'middleware' => ['api', 'jwt.auth'],
], function ($router) {
  Route::resource('company', 'CompanyController')->except(['create', 'edit']);
  Route::resource('employee', 'EmployeeController');
});