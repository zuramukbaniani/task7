<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'desc', 'user_id'
    ];
    public function comment(){
        return $this->hasMany('App\Comment', 'post_id');
    }
}
