<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

use App\Models\Tag;
use App\Models\Platform;

class Resource extends Model
{
    use SoftDeletes;

    protected $guarded = [];
    protected $dates = ['deleted_at'];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function platforms()
    {
        return $this->belongsToMany(Platform::class);
    }
}
