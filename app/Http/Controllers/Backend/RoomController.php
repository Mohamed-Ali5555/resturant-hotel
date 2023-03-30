<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Option;
use App\Models\Room;
use App\Models\RoomOption;
use App\Models\RoomPlan;
use App\Models\RoomPolicy;
use App\Models\RoomPrice;
use App\Models\RoomView;
use App\Models\ViewRoom;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class RoomController extends backendController
{
    public function __construct(Room $model)
    {
        parent::__construct($model);
    }
    protected function append()
    {
      $array=[
          "options"=>Option::get(),
          "options_id"=>[],
          "views"=>RoomView::get(),
          "views_id"=>[],
          "plans"=>[],
          "policies"=>[],
          "categories"=>Category::get(),
          "prices"=>[]

      ];
       if( \request()->route()->hasParameter('room')){
           $row=$this->model::find(decrypt(\request()->route()->parameter("room")));
           $array['options_id']=$row->options()->get();
           $array['views_id']=$row->views()->get();
           $array['plans']=$row->plans()->get();
           $array['policies']=$row->policies()->get();
           $array['prices']=$row->prices()->get();

       }
      return $array;
    }
     public function store(Request $request){

        $array=$request->except(["toke","image","plan"]);
        if($request->hasFile('image')){
            $array['image']=$this->save_img($request['image'],"rom_image");
        }
        if($request->hasFile('plan')){
            $array['plan']=$this->save_img($request['plan'],"rom_image");
        }


     $row=$this->model::create($array);
    if( isset($request['option'])){
        foreach ($request['option'] as $key=> $option){

             RoomOption::create([
                 "room_id"=>$row['id'],
                 "option_id"=>$option,
                 "short_value"=>$request['short_value'][$key],
                 "value"=>$request['value'][$key]
             ]);

        }
    }
    if( isset($request['start_date'])){
        foreach ($request['start_date'] as $key=> $date){
            if(isset($date)&&!empty($request['end_date'][$key])&&!empty($request['date_price'][$key])) {
                RoomPrice::create([

                    "room_id" => $row['id'],
                    "start_date" => $date ?? ' ',
                    "end_date" => $request['end_date'][$key] ?? ' ',
                    "price" => $request['date_price'][$key] ?? 0


                ]);
            }

        }
    }
    $row->images()->sync($request['photos']);
     if( isset($request['plans'])){
         foreach ($request['plans'] as $key=> $plan){
             if(isset($request['x_image_plan'][$key])) {
                 RoomPlan::create(
                     ["room_id" => $row['id']
                         , "description" => $plan
                         , "x_image_plan" => $request['x_image_plan'][$key]
                         , "y_image_plan" => $request['y_image_plan'][$key]
                         , "w_image_plan" => $request['w_image_plan'][$key]
                         , "h_image_plan" => $request['h_image_plan'][$key]
                     ]
                 );
             }
         }
     }
      if( isset($request['policies'])){
          foreach ($request['policies'] as $key=> $policy){
               if(!empty($policy)&&!empty($request['policy_description'][$key])){
                   RoomPolicy::create([
                       "room_id"=>$row['id'],
                       "title"=>$policy,
                       "description"=>$request['policy_description'][$key]
                   ]);
               }

          }
      }
return back();
     }
      public function update(Request $request,$id){

          $array=$request->except(["toke","image","plan"]);
          if($request->hasFile('image')){
              $array['image']=$this->save_img($request['image'],"rom_image");
          }
          if($request->hasFile('plan')){
              $array['plan']=$this->save_img($request['plan'],"rom_image");
          }
          $row=$this->model::find($id);

          $row->update($array);
          RoomOption::where(["room_id"=>$row['id']])->delete();
          if( isset($request['option'])){
              foreach ($request['option'] as $key=> $option){

                  RoomOption::create([
                      "room_id"=>$row['id'],
                      "option_id"=>$option,
                      "short_value"=>$request['short_value'][$key],
                      "value"=>$request['value'][$key]
                  ]);

              }
          }
          ViewRoom::where(["room_id"=>$row['id']])->delete();
//          if( isset($request['view'])){
//              foreach ($request['view'] as $key=> $view){
//                   if(!empty($view)&&!empty($request['view_value'][$key]))
//                  ViewRoom::create([
//                      "room_id"=>$row['id'],
//                      "view_id"=>$view,
//                      "count"=>$request['view_value'][$key],
//
//
//                  ]);
//
//              }
//          }

          RoomPrice::where(["room_id"=>$row['id']])->delete();
          if( isset($request['start_date'])){
              foreach ($request['start_date'] as $key=> $date){
                  if(isset($date)&&!empty($request['end_date'][$key])&&!empty($request['date_price'][$key])) {
                      RoomPrice::create([

                          "room_id" => $row['id'],
                          "start_date" => $date ?? ' ',
                          "end_date" => $request['end_date'][$key] ?? ' ',
                          "price" => $request['date_price'][$key] ?? 0


                      ]);
                  }

              }
          }

          RoomPolicy::where(["room_id"=>$row['id']])->delete();
          if( isset($request['policies'])){
              foreach ($request['policies'] as $key=> $policy){
                  if(!empty($policy)&&!empty($request['policy_description'][$key])){
                      RoomPolicy::create([
                          "room_id"=>$row['id'],
                          "title"=>$policy,
                          "description"=>$request['policy_description'][$key]
                      ]);
                  }

              }
          }
          $row->images()->sync($request['photos']);
          RoomPlan::where(["room_id"=>$row['id']])->delete();
          if( isset($request['plans'])){
              foreach ($request['plans'] as $key=> $plan){
                  if(isset($request['x_image_plan'][$key])&&!empty($plan)) {
                      RoomPlan::create(
                          ["room_id" => $row['id']
                              , "description" => $plan
                              , "x_image_plan" => $request['x_image_plan'][$key]
                              , "y_image_plan" => $request['y_image_plan'][$key]
                              , "w_image_plan" => $request['w_image_plan'][$key]
                              , "h_image_plan" => $request['h_image_plan'][$key]
                          ]
                      );
                  }
              }
          }
          return back();


      }
}
