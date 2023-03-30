<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateVideo;
use App\Http\Requests\VideoUpdateRequest;
use App\Models\Video;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class VideoController extends backendController
{
    public function __construct(Video $model)
    {
        parent::__construct($model);
    }
    public function store(CreateVideo $request){
        $array=$request->except(["_token","image"]);
        if($request->hasFile("image")){
            $array['image']=$this->save_img($request['image'],"video_image");
        }
        $this->model::create($array);
        return back();

    }
     public function update(VideoUpdateRequest $request,$id){
         $array=$request->except(["_token","image"]);
         if($request->hasFile("image")){
             $array['image']=$this->save_img($request['image'],"video_image");
         }
         $row=$this->model::find($id);
         $row->update($array);
         return back();

     }
}
