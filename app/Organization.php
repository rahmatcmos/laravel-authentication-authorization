<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    protected $fillable = ['name', 'organization_id'];

    public function admin()
    {
        return $this->belongsTo('App\User', 'admin_id');
    }
}
