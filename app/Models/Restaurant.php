<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;
    use Translatable;
    protected $fillable=["type","start_time","end_time","image","indoor","outdoor"];
    protected $translatedAttributes=["name","description","service_type","dress_code"];
     public function images(){
          return $this->belongsToMany(Upload::class,"restaurant_images","restaurant_id","image_id");
     }
     public function times(){
          return $this->hasMany(RestaurantTime::class,"restaurant_id");
     }
    public function meals(){
        return $this->hasMany(Meal::class,"restaurant_id");
    }
}
