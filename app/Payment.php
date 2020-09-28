<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table='payments';
    protected $fillable=[
        'RefID',
        'order_id',
        'authority',
        'status',
        'created_at',
        'updated_at',
    ];

    public function order()
    {
        return $this->hasOne(Order::class);
    }
}
