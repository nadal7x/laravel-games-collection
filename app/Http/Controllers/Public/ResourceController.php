<?php

namespace App\Http\Controllers\Public;

use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use App\Models\MongoDB\Resource;
use Illuminate\Http\Request;
use App\Services\SitemapService;

class ResourceController extends Controller
{
    public function __construct(private Resource $resource, private SitemapService $sitemapService) {}

    public function index()
    {
        try {
            $resources = $this->resource->all();

            return View::make('public.home.index')->with('records', $resources)->with('element', null);
        } catch (\Exception $e) {
            return View::make('public.error');
        }
    }

    public function show(Request $request)
    {
        try {
            $resource = $this->resource->where('_id', $request->attributes->get('sitemap')->entity_id )->first();

            $view = View::make('public.home.show')->with('resource', $resource);
      
            return $view;
        } catch (\Exception $e) {
            return View::make('public.error');
        }
    }
}