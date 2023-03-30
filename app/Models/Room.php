<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    use  Translatable;
    protected $fillable=["size","image","active","adult","lat","lang","plan","count","use","price","category_id","view_id"];

    protected $with=['translations'];
    protected $translatedAttributes=["name","description"];
     public function options(){
         return $this->belongsToMany(Option::class,"room_options","room_id",
             "option_id")->withPivot("short_value","value");
     }
     public function views(){
         return $this->belongsToMany(RoomView::class,"view_rooms","room_id",
             "view_id")->withPivot("count");
     }
      public function plans(){
          return $this->hasMany(RoomPlan::class,"room_id");
      }
      public function images(){

         return $this->belongsToMany(Upload::class,"room_images","room_id","image_id");
      }
       public function policies(){
         return $this->hasMany(RoomPolicy::class,"room_id");
       }
        public function prices(){
          return $this->hasMany(RoomPrice::class,"room_id");
        }
         public function single_view(){
          return $this->belongsTo(RoomView::class,"view_id");
         }

            public function categories(){
          return $this->belongsTo(Category::class,"category_id");
         }

}
