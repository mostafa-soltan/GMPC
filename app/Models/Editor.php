<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Editor extends Model
{
    protected $fillable = [
        'name',
        'affiliation',
        'chief_in_editor',
        'topic',
        'journal_id',
    ];

    public function journal()
    {
        return $this->belongsTo('App\Models\Journal');
    }

    public function photo()
    {
        return $this->morphOne('App\Models\Photo', 'photoable');
    }
}
