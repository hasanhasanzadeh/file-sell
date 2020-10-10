<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    protected $table='advertisements';
    protected $fillable=[
      'title',
      'body',
      'url_address',
      'photo_id',
      'user_id',
      'status',
      'payment_id',
      'created_at',
      'updated_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function photo()
    {
        return $this->belongsTo(Photo::class);
    }
}
