<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    use  Translatable;
    protected $fillable=["image"];

    protected $with=['translations'];
    protected $translatedAttributes=["title","description"];
     public function images(){
          return $this->belongsToMany(Upload::class,"news_images","news_id","image");
     }
}
