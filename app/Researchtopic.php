<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Researchtopic extends Model
{
    protected $fillable = [
        'title',
        'overview',
        'editor1',
        'editor2',
        'editor3',
        'editor4',
        'journal_id',
    ];

    public function photo()
    {
        return $this->morphOne('App\Photo', 'photoable');
    }

    public function journal()
    {
        return $this->belongsTo('App\Journal');
    }

    public function articles()
    {
        return $this->hasMany('App\Article');
    }
}
