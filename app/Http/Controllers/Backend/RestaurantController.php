<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateRestaurantRequest;
use App\Http\Requests\UpdateRestaurantRequest;
use App\Models\Restaurant;
use App\Models\RestaurantTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class RestaurantController extends backendController
{
    public function __construct(Restaurant $model)
    {
        parent::__construct($model);
    }
    protected function append()
    {
      $array=[
          "times"=>[]

      ];
      if( \request()->route()->hasParameter('restaurant')){
          $row=$this->model::find(decrypt(\request()->route()->parameter('restaurant')));
          $array['times']=$row->times()->get();
      }
       return $array;
    }
     public function store(CreateRestaurantRequest $request){
        $array=$request->except("_token","image");
        if($request->hasFile("image")){
            $array['image']=$this->save_img($request['image'],"restaurant_image");
        }
        $row=$this->model::create($array);
        $row->images()->sync($request['photos']);
         if( isset($request['times'])){
              foreach ($request['times'] as $time){
                  RestaurantTime::create(
                      ["restaurant_id"=>$row['id']
                          ,"title"=>$time
                      ]
                  );

              }
         }
return back();
     }
     public function update(UpdateRestaurantRequest $request,$id){

         $array=$request->except("_token","image");
         if($request->hasFile("image")){
             $array['image']=$this->save_img($request['image'],"restaurant_image");
         }
         $row=$this->model::find($id);
         $row->update($array);
         $row->images()->sync($request['photos']);
         RestaurantTime::where(["restaurant_id"=>$row['id']])->delete();
         if( isset($request['times'])){
             foreach ($request['times'] as $time){
                 RestaurantTime::create(
                     ["restaurant_id"=>$row['id']
                         ,"title"=>$time
                     ]
                 );

             }
         }
         return back();


     }
}
