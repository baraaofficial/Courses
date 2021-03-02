<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Framework extends Model
{

    protected $table = 'frameworks';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = ['name_ar','name_en','description_ar','description_en','status','by', 'language_id'];

    public function attachment()
    {
        return $this->morphOne(Attachment::class,'attachmentable');
    }
    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    public function getPhotoAttribute()
    {
        return $this->attachment ?
            asset($this->attachment->path) :
            asset('admin/global_assets/images/placeholders/placeholder.jpg');
    }
    public function frameworks()
    {
        return $this->hasMany(Article::class,'framework_id');
    }

    public function scopeStatus(){
        return $this->where('status' , 1);
    }
}
