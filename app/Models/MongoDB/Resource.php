<?php

namespace App\Models\MongoDB;

use MongoDB\Laravel\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Resource extends Model
{
    use SoftDeletes;

    protected $connection = 'mongodb';
    protected $table = 'resources';
    public $timestamps = true;

    protected $guarded = [];
    
    public function getRouteKeyName()
    {
        return '_id';
    }
}
