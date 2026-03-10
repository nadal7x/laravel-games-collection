<?php

namespace App\Http\Controllers\Public;

use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use App\Models\Resource;
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
            $sitemap = $this->sitemapService->getSlug($request->resource);
           
            $resource = $this->resource->where('id', $sitemap->entity_id)->first();

            return view('public.home.show', compact('resource'));
        } catch (\Exception $e) {
            return View::make('public.error');
        }
    }
}