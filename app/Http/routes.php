<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'HomeController@index');
// Route::get('/orders', 'OrdersController@index');
// Route::get('/orders/new', 'OrdersController@create');
// Route::get('/orders/{id}', 'OrdersController@show');
// Route::post('/orders', 'OrdersController@store');
Route::resource('orders', 'OrdersController');
Route::post('orders/create', array('uses' => 'OrdersController@toApi'));
Route::controllers([
	'auth' => '\App\Http\Controllers\Auth\AuthController',
	'Password' => '\App\Http\Controllers\Auth\PasswordController',
	]);