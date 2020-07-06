<?php

namespace Shree\TwoFactor\Middleware;

use Closure;
use Shree\TwoFactor\Mail\TwoFactorAuthMail;

class TwoFactorVerification{

	public function handle($request, Closure $next){
		$user = auth()->user();
		if ($user->two_factor_expiry > \Carbon\Carbon::now()) {
		    return $next($request);
		}
		
		$user->two_factor_token = str_random(10);
		$user->save();
		\Mail::to($user)->send(new TwoFactorAuthMail($user->two_factor_token));
		return redirect('/2fa');

	}
	
}