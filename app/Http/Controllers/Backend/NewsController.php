<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class NewsController extends backendController
{
    public function __construct(News $model)
    {
        parent::__construct($model);
    }
     public function store(Request $request){
        $array=$request->except(["_token","image"]);
        if($request->hasFile('image')){
            $array['image']=$this->save_img($request['image'],"news_image");
        }
        $row=$this->model::create($array);
        $row->images()->sync($request['photos']);
        return back();
    }
    public function update(Request $request,$id){
        $array=$request->except(["_token","image"]);
        if($request->hasFile('image')){
            $array['image']=$this->save_img($request['image'],"news_image");
        }
        $row=$this->model::find($id);
        $row->update($array);
        $row->images()->sync($request['photos']);
        return back();
    }
}
