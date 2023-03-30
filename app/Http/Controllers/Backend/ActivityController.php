<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateActiveRequest;
use App\Http\Requests\UpdateActiveRequest;
use App\Models\Activity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ActivityController extends backendController
{
    public function __construct(Activity $model)
    {
        parent::__construct($model);
    }
     public function store(CreateActiveRequest $request){
        $array=$request->except(["_token","image"]);
         if($request->hasFile('image')){
             $array['image']=$this->save_img($request['image'],"active_image");
         }
       $row=  $this->model::create($array);
         $row->images()->sync($request['photos']);
          return  back();

     }
     public function update(UpdateActiveRequest $request,$id){
        $array=$request->except(["_token","image"]);
         if($request->hasFile('image')){
             $array['image']=$this->save_img($request['image'],"active_image");
         }
         $row=$this->model::find($id);
         $row->update($array);
         $row->images()->sync($request['photos']);
          return  back();

     }
}
