<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsRevisor
{
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->user() && auth()->user()->is_revisor) {
            return $next($request);
        }

        return redirect()->route('homepage');
    }
}