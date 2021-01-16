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
    protected $fillable = ['name_ar','name_en','description_ar','description_en','image','status','by'];

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
            asset($this->attachment->path) : null;
    }
  /*  public function getHomePhotoAttribute()
    {
        return $this->attachments()->where('usage', 'home_photo')->first() ?
            asset($this->attachments()->where('usage', 'home_photo')->first()->path) : '';
    }

    public function getCategoryPhotosAttribute()
    {
        if($this->attachments()->where('usage', 'category_photo')->count())
        {
            $returnArray = [];

            foreach ($this->attachments()->where('usage', 'category_photo')->get() as $photo)
            {
                array_push($returnArray , asset($photo->path));
            }
        }else{
            $returnArray = [
                asset('photo/in_city_1.jpeg'),
                asset('photo/in_city_2.jpeg'),
            ];
        }

        return $returnArray;
    }*/

    public function scopeStatus(){
        return $this->where('status' , 1);
    }
}

