<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReplyCommentArticle extends Model 
{

    protected $table = 'replysCommentsArticles';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('reply', 'comment_id', 'user_id');

}