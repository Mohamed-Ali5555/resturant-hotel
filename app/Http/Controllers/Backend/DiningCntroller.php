<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\DiningRequest;
use App\Http\Requests\DiningRequestUpdate;
use App\Models\Dining;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class DiningCntroller extends backendController
{
    public function __construct(Dining $model)
    {
        parent::__construct($model);
    }


    public function index()
    {
        all_lang();
        $route_pref = $this->route_pref();

        $where = $this->where();


        $row = $this->model->first();





        return view('admin.' . $route_pref . '.index', compact('row','route_pref'));

    }



    public  function store(DiningRequest $request){


        $array=$request->except(['_token',"header_image","second_image","first_image"]);
        if($request->hasFile('header_image')){
            $array['header_image']=$this->save_img($request['header_image'],'dining_image');

        }
        if($request->hasFile('second_image')){
            $array['second_image']=$this->save_img($request['second_image'],'dining_image');

        }
        if($request->hasFile('first_image')){
            $array['first_image']=$this->save_img($request['first_image'],'dining_image');

        }



        $row=$this->model::create($array);


        return back();
    }
    public function update(DiningRequestUpdate $request,$id){
        $array=$request->except(['_token',"header_image","second_image","first_image"]);
        if($request->hasFile('header_image')){
            $array['header_image']=$this->save_img($request['header_image'],'dining_image');

        }
        if($request->hasFile('second_image')){
            $array['second_image']=$this->save_img($request['second_image'],'dining_image');

        }
        if($request->hasFile('first_image')){
            $array['first_image']=$this->save_img($request['first_image'],'dining_image');

        }
        $row=$this->model::find($id);
        $row->update($array);

        return back();

    }
}
