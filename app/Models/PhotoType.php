<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhotoType extends Model
{
    use HasFactory;
    use HasFactory;
    use  Translatable;
    protected $fillable=[];

    protected $with=['translations'];
    protected $translatedAttributes=["name"];
     public function images(){
          return $this->hasMany(Album::class,"type_id");
     }
}
