<?php

use Illuminate\Support\Facades\Route;
use Shree\TwoFactor\Http\Controllers\TwoFactorController;
use Shree\TwoFactor\Http\Middleware\TwoFactorVerification;

Route::group(['middleware' => [TwoFactorVerification::class]],function(){
	
	Route::get('/2fa',[TwoFactorController::class,'show2faForm']);
	Route::post('/2fa-verify',[TwoFactorController::class,'verifyToken']);
});



