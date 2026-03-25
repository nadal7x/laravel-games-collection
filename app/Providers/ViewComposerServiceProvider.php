<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
      #Admin

      view()->composer([
        'components.lang-select',
        'components.form.lang',
        'components.form.resource-images',
        'components.form.images'
      ],
        'App\Http\ViewComposers\Lang'
      );


      view()->composer([
        'components.tags-select'
      ],
        'App\Http\ViewComposers\Tags'
      );

      view()->composer([
        'components.platforms-select'
      ],
        'App\Http\ViewComposers\Platforms'
      );

      view()->composer([
        'components.form.modal-images'
      ],
        'App\Http\ViewComposers\Images'
      );
    }
}