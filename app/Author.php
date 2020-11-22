<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = [
        'fname',
        'lname',
        'affiliation',
        'article_id',
    ];

    public function articles()
    {
        return $this->belongsToMany('App\Article');
    }
}
