<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateOfferRequest;
use App\Http\Requests\UpdateOfferRequest;
use App\Models\Offer;
use App\Models\Room;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class OfferController extends backendController
{
    public function __construct(Offer $model)
    {
        parent::__construct($model);
    }

    protected function append()
    {
        return [
            "rooms"=>Room::get()
        ];
    }
     public function store(CreateOfferRequest $request){
        $array=$request->except(["_token","image"]);
         if($request->hasFile("image")){
             $array['image']=$this->save_img($request['image'],"offer_image");
         }
         $this->model::create($array);
         return back();

     }
     public function update(UpdateOfferRequest $request,$id){
        $array=$request->except(["_token","image"]);
        $row=$this->model::find($id);
         if($request->hasFile("image")){
             $array['image']=$this->save_img($request['image'],"offer_image");
         }
         $row->update($array);
         return back();

     }
}
