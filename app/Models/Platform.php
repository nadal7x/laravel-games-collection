<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

use App\Models\Resource;

class Platform extends Model
{
    use SoftDeletes;

    protected $guarded = [];
    protected $dates = ['deleted_at'];

    public function resources()
    {
        return $this->belongsToMany(Resource::class);
    }
}