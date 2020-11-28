<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    protected $fillable = [
        'issue_no',
        //'journal_id',
        //'volume_id',
    ];
/*
    public function journal()
    {
        return $this->belongsTo('App\Journal');
    }

    public function volume()
    {
        return $this->belongsTo('App\Volume');
    }

    public function articles()
    {
        return $this->hasMany('App\Article');
    }
*/
}
