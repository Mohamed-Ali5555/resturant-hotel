<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateItem;
use App\Models\ItemSpa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ItemSpaController extends backendController
{
    public function __construct(ItemSpa $model)
    {
        parent::__construct($model);
    }
     public function store(CreateItem $request){
        $array=$request->except("_token");
        $this->model::create($array);
         return back();

     }
     public function update(CreateItem $request,$id){
        $array=$request->except(["_token","_method"]);
        $row=$this->model::find($id);
        $row->update($array);
         return back();

     }
}
