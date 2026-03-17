<?php

namespace App\Models\MySQL;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lang extends Model
{
  use SoftDeletes;

  protected $guarded = [];
  protected $dates = ['deleted_at'];
}