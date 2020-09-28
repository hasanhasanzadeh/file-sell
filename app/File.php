<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $uploads='/storage/files/';
    protected $table='files';
    protected $fillable=[
      'original_name',
      'path',
      'size_file',
      'time_file',
      'created_at',
      'updated_at',
    ];

//    public function episode()
//    {
//        return $this->belongsTo(Episode::class);
//    }

    public function getPathAttribute($file)
    {
        return $this->uploads.$file;
    }
}
