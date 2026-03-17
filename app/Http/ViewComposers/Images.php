<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\MongoDB\Image as DBImage;

class Images
{
  static $composed;

  public function __construct(private DBImage $images){}

  public function compose(View $view)
  {
    if(static::$composed)
    {
      return $view->with('images', static::$composed);
    }

    static::$composed = $this->images->orderBy('id', 'asc')->get();

    $view->with('images', static::$composed);
  }
}