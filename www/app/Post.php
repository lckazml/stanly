<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function tag()
    {
        return $this->belongsToMany('\App\Tag');
    }

    /**
     * post和cate是属于关系   cate和post是一对多的关系
     */
    public function cate()
    {
        return $this->belongsTo('\App\Cate');
    }

    public function user()
    {
        return $this->belongsTo('\App\User');
    }
}
