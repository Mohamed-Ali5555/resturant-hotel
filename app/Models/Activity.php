<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;
    use  Translatable;
    protected $fillable=["image"];

    protected $with=['translations'];
    protected $translatedAttributes=["name","description"];
     public function images(){
          return $this->belongsToMany(Upload::class,"activity_images","activity_id","image");
     }
}
