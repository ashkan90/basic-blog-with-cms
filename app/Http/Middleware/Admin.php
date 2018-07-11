<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Admin
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
        if (!Auth::users()->admin) {
            $notification = [
                'message' => 'You do not have permission to perform this action',
                'alert-type' => 'danger'
            ];
            return redirect()->back()->with($notification);
        }

        return $next($request);
    }
}
