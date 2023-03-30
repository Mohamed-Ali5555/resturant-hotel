<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateMealRequest;
use App\Http\Requests\UpdateMealRequest;
use App\Http\Requests\UpdateRestaurantRequest;
use App\Models\Meal;
use App\Models\MealType;
use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class MealController extends backendController
{
    public function __construct(Meal $model)
    {
        parent::__construct($model);
    }
    protected function append()
    {
        return [
            "types"=>MealType::get(),
            "restaurants"=>Restaurant::get()
        ];
    }
     public function store(CreateMealRequest $request){
        $array=$request->except("_token","image");
        if($request->hasFile('image')){
            $array['image']=$this->save_img($request['image'],"meal_image");
        }
        $this->model::create($array);
        return back();

     }
     public function update(UpdateMealRequest $request,$id){
        $array=$request->except("_token","image");
        if($request->hasFile('image')){
            $array['image']=$this->save_img($request['image'],"meal_image");
        }
        $row=$this->model::find($id);
        $row->update($array);
        return back();

     }
}
