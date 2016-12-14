<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tags';
    protected $guarded = [];

    public function articles(){
        return $this->belongsToMany('App\Model\Article');
    }
}
