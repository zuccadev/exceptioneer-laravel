<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Project extends Eloquent
{
    protected $fillable = [
        'name',
        'project_id',
        'api_key'
    ];

    public function notifications()
    {
        return $this->hasMany('App\Notification');
    }

    public function scopeListing($query) {
        return $query->orderBy('name', 'asc');
    }
}