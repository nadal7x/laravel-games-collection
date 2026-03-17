<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\MySQL\Lang as DBLang;

class Lang
{
  static $composed;

  public function __construct(private DBLang $langs){}

  public function compose(View $view)
  {
    if(static::$composed)
    {
      return $view->with('langs', static::$composed);
    }

    static::$composed = $this->langs->where('active', true)->orderBy('id', 'asc')->get();

    $view->with('langs', static::$composed);
  }
}