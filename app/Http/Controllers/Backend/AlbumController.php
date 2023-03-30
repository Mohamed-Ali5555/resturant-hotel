<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateAlbum;
use App\Models\Album;
use App\Models\PhotoType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class AlbumController extends backendController
{
    public function __construct(Album $model)
    {
        parent::__construct($model);
    }
    protected function append()
    {
        return[
            "types"=>PhotoType::get()
        ];
    }
     public function store(CreateAlbum $request){

        $array=$request->all();
        if($request->hasFile('image')){
            $array['image']=$this->save_img($request['image'],"album_image");

        }

        $this->model::create($array);
         return back();
     }
     public function update(Request $request,$id){
        $row=$this->model::find($id);
        $array=$request->except(["_token","image"]);
        if($request->hasFile('image')){
            $array['image']=$this->save_img($request['image'],"album_image");
        }
        $row->update($array);
        return back();
     }
}

