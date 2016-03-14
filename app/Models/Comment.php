<?php

namespace App\Models;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $fillable = ['user_id', 'post_id', 'text'];

    public function post()
    {
        return $this->belongsTo('App\Models\Post');
    }

    public function getCreatedAtAttribute($date){
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('j F Y \a\t H:i');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
