<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model
{
    protected $table = 'teachers';
    public $timestamps = true;
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('name','nick_name','email','phone','followers','location','bio','situation',
        'facebook','twitter','github','linkedin','status');


    public function attachment()
    {
        return $this->morphOne(Attachment::class,'attachmentable');
    }


    public function getPhotoAttribute()
    {
        return $this->attachment ?
            asset($this->attachment->path) :
            asset('admin/global_assets/images/placeholders/placeholder.jpg');
    }


    public function scopeStatus(){
        return $this->where('status' , 1);
    }
}
