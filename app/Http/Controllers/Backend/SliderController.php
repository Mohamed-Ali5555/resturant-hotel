<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class SliderController extends backendController
{
    public function __construct(Slider $model)
    {
        parent::__construct($model);
    }
     public function store(Request $request){
        $array=$request->except(["_token","image"]);
        if($request->hasFile('image')){
            $array['image']=$this->save_img($request['image'],"slider_image");
        }
        $this->model::create($array);
        return back();
     }
     public function update(Request $request,$id){
        $array=$request->except(["_token","image"]);
        if($request->hasFile('image')){
            $array['image']=$this->save_img($request['image'],"slider_image");
        }
        $row=$this->model::find($id);
        $row->update($array);
        return back();
     }
}
