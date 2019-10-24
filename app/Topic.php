<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $fillable = ['title', 'content', 'user_id'];
    
    public function user()
    {
    return $this->belongsTo(User::class);
    }
    
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
    public function favorite_users()
    {
        return $this->belongsToMany(User::class, 'favorites', 'topic_id', 'user_id');
    }
}
