<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\UserLog;
use Illuminate\Support\Facades\Auth;

class LogUserAccess
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            UserLog::create([
                'user_id' => Auth::id(),
                'action' => 'Accessed: ' . $request->path(),
                'ip_address' => $request->ip(),
                'user_agent' => $request->header('User-Agent'),
            ]);
        }

        return $next($request);
    }
}
