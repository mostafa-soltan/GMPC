<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    protected $fillable = [
        'name',
        'issn',
        'status',
    ];

    public function photo()
    {
        return $this->morphOne('App\Photo', 'photoable');
    }

    public function volumes()
    {
        return $this->hasMany('App\Volume');
    }
/*
    public function issues()
    {
        return $this->hasMany('App\Issue');
    }
*/
    public function articles()
    {
        return $this->hasMany('App\Article');
    }

    public function researchtopics()
    {
        return $this->hasMany('App\Researchtopic');
    }

    public function editors()
    {
        return $this->hasMany('App\Editor');
    }
}
