<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;
    use  Translatable;
    protected $fillable=["room_id","top","price","image","start_date","end_date","night_number","room_number"];

    protected $with=['translations'];
    protected $translatedAttributes=["name"];
     public function rooms(){
          return $this->belongsTo(Room::class,"room_id");
     }
}
