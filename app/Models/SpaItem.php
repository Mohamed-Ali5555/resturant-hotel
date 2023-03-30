<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpaItem extends Model
{
    use HasFactory;
    use Translatable;
    protected $fillable=["image"];
    protected $translatedAttributes=["name","description","daily"];

}
