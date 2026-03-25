<?php

namespace App\Listeners;

use App\Events\ResourceStored;
use App\Services\ImageService;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProcessResourceImages implements ShouldQueue
{
  public $queue = 'default';

  public function __construct(protected ImageService $imageService) {}

  public function handle(ResourceStored $event)
  {
    if (!empty($event->images)) {
      $this->imageService->groupAdminImages($event->images, $event->resource);
      $this->imageService->resizeImages($event->images, 'resources', $event->resource->id, $event->resource);
    }
  }
}