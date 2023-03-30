<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeetingItem extends Model
{
    use HasFactory;
    use  Translatable;
    protected $fillable=["size","image","banquet","classroom","reception"];

    protected $with=['translations'];
    protected $translatedAttributes=["description","name"];
    public function images(){

        return $this->belongsToMany(Upload::class,"meeting_item_images",
            "metting_id","image");
    }
}
