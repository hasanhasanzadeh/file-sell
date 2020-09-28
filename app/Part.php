<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    protected $table='parts';
    protected $fillable=[
        'id',
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

    public function podcast()
    {
        return $this->belongsTo(Podcast::class);
    }
}
