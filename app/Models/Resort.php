<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resort extends Model
{
    use HasFactory;
    use Translatable;
    protected $fillable=['image'];
    protected $translatedAttributes=["name","description"];
    public function images(){
         return $this->belongsToMany(Upload::class,"resort_images",
             "resort_id","image");
    }
}
