<?php

namespace App\Models\MongoDB;

use MongoDB\Laravel\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Resource extends Model
{
    use SoftDeletes;

    protected $connection = 'mongodb';
    protected $table = 'resources';
    protected $primaryKey = '_id';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = true;

    protected $guarded = [];
    
    public function getRouteKeyName()
    {
        return '_id';
    }
}
