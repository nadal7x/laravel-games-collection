<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\MySQL\Platform as DBPlatform;

class Platforms
{
  static $composed;

  public function __construct(private DBPlatform $platforms){}

  public function compose(View $view)
  {
    if(static::$composed)
    {
      return $view->with('platforms', static::$composed);
    }

    static::$composed = $this->platforms->orderBy('name', 'asc')->get();

    $view->with('platforms', static::$composed);
  }
}