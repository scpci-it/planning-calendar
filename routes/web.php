<?php

Route::get('/',function(){
	return redirect('/calendar');
});

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/calendars', 'ProductionController@index');

Route::get('/calendar', 'ProductionController@calendar');
Route::get('/create', 'ProductionController@create');
Route::get('/{production}', 'ProductionController@show');
Route::get('/{production}/confirm', 'ProductionController@confirm');
Route::get('/{production}/unconfirm', 'ProductionController@unconfirm');
Route::get('/{production}/forecast', 'ProductionController@forecast');
Route::get('/{production}/unforecast', 'ProductionController@unforecast');


Route::post('/calendars','ProductionController@store');
Route::post('/calendar/update','ProductionController@ajax');
