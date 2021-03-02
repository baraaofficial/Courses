<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Level extends Model
{

    protected $table = 'levels';
    public $timestamps = true;

    use SoftDeletes;


    protected $dates = ['deleted_at'];
    protected $fillable = ['level_ar','level_en','by','status'];


    public function levels()
    {
        return $this->hasMany(Article::class,'level_id');
    }

    public function scopeStatus(){
        return $this->where('status' , 1);
    }



}
