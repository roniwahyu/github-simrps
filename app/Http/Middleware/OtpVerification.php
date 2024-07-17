<?php
namespace App\Http\Middleware;
use Closure;
class OtpVerification
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
		$user = auth()->user();
        if(auth()->check() && $user->otp_code)
        {
			if(!$request->is('auth*'))
            {
                return redirect()->route('auth.verifyotp');
            }
        }
        return $next($request);
    }
}
