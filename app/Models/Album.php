<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;
    use HasFactory;
    use  Translatable;
    protected $fillable=["image",'type_id'];

    protected $with=['translations'];
    protected $translatedAttributes=["title","description"];
     public function types(){
          return $this->belongsTo(PhotoType::class,"type_id");
     }
}
