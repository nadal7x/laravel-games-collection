<?php

namespace App\Http\Controllers\Public;

use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use App\Models\MySQL\Resource;
use Illuminate\Http\Request;
use App\Services\SitemapService;

class MovieController extends Controller
{
    public function __construct(private Movie $movie, private SitemapService $sitemapService) {}

    public function index()
    {
        try {
            $movies = $this->movie->all();

            $movies->each(function ($movie) {
                \Debugbar::info($movie->sitemap->slug);
            });

            return View::make('public.home')->with('movies', $movies);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function show(Request $request)
    {
        try {
            $sitemap = $this->sitemapService->getSlug($request->slug);
           
            $movie = $this->movie->where('id', $sitemap->entity_id)->first();

            return view('public.movie', compact('movie'));
        } catch (\Exception $e) {
            return response()->json([
                'message' => \Lang::get('admin/notification.error'),
            ], 500);
        }
    }
}