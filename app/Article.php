<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
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

    public function journal()
    {
        return $this->belongsTo('App\Journal');
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
        return $this->belongsTo('App\Researchtopic');
    }

    public function authors()
    {
        return $this->belongsToMany('App\Author');
    }

    public function keywords()
    {
        return $this->belongsToMany('App\Keyword');
    }
}
