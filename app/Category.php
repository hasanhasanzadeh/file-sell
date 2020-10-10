<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table='categories';
    protected $fillable=[
        'name',
        'parent_id',
        'meta_title',
        'meta_keywords',
        'meta_description',
        'created_at',
        'updated_at'
    ];

    public function children()
    {
        return $this->hasMany(Category::class,'parent_id');
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function podcasts()
    {
        return $this->hasMany(Podcast::class);
    }
    public function gazettes()
    {
        return $this->hasMany(Gazette::class);
    }
}
