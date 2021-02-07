<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{

    protected $table = 'students';
    public $timestamps = true;

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name','username','bio','phone', 'password','email','location','status','theme','language'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopeStatus(){
        return $this->where('status' , 1);
    }


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
}
