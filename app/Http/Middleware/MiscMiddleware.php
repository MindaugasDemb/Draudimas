<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\ShortCodeController;
use App\Models\ShortCode;

class MiscMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response= $next($request);
        $shortcodes=ShortCode::all();
        $html=$response->getContent();

        foreach ($shortcodes as $short_code) {
        $html=str_replace($short_code->shortcode,$short_code->replace, $html);
    }
        $response->setContent($html);

        return $response;

        /**/
    }
}
