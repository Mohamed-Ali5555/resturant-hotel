<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemWediing extends Model
{
    use HasFactory;
    use Translatable;
    protected $fillable=[""];
    protected $translatedAttributes=["name","description"];
}
