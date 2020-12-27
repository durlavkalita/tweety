<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use App\Models\Tweet;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'name',
        'email',
        'password',
        'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAvatarAttribute($value)
    {
        return asset($value ? 'storage/'.$value : 'images/banner.png');
        // return "https://i.pravatar.cc/150?u=".$this->email;
    }
    // public function setPasswordAttribute($value)
    // {
    //     $this->validated['password'] = (Hash::needsRehash($value)) ? bcrypt($value) : $value;
    // }

    public function timeline()
    {
        $ids = $this->follows()->pluck('id');
        $ids->push($this->id);
        return Tweet::whereIn('user_id', $ids)
        ->withLikes()
        ->latest()
        ->paginate(50);
    }

    public function tweets()
    {
        return $this->hasMany(Tweet::class)->latest();
    }

    public function follow(User $user)
    {
        return $this->follows()->save($user);
    }

    public function unfollow(User $user)
    {
        return $this->follows()->detach($user);
    }

    public function toggleFollow(User $user)
    {
        $this->follows()->toggle($user);   
    }

    public function follows()
    {
        return $this->belongsToMany(User::class, 'follows', 'user_id', 'following_user_id');
    }

    public function following(User $user)
    {
        return $this->follows()
        ->where('following_user_id', $user->id)
        ->exists();
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

}
