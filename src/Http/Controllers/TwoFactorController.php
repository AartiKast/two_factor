<?php

namespace Shree\TwoFactor\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class TwoFactorController{

	// public function __construct(){
	// 	$this->middleware('TwoFactorVerification');
	// }

	public function show2faForm(){
		return view('twoFactor.2fa');
	}

	public function verifyToken(Request $request){
		$this->validate(['token' => 'required']);

		$user = auth()->user();
		if($request->token == $user->two_factor_token) {
			$user->two_factor_expiry = \Carbon\Carbon::now()->addMinutes(config('twoFactorConfig.lifetime'));
			$user->save();
			return redirect()->intended('/home');
		}
		return redirect('/2fa')->with('message','Incorrect Token');

	}
}