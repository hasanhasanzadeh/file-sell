<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','level','email_status','mobile','email','code','status','admin_active', 'password','photo_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'mobile_verified_at' => 'datetime',
    ];

    public function messages()
    {
        return $this->belongsTo(Message::class);
    }
    public function coupons()
    {
        return $this->belongsToMany(Coupon::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }

    public function photo()
    {
        return $this->belongsTo(Photo::class);
    }

    public function achievements()
    {
        return $this->hasMany(achievement::class);
    }
    public function isManager()
    {

            if ($this->level == 'admin'){
                return true;
            }
            if($this->level == 'author'){
                return true;
            }
            if ($this->level == 'editor'){
                return true;
            }
            return false;
    }
    public function isAuthor($newRole)
    {

        if ($this->level == $newRole){
            return true;
        }
        return false;
    }
    public function isEditor($newRole)
    {

        if ($this->level == $newRole){
            return true;
        }
        return false;
    }


    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function achievement()
    {
        return $this->hasMany(Achievement::class);
    }

    public function advertisements()
    {
        return $this->hasMany(Advertisement::class);
    }
}
