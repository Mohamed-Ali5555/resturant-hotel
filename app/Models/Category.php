<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    use  Translatable;
    protected $fillable=[];

    protected $with=['translations'];
    protected $translatedAttributes=["name"];
}
