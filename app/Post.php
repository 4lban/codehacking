<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    use Sluggable;
    use SluggableScopeHelpers;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    protected $fillable = [
        'title',
        'body',
        'category_id',
        'photo_id'
    ];

    // this post belong to user(author)
    public function user(){
        return $this->belongsTo('App\User');
    }

    // this post belong to that photo
    public function photo(){
        return $this->belongsTo('App\Photo');
    }

    // this post belong to that category
    public function category(){
        return $this->belongsTo('App\Category');
    }

    // this post has many comments
    public function comments(){
        return $this->hasMany('App\Comment');
    }

    public function photoPlaceHolder(){
        return "http://placehold.it/700x200";
    }

}
