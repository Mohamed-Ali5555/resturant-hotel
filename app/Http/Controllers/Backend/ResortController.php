<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResortRequestCreate;
use App\Http\Requests\ResortRequestUpdate;
use App\Models\Resort;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ResortController extends backendController
{
    public function __construct(Resort $model)
    {
        parent::__construct($model);
    }
     public function store(ResortRequestCreate $request){
        $array=$request->except(["_token","image"]);
         if($request->hasFile('image')){
             $array['image']=$this->save_img($request['image'],"resort_mage");
         }
         $row=$this->model::create($array);
         $row->images()->sync($request['photos']);
          return back();


     }
     public function update(ResortRequestUpdate $request,$id){
        $array=$request->except(["_token","image"]);
         if($request->hasFile('image')){
             $array['image']=$this->save_img($request['image'],"resort_mage");
         }
         $row=$this->model::find($id);
         $row->update($array);
         $row->images()->sync($request['photos']);
          return back();


     }
}
