<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;


class Article extends Model
{
    use Searchable;
    protected $fillable = [
        'title',
        'abstract',
        'publication_date',
        'link',
        'doi',
        'status',
        'start_page',
        'end_page',
        'authors',
        'keywords',
        'journal_id',
        'volume',
        'year',
        'issue',
        'rtopic_id',
    ];

    const SEARCHABLE_FIELDS = ['id', 'title', 'abstract', 'keywords'];

    public function toSearchableArray()
    {
        return $this->only(self::SEARCHABLE_FIELDS);
    }

    public function journal()
    {
        return $this->belongsTo('App\Models\Journal');
    }
/*
    public function volume()
    {
        return $this->belongsTo('App\Volume');
    }

    public function issue()
    {
        return $this->belongsTo('App\Issue');
    }
*/
    public function researchtopic()
    {
        return $this->belongsTo('App\Models\Researchtopic');
    }

    public function authors()
    {
        return $this->belongsToMany('App\Models\Author');
    }

    public function keywords()
    {
        return $this->belongsToMany('App\Models\Keyword');
    }

}
