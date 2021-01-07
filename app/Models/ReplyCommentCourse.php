<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReplyCommentCourse extends Model 
{

    protected $table = 'replysCommentsCourses';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('reply', 'comment_id', 'user_id');

}