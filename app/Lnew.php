<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lnew extends Model
{
    protected $fillable = [
        'title',
        'body',
        'author',
        'publish_date',
    ];

    public function photo ()
    {
        return $this->morphOne('App\Photo', 'photoable');
    }
}
