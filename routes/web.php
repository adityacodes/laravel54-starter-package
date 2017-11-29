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
	Route::get('register', 'Admin\RegisterController@showRegistrationForm')->middleware('admin_reg_status')->name('admin.register');
	Route::post('register', 'Admin\RegisterController@register')->name('admin.register.save')->middleware('admin_reg_status');
	Route::get('login', 'Admin\LoginController@showLoginForm')->name('admin.login');
	Route::post('login', 'Admin\LoginController@login');
	Route::get('password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
	Route::post('password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
	Route::get('password/reset/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.passwordreset.token');
	Route::post('password/reset', 'Admin\ResetPasswordController@reset')->name('admin.passwordreset.save');
});

Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function(){
	
	Route::get('profile', 'Admin\AdminController@getProfile')->name('admin.profile');
	Route::post('profile', 'Admin\AdminController@postProfile')->name('admin.profile.save');
	Route::post('logout', 'Admin\LoginController@logout')->name('admin.logout');


	Route::get('users', 'Admin\AdminController@getAllUsers')->name('admin.users');
	Route::get('user/{id}', 'Admin\AdminController@getShowUser')->name('admin.user.show');
	Route::get('user/{id}/edit', 'Admin\AdminController@getEditUser')->name('admin.user.edit');
	Route::post('user/{id}/edit', 'Admin\AdminController@postEditUser')->name('user.save');
	Route::get('search/user/{keyword?}','Admin\AdminController@searchuser' )->name('admin.user.search');
	Route::get('dashboard', 'Admin\AdminController@getDashboard')->name('admin.dashboard');
	
	Route::get('settings', 'Admin\AdminController@getSettings')->name('admin.settings');
	Route::post('settings', 'Admin\AdminController@postSettings');
});


	
Route::get('/home', 'HomeController@index')->name('home');


Route::middleware(['setupinstaller'])->prefix('setup/{otp}')->group(function() {
	Route::get('/', 'SetupController@getStarted');
	Route::post('/', 'SetupController@postStarted')->name('storeenv');
});


Route::middleware(['maintenance'])->prefix(env('MAINTENANCE_URL').'/{password}')->group(function() {
	Route::get('/', 'SetupController@getMaintenance');
	Route::post('/', 'SetupController@postMaintenance')->name('postmn');
});
