<?php

namespace App\Listeners;

use App\Events\ResourceStored;
use App\Services\SitemapService;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProcessResourceSitemap implements ShouldQueue
{
  public $queue = 'default';

  public function __construct(protected SitemapService $sitemapService) {}

  public function handle(ResourceStored $event)
  {
    foreach ($event->resource->locale as $language => $fields) {
      $slugs = ['title' => \Str::slug($fields['title'])];
      $this->sitemapService->updateOrCreateSlug('resources', $event->resource->id, $language, 'resource', $slugs);
    }
  }
}