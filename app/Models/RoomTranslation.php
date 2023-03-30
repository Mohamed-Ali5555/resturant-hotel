<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomTranslation extends Model
{
    use HasFactory;
    protected $fillable=["name","description"];
}
