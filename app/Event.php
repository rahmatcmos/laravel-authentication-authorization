<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['organizer_id', 'name', 'description', 'location', 'begin_date', 'finish_date', 'published'];

    protected $casts = [
      'published' => 'boolean'
    ];
}
