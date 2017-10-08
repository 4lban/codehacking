<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{
    //
    protected $fillable = [
        'comment_id',
        'is_active',
        'author',
        'email',
        'photo',
        'body'
    ];

    // this reply belongs to a comment
    public function comment(){
        return $this->belongsTo('App\Comment');
    }
}
