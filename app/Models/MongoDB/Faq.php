<?php

namespace App\Models\MongoDB;

use MongoDB\Laravel\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Faq extends Model
{
    use SoftDeletes;

    protected $connection = 'mongodb';
    protected $table = 'faqs';
    public $timestamps = true;

    protected $guarded = [];
    
    public function getRouteKeyName()
    {
        return '_id';
    }
}
