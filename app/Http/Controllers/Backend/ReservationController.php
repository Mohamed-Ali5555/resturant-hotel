<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ReservationController extends backendController
{
    public function __construct(Booking $model)
    {
        parent::__construct($model);
    }
     public function request_reservation(){

         $route_pref = $this->route_pref();

         $where = $this->where();


         $rows = $this->model->orderBy('id','desc')->where(["status"=>1])->get();
         $append = $this->append();
         $type_user='tester';
         $title="Request Reservation";

         return view('admin.' . $route_pref . '.index',
             compact('type_user','append','rows',"title", 'route_pref'));

     }
     public function approved_reservation(){

         $route_pref = $this->route_pref();

         $where = $this->where();


         $rows = $this->model->orderBy('id','desc')->where(["status"=>2])->get();
         $append = $this->append();
         $type_user='tester';
         $title="Approved Reservation";

         return view('admin.' . $route_pref . '.index',
             compact('type_user','append','rows','title', 'route_pref'));

     }
      public function show($id){
        $row=$this->model::find($id);
          $route_pref = $this->route_pref();
          return view('admin.' . $route_pref . '.show',
              compact('row', 'route_pref'));


      }
       public function change_reservation(Request $request){
        $row=$this->model::find($request['id']);
        $row->update([
            "status"=>$request['status']
        ]);
return back();
       }
}
