<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $table='coupons';
    protected $fillable=[
        'title',
        'code',
        'status',
        'photo_id',
        'description',
        'expired',
        'created_at',
        'updated_at',
    ];

    public function photo()
    {
        return $this->belongsTo(Photo::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
