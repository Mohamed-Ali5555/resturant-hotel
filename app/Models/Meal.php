<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    use HasFactory;
    use  Translatable;
    protected $fillable=["image","type_id","restaurant_id","price"];

    protected $with=['translations'];
    protected $translatedAttributes=["name","description"];
     public function types(){
          return $this->belongsTo(MealType::class,"type_id");
     }
     public function restaurant(){
          return $this->belongsTo(Restaurant::class,"restaurant_id");
     }
}
