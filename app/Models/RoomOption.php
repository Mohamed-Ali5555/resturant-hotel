<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomOption extends Model
{

    protected $fillable=["room_id","option_id","short_value","value"];
    use HasFactory;



}
