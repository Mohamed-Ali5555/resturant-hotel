<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Spa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Intervention\Image\Gd\Commands\BackupCommand;

class SpaController extends backendController
{
    public function __construct(Spa $model)
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



    public  function store(Request $request){

        $array=$request->except(["image"]);

        if($request->hasFile('image')){
            $array['image']=$this->save_img($request['image'],'spa_image');

        }



        $row=$this->model::create($array);
   $row->images()->sync($request['photos']);

        return back();
    }

    public  function update(Request $request,$id){

        $array=$request->except(["image"]);

        if($request->hasFile('image')){
            $array['image']=$this->save_img($request['image'],'spa_image');

        }
        $row=$this->model::find($id);



        $row->update($array);
   $row->images()->sync($request['photos']);

        return back();
    }


}
