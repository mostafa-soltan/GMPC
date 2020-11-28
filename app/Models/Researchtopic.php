<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;


class Researchtopic extends Model
{
    use Searchable;

    protected $fillable = [
        'title',
        'overview',
        'editor1',
        'affiliation1',
        'editor2',
        'affiliation2',
        'editor3',
        'affiliation3',
        'editor4',
        'affiliation4',
        'journal_id',
    ];

    const SEARCHABLE_FIELDS = ['id', 'title', 'overview', 'keywords'];

    public function toSearchableArray()
    {
        return $this->only(self::SEARCHABLE_FIELDS);
    }

    public function photo()
    {
        return $this->morphOne('App\Models\Photo', 'photoable');
    }

    public function journal()
    {
        return $this->belongsTo('App\Models\Journal');
    }

    public function articles()
    {
        return $this->hasMany('App\Models\Article');
    }

}
