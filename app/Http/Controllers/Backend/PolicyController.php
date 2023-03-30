<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Policy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class PolicyController extends backendController
{
    public function __construct(Policy $model)
    {
        parent::__construct($model);
    }
     public function store(Request $request){
        $this->model::create($request->all());
        return back();

     }
     public function update(Request $request,$id){
        $row=$this->model::find($id);
        $row->update($request->all());
        return back();

     }
}
