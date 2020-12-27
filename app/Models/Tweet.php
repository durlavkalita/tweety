<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Like;
use Illuminate\Database\Eloquent\Builder;

class Tweet extends Model
{
    use HasFactory;

    protected $fillable = [ 'user_id', 'body' ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function dislike($user = null)
    {
        return $this->like($user, false);
    }

    public function like($user = null, $liked = true)
    {
        $this->likes()->updateOrCreate(
            [
                'user_id' => $user ? $user->id : auth()->user()->id,
            ],
            [
                'liked' => $liked,
            ]
        );
    }

    public function isLikedBy(User $user)
    {
        return (bool) $user->likes
        ->where('tweet_id', $this->id)
        ->where('liked', true)
        ->count();
    }

    public function isDislikedBy(User $user)
    {
        return (bool) $user->likes
        ->where('tweet_id', $this->id)
        ->where('liked', false)
        ->count();
    }

    public function scopeWithLikes(Builder $query)
    {
        $query->leftJoinSub(
            'select tweet_id, sum(liked) likes, sum(!liked) dislikes from likes group by tweet_id',
            'likes',
            'likes.tweet_id',
            'tweets.id'
        );
    }
}
