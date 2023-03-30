<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomPlan extends Model
{
    use HasFactory;
    protected $fillable=["room_id"
            ,"description"
            ,"x_image_plan"
            ,"y_image_plan"
            ,"w_image_plan"
            ,"h_image_plan"];
}
