<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dining extends Model
{
    use HasFactory;
    Use Translatable;
    protected $fillable=["header_image","first_image","second_image","phone"];
    protected $translatedAttributes=["title","description"];
}
