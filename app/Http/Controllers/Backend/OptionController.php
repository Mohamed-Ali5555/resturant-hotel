<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\OptionRequest;
use App\Models\Option;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class OptionController extends backendController
{
    public function __construct(Option $model)
    {
        parent::__construct($model);
    }
    public function store(OptionRequest $request){
        $this->model::create($request->all());
        return back();

    }
     public function update(OptionRequest $request,$id){
        $row=$this->model::find($id);
        $row->update($request->all());
        return back();

     }
}
