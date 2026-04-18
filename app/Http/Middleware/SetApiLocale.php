<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetApiLocale
{
    public function handle(Request $request, Closure $next): Response
    {
        $locale = $request->query('lang')
            ?? $request->header('Accept-Language');

        if (is_string($locale) && str_contains($locale, ',')) {
            $locale = trim(explode(',', $locale)[0]);
        }

        if (is_string($locale) && str_contains($locale, '-')) {
            $locale = explode('-', $locale)[0];
        }

        $locale = is_string($locale) ? strtolower($locale) : '';

        if (in_array($locale, ['en', 'ar', 'de'], true)) {
            app()->setLocale($locale);
        } else {
            app()->setLocale(config('app.locale', 'ar'));
        }

        return $next($request);
    }
}
