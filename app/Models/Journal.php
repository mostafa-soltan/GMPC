<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    protected $fillable = [
        'name',
        'issn',
        'abbreviation',
        'status',
    ];

    public function photo()
    {
        return $this->morphOne('App\Models\Photo', 'photoable');
    }

    public function volumes()
    {
        return $this->hasMany('App\Models\Volume');
    }
/*
    public function issues()
    {
        return $this->hasMany('App\Issue');
    }
*/
    public function articles()
    {
        return $this->hasMany('App\Models\Article');
    }

    public function researchtopics()
    {
        return $this->hasMany('App\Models\Researchtopic');
    }

    public function editors()
    {
        return $this->hasMany('App\Models\Editor');
    }
}
