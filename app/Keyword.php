<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keyword extends Model
{
    protected $fillable = [
        'keyword',
    ];

    public function articles()
    {
        return $this->belongsToMany('App\Keyword');
    }
}
