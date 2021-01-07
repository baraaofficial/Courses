<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Setting extends Model
{
    protected $table = 'settings';
    public $timestamps = true;
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('name','keyword','content','phone',
        'facebook','twitter','linkedin','youtube','instagram','mail','status');
}
