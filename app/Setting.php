<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table='settings';
    protected $fillable=[
      'title',
      'banner',
      'icon_image',
      'description_banner',
        'telegram',
        'instagram',
        'youtube',
        'twitter',
        'email',
        'telegram_id',
        'about',
        'copy_right',
    ];
}
