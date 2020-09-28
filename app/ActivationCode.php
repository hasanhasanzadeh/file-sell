<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class ActivationCode extends Model
{
    protected $table='activation_codes';
    protected $fillable=[
        'user_id',
        'code',
        'used',
        'expire',
        'crated_at',
        'updated_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeCreateCode($query , $user)
    {
        $code=$this->code();
        return $query->create([
            'user_id'=>$user->id,
            'code'=>$code,
            'expire'=>Carbon::now()->addMinutes(4)
        ]);
    }

    private function code()
    {
            do{
                $code=mt_rand(10000,99999);
                $check_code=static::whereCode($code)->get();
            }while(!$check_code->isEmpty());
            return $code;
    }

}
