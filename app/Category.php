<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\DocBlock\Tags\Source;

class Category extends Model
{
    use Sluggable;
    protected $guarded = [];

    protected $casts = [
        'images' => 'array'
    ];
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function children()
    {
        return $this->hasMany(Category::class , 'parent_id' , 'id');
    }

    public function parent()
    {
        return $this->hasMany(Category::class , 'id' , 'parent_id');
    }

    public function articles(){
        return $this->belongsToMany(Article::class);
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug'=>[
                'source' => 'title'
            ]
        ];
    }
}
