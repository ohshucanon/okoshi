<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Notifications\CustomResetPassword;


class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','activitybase', 'activityarea',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    protected $table = 'users';
    protected $dates = ['delete_at'];
    
    
    public function topics()
    {
        return $this->hasMany(Topic::class);
    }
    
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
    public function favorites()
    {
        return $this->belongsToMany(Topic::class, 'favorites', 'user_id', 'topic_id');
    }
    
    public function is_favorite($topicId)
    {
        return $this->favorites()->where('topic_id', $topicId)->exists();
    }
    
    public function favorite($topicId)
    {
        // 既にお気に入りにしてるか
        $exist = $this->is_favorite($topicId);
        
        if ($exist) 
        {
            // 既にしてれば何もしない
            return false;
        } else {
            // してなければする
            $this->favorites()->attach($topicId);
            return true;
        }
    }
    
    public function unfavorite($topicId)
    {
        // 既にお気に入りにしてるか
        $exist = $this->is_favorite($topicId);
        
        if ($exist) 
        {
            // 既にしてればお気に入りから外す
            $this->favorites()->detach($topicId);
            return true;
        } else {
            // してなければ何もしない
            return false;
        }
    }
    
    /**
     * パスワード再設定メールの送信
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new CustomResetPassword($token));
    }
}
