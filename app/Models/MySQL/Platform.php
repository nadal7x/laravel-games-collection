<?php

namespace App\Models\MySQL;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Resource;
use App\Models\ResourcePlatform;

class Platform extends Model
{
    use SoftDeletes;

    protected $guarded = [];
    protected $dates = ['deleted_at'];

    public function resources()
    {
        return $this->hasManyThrough(Resource::class, ResourcePlatform::class);
    }
}