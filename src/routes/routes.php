<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['two_factor_auth']],function(){
	
	Route::get('/2fa','TwoFactorController@show2faForm');
	Route::post('/2fa','TwoFactorController@verifyToken');
});

