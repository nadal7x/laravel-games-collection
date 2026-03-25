<?php

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ResourceStored
{
    use Dispatchable, SerializesModels;

    public function __construct(
        public $resource,
        public $images,
    ) {}
}