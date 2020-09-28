<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $uploads='/storage/photos/';

    public function getPathAttribute($photo)
    {
        return $this->uploads.$photo;
    }

    protected $table='photos';
    protected $fillable=[
        'user_id',
        'path',
        'original_name',
        'created_at',
        'updated_at'
    ];


    public function coupon()
    {
        return $this->belongsTo(Coupon::class);
    }

    public function course()
    {
        return $this->hasOne(Course::class);
    }

    public function article()
    {
        return $this->hasOne(Article::class);
    }
}
