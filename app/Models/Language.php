<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Language extends Model
{

    protected $table = 'languages';
    public $timestamps = true;
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = ['name_ar','name_en','description_ar','description_en','status','by'];

    public function attachment()
    {
        return $this->morphOne(Attachment::class,'attachmentable');
    }
    public function frameworks(){

        return $this->hasMany(Framework::class,'language_id');
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

