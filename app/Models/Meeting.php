<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    use HasFactory;
    use  Translatable;
    protected $fillable=["image"];

    protected $with=['translations'];
    protected $translatedAttributes=["description"];
    public function images(){

        return $this->belongsToMany(Upload::class,"meeting_images","meeting_id","image");
    }
}
