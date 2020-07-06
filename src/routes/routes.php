<?php

use Illuminate\Support\Facades\Route;
use Shree\TwoFactor\Http\Controllers\TwoFactorController;

Route::group(['middleware' => ['two_factor_auth']],function(){
	
	Route::get('/2fa',[TwoFactorController::class,'show2faForm']);
	Route::post('/2fa-verify',[TwoFactorController::class,'verifyToken']);
});

