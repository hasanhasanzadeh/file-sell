<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    protected $table='achievements';
    protected $fillable=[
      'title',
      'body',
      'status',
      'user_id',
      'created_at',
      'updated_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
