<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table='likes';
    protected $fillable=[
      'user_id',
      'likeable_id',
      'likeable_type',
      'created_at',
      'updated_at'
    ];

    public function likeable()
    {
        return $this->morphTo(Like::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
