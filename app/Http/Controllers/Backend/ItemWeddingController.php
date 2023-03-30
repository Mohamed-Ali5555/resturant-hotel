<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ItemWediing;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ItemWeddingController extends backendController
{
    public function __construct(ItemWediing $model)
    {
        parent::__construct($model);
    }
    public function store(Request $request){
        $array=$request->except("_token");
        $this->model::create($array);
        return back();

    }
    public function update(Request $request,$id){
        $array=$request->except(["_token","_method"]);
        $row=$this->model::find($id);
        $row->update($array);
        return back();

    }
}
