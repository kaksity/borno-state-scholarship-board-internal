<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifyApplicant
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $loggedInApplicant = auth('applicant')->user();

        if(is_null($loggedInApplicant->verified_at)) {
            return redirect()->route(
                'applicant.applicant-verification.index'
            )->with(
                'status',
                'You need to confirm your account. We have sent you an activation code, please check your email.'
            );
        }
        return $next($request);
    }
}
