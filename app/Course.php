<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table='courses';
    protected $fillable=[
        'title',
        'slug',
        'body',
        'description',
        'tags',
        'user_id',
        'photo_id',
        'category_id',
        'viewCount',
        'likeCount',
        'commentCount',
        'price',
        'type',
        'meta_title',
        'meta_keywords',
        'meta_description',
        'created_at',
        'updated_at'
    ];

    public function episodes()
    {
        return $this->hasMany(Episode::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function photo()
    {
        return $this->belongsTo(Photo::class);
    }

    public function presentPrice()
    {
        return number_format($this->price,0);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class,'commentable');
    }
}
