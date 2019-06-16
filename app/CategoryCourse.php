<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class CategoryCourse extends Model
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

    public function path(){
        return "/category_courses/$this->slug";
    }
    public function children()
    {
        return $this->hasMany(CategoryCourse::class , 'parent_id' , 'id');
    }

    public function parent()
    {
        return $this->hasMany(CategoryCourse::class , 'id' , 'parent_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
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
