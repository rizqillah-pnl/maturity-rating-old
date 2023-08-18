<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\UserLog;
use Illuminate\Http\Request;

class LogUserActivity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        if ($request->user()) {
            $userLog = new UserLog([
                'user_id' => $request->user()->id,
                'activity' => $request->getMethod() . ' ' . $request->getPathInfo()
            ]);
            $userLog->save();
        }

        return $response;
    }
}
