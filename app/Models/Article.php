<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{

    protected $table = 'articles';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('title_ar','title_en', 'content_ar','content_en','by','language_id','framework_id','level_id','status');


    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    public function framework()
    {
        return $this->belongsTo(Framework::class);
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
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
    public function scopeStatus(){
        return $this->where('status' , 1);
    }
}
