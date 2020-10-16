<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Podcast extends Model
{
    protected $table='podcasts';
    protected $fillable=[
        'id',
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
    public function parts()
    {
        return $this->hasMany(Part::class);
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
    public function likes()
    {
        return $this->morphMany(Like::class,'likeable');
    }
}
