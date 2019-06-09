<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use Sluggable;

    protected $guarded = [];

    protected $casts = [
        'images' => 'array'
    ];
/**
 * Return the sluggable configuration array for this model.
 *
 * @return array
 */public function sluggable(): array
    {
        return [
            'slug'=> [
                'source' => 'title'
            ]
        ];
    }

    public function getRouteKeyName()
    {
      return 'slug';
    }

    public function path()
    {
        return "/course/$this->slug";
    }
    public function setBodyAttribute($value)
    {
        $this->attributes['description'] = str_limit(preg_replace('/<[^>]*>/' , '' , $value) , 200);
        $this->attributes['body'] = $value;
    }
    public function categories()
    {
        return $this->belongsToMany(CategoryCourse::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function episode()
    {
        return $this->hasMany(Episode::class);
    }

}
