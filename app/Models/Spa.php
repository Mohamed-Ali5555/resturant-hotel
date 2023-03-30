<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spa extends Model
{
    use HasFactory;
    use Translatable;
    protected $fillable=["phone"];
    protected $translatedAttributes=["name","description"];
     public function images(){
         return $this->belongsToMany(Upload::class,"spa_images",
             "spa_id","image");
     }

}
