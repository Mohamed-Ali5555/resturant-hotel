<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\profile\Profile;
use App\Http\Requests\profile\storeProfile;
use App\Http\Requests\profile\updateprofile;
use App\Mail\rest_password;
use App\Mail\verviy_email;
use App\Models\Models\Admin;
use App\Models\Models\Category;
use App\Models\Models\notification;
use App\Models\Models\userField;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class usercontroller extends backendController
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }
protected function append()
{
    $array=[
        'type_user'=>'tester',
        'type'
    ];
    return $array;
}

    public function update(Profile $request,$id){
        $row=User::findOrfail($id);
       $array= $request->except('_token','image');
       if($request->hasFile('image')){

       }

        $row->update($array);

    return back();

}
public function update_image(Request $request){
        if($request->hasFile('image')){
            auth()->user()->update([
                'image'=>$this->save_img($request['image'],'profile')
            ]);
            return back();
        }
}
public function save_profile(updateprofile $request){
        $array=$request->except('password');
        if(isset($request['password'])&&!empty($request['password'])){
            $array['password']=Hash::make($request['password']);
        }
        auth()->user()->update($array);
        return back();
}
    public function login(){

        return view('auth.login');
    }
    public function auth_admin(Request  $request){

      if(auth()->attempt(['email' => $request->input("email"), 'password' => $request->input("password")])){
                return redirect() -> route('dashboard')->with(['success'=>'تم الدخول ']);
            }
            else{
                return redirect()->back()->with(['error' => 'هناك خطا بالبيانات']);
            }


        // notify()->error('خطا في البيانات  برجاء المجاولة مجدا ');
        return redirect()->back()->with(['error' => 'هناك خطا بالبيانات']);
    }



        public function logout(){
            Auth::logout();
            return redirect()->route('admin.login');
        }
public function send_rest_password(Request $request){

        if(Session::has('rest')){
            $email= Session::get('rest')['email'];

        }else{
            $email=$request['email'];
        }

        $user=User::where('email',$email)->first();

        if(isset($user)) {
            $user->update([
                'remember_token'=>time().@csrf_token()
            ]);
            try {
                Mail::to($user['email'])->send(new rest_password($user));
                Session::put('rest', $user);
                return back()->with(['success' => 'تم ارسال رسالة اعادة تفعيل بنجاح']);
            }catch(\Exception $e){
                return back()->with(['error' => 'فشل الارسال تاكد من البريد الالكتروني']);
            }
        }

        else{
            return redirect()->back()->with(['error' => 'الحساب غير موجود']);
        }
}
public function rest_password($id,$token){
       $user=User::where(['id'=>decrypt($id),'remember_token'=>$token])->first();


       if(isset($user)){
           return view('auth.rest',compact('user'));
       }
       else{
           Session::forget(['rest','user']);
           return redirect()->route('admin.login')->with('error','الحساب غير موجود ');
       }
}
public function verify_email_post($id,$token){
        $user=User::where(['id'=>decrypt($id),'remember_token'=>$token])->first();
        if(isset($user)){
            $user->update([
                'remember_token'=>time().@csrf_token(),
                'email_verified_at'=>time()
            ]);
            Auth::login($user);
            Session::forget('user');
            return redirect()->route('home')->with('success','تم التسجيل بنجاح ');
        }

    return redirect()->route('admin.login')->with('error','الحساب غير موجود ');

}
public function new_password(Request $request){
        $user=User::where('email',$request['email'])->first();

        if(isset($user)){
            $user->update([
                'remember_token'=>time().@csrf_token(),
                'password'=>Hash::make($request['password'])
            ]);
            Auth::login($user);
            Session::forget('rest');
            return redirect()->route('dashboard')->with('success','تم التسجيل بنجاح ');
        }


}
public  function verify_email(){
        return view('auth.verify');
}
public function my_profile(){
        return view('auth.my_profile');
}
public function show($type){
        if($type=='tester'){
            $type_user="الفاحصون";
        }elseif ($type=='admin'){
            $type_user='الادارة';

        }
        else{
            $type_user='الاعضاء';
        }
    $route_pref='users';


        $rows=User::where('user_type',$type)->get();
        if($type=='user'){
            $rows=User::where('user_type',null)->get();
        }
        return view('admin.users.index',compact('route_pref','rows','type_user','type'));
}
public function new_user($type){
    if($type=='tester'){
        $type_user="الفاحصون";
    }elseif ($type=='admin'){
        $type_user='الادارة';

    }
    else{
        $type_user='الاعضاء';
    }
    $route_pref='users';
    return view('admin.users.create',compact('route_pref','type_user','type'));

}
public function store(storeProfile $request){
        $array=$request->except('password','image');
        $array['image']=0;
        $array['password']=Hash::make($request['password']);
        if($request->hasFile('image')){
            $array['image']=$this->save_img($request['image'],'profile');
        }
        User::create($array);
        return back();
}

}
