<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

use App\Models\Tag;
use App\Models\Platform;

class Resource extends Model
{
    use SoftDeletes, HasFactory;

    protected $guarded = [];
    protected $dates = ['deleted_at'];

    public function tags()
    {
        return $this->hasManyThrough(Tag::class, ResourceTag::class);
    }

    public function platforms()
    {
        return $this->hasManyThrough(Platform::class, ResourcePlatform::class);
    }
}
