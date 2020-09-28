<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table='comments';
    protected $fillable=[
        'user_id',
        'description',
        'status',
        'created_at',
        'updated_at',
    ];

    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }

    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }
}
