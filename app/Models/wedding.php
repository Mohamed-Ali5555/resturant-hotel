<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wedding extends Model
{
    use HasFactory;
    use  Translatable;
    protected $fillable=["image"];

    protected $with=['translations'];
    protected $translatedAttributes=["description"];
}
