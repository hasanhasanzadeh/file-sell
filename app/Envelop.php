<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Envelop extends Model
{
    protected $table='envelops';
    protected $fillable=[
    'title','description','created_at','updated_at'
    ];
}
