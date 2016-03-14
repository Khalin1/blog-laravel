<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Post extends Model
{
    protected $table = 'posts';
    protected $fillable = ['title', 'text', 'user_id','category_id'];

    public function getCreatedAtAttribute($date){
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('j F Y  H:i');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }
}
