<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Lnew extends Model
{
    use Searchable;

    protected $fillable = [
        'title',
        'body',
        'author',
        'publish_date',
    ];

    const SEARCHABLE_FIELDS = ['id', 'title', 'body'];

    public function toSearchableArray()
    {
        return $this->only(self::SEARCHABLE_FIELDS);
    }

    public function photo ()
    {
        return $this->morphOne('App\Models\Photo', 'photoable');
    }

}
