<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Volume extends Model
{
    protected $fillable = [
        'volume_no',
        'year',
        //'journal_id',
    ];
/*
    public function journal()
    {
        return $this->belongsTo('App\Journal');
    }

    public function issues()
    {
        return $this->hasMany('App\Issue');
    }
*/
}
