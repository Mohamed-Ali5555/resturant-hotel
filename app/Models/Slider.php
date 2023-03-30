<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    use  Translatable;
    protected $fillable=["image","route"];

    protected $with=['translations'];
    protected $translatedAttributes=["text"];
}
