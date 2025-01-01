<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Str;

class ValidateUrl
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $url = $request->input('img_url');

        if ($url && !filter_var($url, FILTER_VALIDATE_URL)) {
            // to add error message
            dump('put a valid url');
            return redirect('/');
        }

        return $next($request);
    }
}
