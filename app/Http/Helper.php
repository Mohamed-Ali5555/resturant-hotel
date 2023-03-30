<?php


if (!function_exists('my_asset')) {

    function my_asset($path){
        return asset(''.$path);
    }
}

function auth_user(){
    if(Auth::guard('admin')->check()){
        return Auth::guard('admin')->user()['id'];
    }
    else{
        if(auth()->user()){
            return auth()->user()->id;
        }
        return 0;
    }
}

function getvidio_id($url){
    parse_str( parse_url( $url, PHP_URL_QUERY ), $my_array_of_vars );
    if(isset($my_array_of_vars['v'])){
        return $my_array_of_vars['v'];
    }
    return "";
}

function auth_type(){
    if(Auth::guard('admin')->check()){
        return 'admin';
    }
    else{
        return 'user';
    }
}

if (!function_exists('getfile')) {
    function getfile($id)

    {
        $file=\App\Models\Upload::find($id);

        $abouts=\App\Models\Setting::first();
        $plac='';
        if(isset($abouts)){
            $plac=\App\Models\Upload::find($abouts['default_image']);
        }

        if(isset($file)&&file_exists(public_path().'/'.$file['file_name'])){

            return my_asset(str_replace(" ","%20",$file['file_name']));

        }elseif (isset($plac['file_name'])&&file_exists(public_path().'/'.$plac['file_name'])){

            return  my_asset(str_replace(" ","%20",$plac['file_name']));
        }else{
            return my_asset('assets/images/placeholder.jpg');
        }
    }

}
if (!function_exists('getfile_name')) {
    function getfile_name($id)

    {
        $file=\App\Models\Upload::find($id);

        $abouts=\App\Models\Setting::first();
        $plac='';
        if(isset($abouts)){
            $plac=\App\Models\Upload::find($abouts['default_image']);
        }

        if(isset($file)&&file_exists(public_path().'/'.$file['file_name'])){

            return $file['file_name'];

        }elseif (isset($plac['file_name'])&&file_exists(public_path().'/'.$plac['file_name'])){

            return  $plac['file_name'];
        }else{
            return 'assets/images/placeholder.jpg';
        }
    }

}
function list_user_message(){
    $messages=\App\Models\Models\Chit::where(['from_user_id'=>auth()->user()['id'],'type_from_user'=>'user',
        'type_to_user'=>'user'])->orwhere(['to_user_id'=>auth()->user()['id'],'type_from_user'=>'user',
        'type_to_user'=>'user'])->orderby('id','desc')->get();

    $array=[];
    $array_id=[];
    foreach ($messages as $message){
        $user['type_auth']='user';
        if($message['from_user_id']==auth()->user()['id']){

            $user=\App\Models\User::where('id',$message['to_user_id'])->first();
            if($message['to_user_id']==0){
                $user=\App\Models\Models\Admin::first();
                $user['type_auth']='admin';
            }
        }else{
            $user=\App\Models\User::where('id',$message['from_user_id'])->first();
            if($message['from_user_id']==0){
                $user=\App\Models\Models\Admin::first();
                $user['type_auth']='admin';
            }

        }

        if(!in_array($user['id'],$array_id)){
            $array[]=$user;
            $array_id[]=$user['id'];

        }

    }

    return $array;
}
function list_admin_message(){
    $messages=\App\Models\Models\Chit::where(['from_user_id'=>0])
        ->orwhere(['to_user_id'=>0])->orderby('id','desc')->get();

    $array=[];
    $array_id=[];
    foreach ($messages as $message){
        if($message['from_user_id']==0){
            $user=\App\Models\User::where('id',$message['to_user_id'])->first();

        }else{
            $user=\App\Models\User::where('id',$message['from_user_id'])->first();
        }

        if(!in_array($user['id'],$array_id)){
            $array[]=$user;
            $array_id[]=$user['id'];

        }

    }

    return $array;
}
function last_message($id){
    $message=\App\Models\Models\Chit::where(['from_user_id'=>auth()->user()['id'],'to_user_id'=>$id])
        ->orwhere(['to_user_id'=>auth()->user()['id'],'from_user_id'=>$id])->orderby('id','desc')
        ->first();
    return $message;

}
function last_message_admin($id){
    $message=\App\Models\Models\Chit::where(['from_user_id'=>0,'to_user_id'=>$id])
        ->orwhere(['to_user_id'=>0,'from_user_id'=>$id])->orderby('id','desc')
        ->first();
    return $message;

}
function count_message(){
    $count=\App\Models\Models\Chit::where(['to_user_id'=>auth()->user()['id'],'show_user'=>0])->count();
    return $count;
}
function count_message_admin(){
    $count=\App\Models\Models\Chit::where(['to_user_id'=>0,'show_user'=>0])->count();
    return $count;
}
function get_option($league_id,$option_id){
    $row=\App\Models\Models\OptionLeague::where(['option_id'=>$option_id,'League_id'=>$league_id])->first();

        return $row['value']??'';

}
function get_optionStadium($stadium,$option_id){
    $row=\App\Models\Models\StadiumOption::where(['option_id'=>$option_id,'stadium_id'=>$stadium])->first();

        return $row['value']??'';

}
function get_CategoryStadium($stadium,$category){
    $row=\App\Models\Models\testStadium::where(['category_id'=>$category,'stadium_id'=>$stadium])->first();

        return $row;

}
function total_rate($stadium){
    $rate=0;
    $row=\App\Models\Models\testStadium::where(['stadium_id'=>$stadium])->get();
    if(count($row)>0){
        $rate=$row->sum('rate')/$row->count();
    }

        return $rate;

}
 function all_lang(){


    $all_lang=LaravelLocalization::getSupportedLocales() ;
   return  $all_lang;
 }
  function all_icon(){
    return[
        "bed",
        "bath",
        "shower",
        "toilet-paper-slash",
        "wifi",
        "coffee",
        "swimming-pool",
      "address-book",
            "address-card",

        "angry",
            "arrow-alt-circle-down",
            "arrow-alt-circle-left",
            "arrow-alt-circle-right",
            "arrow-alt-circle-up",
            "bell",
            "bell-slash",
            "bookmark",
            "building",
            "calendar",
            "calendar-alt",
            "calendar-check",
            "calendar-minus",
            "calendar-plus",
            "calendar-times",
            "caret-square-down",
            "caret-square-left",
            "caret-square-right",
            "caret-square-up",
            "chart-bar",
            "check-circle",
            "check-square",
            "circle",
            "clipboard",
            "clock",
            "clone",
            "closed-captioning",
            "comment",
            "comment-alt",
            "comment-dots",
            "comments",
            "compass",
            "copy",
            "copyright",
            "credit-card",
            "dizzy",
            "dot-circle",
            "edit",
            "envelope" ,
            "envelope-open",
            "eye",
            "eye-slash",
            "file",
            "file-alt",
            "file-archive",
            "file-audio",
            "file-code",
            "file-excel" ,
            "file-image",
            "file-pdf",
            "file-powerpoint",
            "file-video",
            "file-word",
            "flag",
            "flushed",
            "folder",
            "folder-open" ,
            "frown",
            "frown-open",
            "futbol",
            "gem",
            "grimace",
            "grin",
            "grin-alt",
            "grin-beam",
            "grin-beam-sweet" ,
            "grin-hearts",
            "grin-squint",
            "grin-squint-tears",
            "grin-stars",
            "grin-tears",
            "grin-tongue",
            "grin-tongue-squint",
            "grin-tongue-wink",
            "grin-wink" ,
            "hand-lizard",
            "hand-paper",
            "hand-peace",
            "hand-point-down",
            "hand-point-left",
            "hand-point-right",
            "hand-point-up",
            "hand-pointer",
            "hand-rock" ,
            "hand-scissors",
            "hand-spock",
            "handshake",
            "hdd",
            "heart",
            "home",
            "hospital",
            "hourglass",
            "id-badge",
            "id-card" ,
            "image",
            "images",
            "keyboard",
            "kiss",
            "kiss-beam",
            "kiss-wink-heart",
            "laugh",
            "laugh-beam",
            "laugh-squint" ,
            "laugh-wink",
            "lemon",
            "life-ring" ,
            "lightbulb",
            "list-alt",
            "map",
            "meh",
            "meh-blank",
            "meh-rolling-eyes" ,
            "minus-square",
            "money-bill-alt",
            "moon",
            "newspaper",
            "object-group",
            "object-upgroup",
            "paper-plane",
            "pause-circle",
            "play-circle" ,
            "plus-square",
            "question-circle",
            "registered",
            "sad-cry",
            "sad-tear",
            "save",
            "share-square",
            "smile",
            "smile-beam" ,
            "smile-wink",
            "snowflake",
            "square",
            "star",
            "star-half",
            "sticky-note",
            "stop-circle",
            "sun",
            "surprise" ,
            "thumbs-down",
            "thumbs-up",
            "times-circle",
            "tired",
            "trash-alt",
            "user",
            "user-circle",
            "window-close",
            "window-maximize" ,
            "window-minimize",
            "window-restore",
    ];
  }
function check_offer($id,$start_date,$end_date,$room_number,$night_number){
    $offer=\App\Models\Offer::where("room_id",$id)->where("start_date","<=",$start_date)
        ->where("end_date",">=",$end_date)->where("room_number","<=",$room_number)
        ->where("night_number","<=",$night_number)->first();
    $discount=0;

    if(isset($offer)){
        $discount=$offer['price'];
    }

     return$discount ;

}
 function priceroom($id,$date){

     $room=\App\Models\Room::find($id);

     $price=$room['price']??0;
     $row=\App\Models\RoomPrice::where("room_id",$id)->where("start_date","<=",$date)->
     where("end_date",">=",$date)
         ->first();

     if(isset($row)){
         $price=$row['price'];
     }
      return $price;
 }



