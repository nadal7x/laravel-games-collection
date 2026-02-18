<?php

namespace App\Http\Controllers\Public;

use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use App\Models\Resource;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function __construct(private Resource $resource){}
 
  public function index()
  {
    try{
      $records = $this->resource
        ->orderBy('created_at', 'desc')
        ->paginate(10);

      $view = View::make('public.home.index')
         ->with('records', $records)
         ->with('element', null);

      return $view;
    }
    catch(\Exception $e){
     
    }
  }

  public function show(Resource $resource)
  {
    try{
      $view = View::make('public.home.show')
         ->with('records', $resource)
         ->with('element', $resource);

      return $view;
    }
    catch(\Exception $e){
     
    }
  }

 
}