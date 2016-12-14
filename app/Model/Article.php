<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';
    protected $guarded = [];

    public function categories(){
        return $this->belongsToMany('App\Model\Category');
    }

    public function tags(){
        return $this->belongsToMany('App\Model\Tag');
    }

    public function comments(){
        return $this->hasMany('App\Model\Comment');
    }
}
