<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateSpaItem;
use App\Http\Requests\UpdateSpaItem;
use App\Models\SpaItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class SpaItemController extends backendController
{
    public function __construct(SpaItem $model)
    {
        parent::__construct($model);
    }
     public function store(CreateSpaItem $request){
        $array=$request->except(["_token","image"]);
        if($request->hasFile('image')){
            $array['image']=$this->save_img($request['image'],"spaitem_image");
        }
        $row=$this->model::create($array);
        return back();

     }
     public function update(UpdateSpaItem $request,$id){
        $array=$request->except(["_token","image"]);
        if($request->hasFile('image')){
            $array['image']=$this->save_img($request['image'],"spaitem_image");
        }
        $row=$this->model::update($id);
        $row->update($array);
        return back();

     }
}
