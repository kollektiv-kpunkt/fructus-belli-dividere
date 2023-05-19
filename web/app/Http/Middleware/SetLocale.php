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
     *
     * TODO: Add session support
     */
    public function handle(Request $request, Closure $next)
    {
        $available_locales = ["de", "fr"];
        $domains = [
            "kriegsgewinne.ch" => "de",
            "www.kriegsgewinne.ch" => "de",
            "profitsdeguerre.ch" => "fr",
            "www.profitsdeguerre.ch" => "fr",
            "pn81.victorinus.ch" => "de",
            "fr.pn81.victorinus.ch" => "fr",
            "pn81.ddev.site" => "de",
            "fr.pn81.ddev.site" => "fr",
        ];
        if (array_key_exists($request->getHost(), $domains)) {
            app()->setLocale($domains[$request->getHost()]);
        } else {
            app()->setLocale("de");
        }
        session()->put("locale", app()->getLocale());
        return $next($request);
    }
}
