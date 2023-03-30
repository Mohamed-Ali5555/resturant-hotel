<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoomViewRequest;
use App\Models\Album;
use App\Models\PhotoType;
use Illuminate\Http\Request;

class PhotoTyptController extends backendController
{
    public function __construct(PhotoType $model)
    {
        parent::__construct($model);
    }
    public function store(RoomViewRequest $request){
        $array=$request->except(["_token","photos"]);
        $row=$this->model::create($array);
         if(isset($request['photos']) ){
              foreach ($request['photos'] as $image){
                  Album::create([
                      "type_id"=>$row['id'],
                      "image"=>$image
                  ]);
              }
         }
        return back();

    }
    public function update(RoomViewRequest $request, $id){
        $row=$this->model::find($id);
        $array=$request->except(["_token","_method","photos"]);

        $row->update($array);
        if(isset($request['photos']) ){
            foreach ($request['photos'] as $image){
                Album::updateorcreate([
                    "type_id"=>$row['id'],
                    "image"=>$image
                ]);
            }
        }
        return back();

    }

}
