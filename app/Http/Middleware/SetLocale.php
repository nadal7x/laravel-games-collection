<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\MySQL\Lang;
use Illuminate\Support\Facades\App;

class SetLocale
{
    public function handle(Request $request, Closure $next): Response
    {
      $supported_locales = Lang::where('active', true)->pluck('code')->toArray(); 
      $lang = $request->getPreferredLanguage($supported_locales) ?? app()->getLocale();
      App::setLocale($lang);

      return redirect()->route($lang . '.home');
    }
}