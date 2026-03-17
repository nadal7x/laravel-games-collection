<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\MySQL\Tag as DBTag;

class Tags
{
  static $composed;

  public function __construct(private DBTag $tags){}

  public function compose(View $view)
  {
    if(static::$composed)
    {
      return $view->with('tags', static::$composed);
    }

    static::$composed = $this->tags->orderBy('id', 'asc')->get();

    $view->with('tags', static::$composed);
  }
}