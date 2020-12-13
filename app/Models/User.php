<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
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

    public function tweets(){
        return $this->hasMany(Tweet::class)->latest();
    }

    public function timeline(){
        //return Tweet::where('user_id', $this->id)->latest()->get();
        $friends = $this->follows()->pluck('id');
        //$ids->push($this->id);
        
        return Tweet::whereIn('user_id', $friends)
        ->orWhere('user_id', $this->id)
        ->withLikes()
        ->latest()->paginate(50);
    }

    public function getAvatarAttribute($value)
    {
        if($value){
            return asset('storage/'.$value);
        }
        return asset('/images/default_avatar.png');
        
        //return 'https://i.pravatar.cc/200?u=' . $this->email;
    }

    public function follow(User $user){
        return $this->follows()->save($user);
    }

    public function unfollow(User $user){
        return $this->follows()->detach($user);
    }

    public function follows(){
        return $this->belongsToMany(User::class, 'follows', 'user_id', 'following_user_id');
    }

    public function following(User $user){
        return $this->follows()->where('following_user_id', $user->id)->exists();
    }

    public function toggleFollow(User $user){
        // if($this->following($user)){
        //     return $this->unfollow($user);
        // }
        // return $this->follow($user);

        $this->follows()->toggle($user);
    }

    public function path($append = '')
    {
        $path = route('profile', $this->username);

        return $append ? "{$path}/{$append}" : $path;
    }

    public function setPasswordAttribute($value)
    {
        return $this->attributes['password'] = bcrypt($value);
    }
    // public function getRouteKeyName(){
    //     return 'name';
    // }
    public function likes(){
        return $this->hasMany(Like::class);
    }
}
