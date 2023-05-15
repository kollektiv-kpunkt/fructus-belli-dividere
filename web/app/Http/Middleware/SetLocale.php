<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetLocale
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
        $available_locales = ["de", "fr"];
        $domains = [
            "de" => "kriegsgewinne.ch",
            "fr" => "profitsdeguerre.ch"
        ];

        if (session()->has("locale")) {
            app()->setLocale(session()->get("locale"));
        } else {
            if (in_array($request->getPreferredLanguage(), $available_locales)) {
                app()->setLocale($request->getPreferredLanguage());
            } else if (in_array($request->getHost(), $domains)) {
                app()->setLocale(array_search($request->getHost(), $domains));
            } else {
                app()->setLocale("de");
            }

            session()->put("locale", app()->getLocale());
        }
        return $next($request);
    }
}
