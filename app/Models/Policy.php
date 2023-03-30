<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Policy extends Model
{
    use HasFactory;
    use  Translatable;
    protected $fillable=["icon"];

    protected $with=['translations'];
    protected $translatedAttributes=["title","description"];
}