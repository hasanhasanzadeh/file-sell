<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table='articles';
    protected $fillable=[
        'id',
        'title',
        'slug',
        'body',
        'description',
        'tags',
        'meta_keywords',
        'meta_title',
        'meta_description',
        'user_id',
        'photo_id',
        'category_id',
        'viewCount',
        'likeCount',
        'commentCount',
        'created_at',
        'updated_at'
    ];

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

    public function comments()
    {
        return $this->morphMany(Comment::class,'commentable');
    }

}
