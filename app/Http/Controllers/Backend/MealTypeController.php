<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoomViewRequest;
use App\Models\MealType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class MealTypeController extends backendController
{
    public function __construct(MealType $model)
    {
        parent::__construct($model);
    }
    public function store(RoomViewRequest $request){
        $array=$request->except("_token");
        $this->model::create($array);
        return back();

    }
    public function update(RoomViewRequest $request, $id){
        $row=$this->model::find($id);
        $array=$request->except(["_token","_method"]);

        $row->update($array);
        return back();

    }
}
