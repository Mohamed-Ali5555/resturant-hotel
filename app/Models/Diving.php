<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diving extends Model
{
    use HasFactory;
    protected $fillable=[""];
    Use Translatable;
    protected $with=['translations'];
    protected $translatedAttributes=["name","description"];

}
