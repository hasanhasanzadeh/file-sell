<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    protected $table='episodes';
    protected $fillable=[

        'title',
        'slug',
        'body',
        'description',
        'tags',
        'number',
        'file_time',
        'file_size',
        'file_url',
        'viewCount',
        'likeCount',
        'commentCount',
        'downloadCount',
        'type',
        'created_at',
        'updated_at'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }


}
