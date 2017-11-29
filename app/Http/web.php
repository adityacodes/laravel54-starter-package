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
    return view('welcome');
});

Auth::routes();
Route::get('register/verify/{confirmation_code}', 'Auth\RegisterController@confirm');

Route::group(['middleware' => 'admin_guest', 'prefix' => 'admin'], function() {
	Route::get('/', function(){	return redirect('admin/login'); });
	Route::get('register', 'Admin\RegisterController@showRegistrationForm')->middleware('admin_reg_status');
	Route::post('register', 'Admin\RegisterController@register')->middleware('admin_reg_status');
	Route::post('logout', 'Admin\LoginController@logout');
	Route::get('login', 'Admin\LoginController@showLoginForm');
	Route::post('login', 'Admin\LoginController@login');
	Route::get('password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm');
	Route::post('password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail');
	Route::get('password/reset/{token}', 'Admin\ResetPasswordController@showResetForm');
	Route::post('password/reset', 'Admin\ResetPasswordController@reset');
});

Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function(){
	Route::get('profile', 'Admin\AdminController@getProfile')->name('admin.profile');
	Route::get('users', 'Admin\AdminController@getAllUsers')->name('admin.users');
	Route::get('user/{id}', 'Admin\AdminController@getEditUser');
	Route::get('search/user/{keyword?}','Admin\AdminController@searchuser' );
	Route::post('logout', 'Admin\LoginController@logout');
	Route::get('dashboard', 'Admin\AdminController@getDashboard')->name('admin.dashboard');
});

Route::get('/home', 'HomeController@index')->name('home');
