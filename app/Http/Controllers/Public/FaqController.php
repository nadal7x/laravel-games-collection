<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\MongoDB\Faq;
use Illuminate\Support\Facades\View;

class FaqController extends Controller
{
    public function index()
    {
        try {
            $faqs = Faq::orderBy('created_at', 'desc')->get();


            return View::make('public.faqs.index')->with('faqs', $faqs);
        } catch (\Exception $e) {
            return View::make('public.error');
        }
    }
}