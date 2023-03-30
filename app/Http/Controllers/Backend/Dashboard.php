<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function dashboard(){
        $user_tester=User::where('user_type','tester')->count();
        $admins=User::where('user_type','admin')->count();
        $request=Booking::where("status",1)->count();

        return view('dashboard',compact('user_tester','admins','request'));
    }
}
