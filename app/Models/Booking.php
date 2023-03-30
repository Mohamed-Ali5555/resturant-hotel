<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable=[
        "room_id",
        "count_room",
            "start_date",
           "end_date",
            "first_name",
            "last_name",
        "phone",
        "email","country",
        "status"
    ];
     public function rooms(){
          return $this->belongsTo(Room::class,"room_id");
     }
}
