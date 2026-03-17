<?php

namespace App\Http\Controllers\Public;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Models\MySQL\Sitemap;

class LangController extends Controller
{
    public function changeLang(Request $request, Sitemap $sitemap)
    {
      $lang = $request->lang;
      $path = $request->path;

      $sitemap = $sitemap->where('path', $path)->first();

      if ($sitemap) {
        $route_name = $sitemap->route_name;
        $route_name_parts = explode('.', $route_name, 2);
        $route_name = $lang . '.' . $route_name_parts[1];
      }

      $route = $sitemap->where('route_name', $route_name)->first();

              
      return response()->json(['route' => $route->path]);
    }
}