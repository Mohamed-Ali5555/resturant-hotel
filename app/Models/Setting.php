<?php

namespace App\Models;

use App\Models\SettingsTags;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    use  Translatable;
    protected $guarded=[];

    protected $with=['translations'];
    protected $translatedAttributes=["name","address","restaurant_text","short_description","accommodation_text","terms_booking","about","sub_title","title","bars"];



    public function get_lang($key,$value)

    {
        $return=$this['translations']->where('locale',$key)->first();
        $value=$return[$value]??'';
        return $value;

    }


    public function keywords()
    {
        return $this->hasMany(SettingsTags::class,'setting_id');
    }
}
