<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookingRequest;
use App\Http\Requests\ContactRequest;
use App\Jobs\SendMessage;
use App\Models\Activity;
use App\Models\Booking;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Dining;
use App\Models\Diving;
use App\Models\ItemSpa;
use App\Models\ItemWediing;
use App\Models\MealType;
use App\Models\Meeting;
use App\Models\MeetingItem;
use App\Models\News;
use App\Models\Offer;
use App\Models\PhotoType;
use App\Models\Policy;
use App\Models\Resort;
use App\Models\Restaurant;
use App\Models\Room;
use App\Models\Slider;
use App\Models\Spa;
use App\Models\SpaItem;
use App\Models\Subscribe;
use App\Models\Video;
use App\Models\wedding;
use App\Models\WeddingItem;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $sliders=Slider::get();
        $rooms=Room::where("active",1)->inrandomorder()->get();
        $title='Home';
        $offers=Offer::where("start_date",'<=',date('Y-m-d'))->where('end_date','>=',date('Y-m-d'))->inrandomorder()->get();
        $resorts=Resort::inrandomorder()->get();

        return view('frontend.home',compact("title","resorts","offers",'sliders',"rooms"));
    }
    public function site_map(){
        $spas=Spa::get();
        $rooms=Room::get();
        $news=News::get();
        $restaurants=Restaurant::get();
        $meetings=MeetingItem::get();
        $weddings=wedding::get();
        return response()->view('index_seo', [
            'spas' => $spas,
            "rooms"=>$rooms,
            "resorts"=>Resort::get(),
            "news"=>$news,
            "restaurants"=>$restaurants,
            "meetings"=>$meetings,
            "weddings"=>$weddings

        ])->header('Content-Type', 'text/xml');

    }
     public function accommodations(Request $request){
         $title='Accommodations';

         $rows=Room::
              where("active",1)->
         when($request['adult_id'],function ($query) use ($request){

             $query->where('adult','>=',$request['adult_id']);

         })->
         when($request['category_id'],function ($query) use ($request){

             $query->where('category_id',$request['category_id']);
         })->
         inrandomorder()->get();
         $types=Category::get();
         $policies=Policy::get();
         $rooms=[];

         if(isset($request['start_date'])&&isset($request['end_date'])){

foreach ($rows as $row) {

    $count = Booking::where("room_id", $row['id'])
        ->where("start_date", '<=', date('Y-m-d',strtotime($request['end_date'])))
        ->where("end_date", ">=", date('Y-m-d',strtotime($request['start_date'])))
->where("status",">",0)
        ->sum('count_room');


     if($row['count']>$count){
         $rooms[]=$row;
     }
}

         }else{
             $rooms=$rows;
         }

         if($request->ajax()){
             return view("frontend.list_room",compact("title","policies","rooms","types"));

         }

         return view("frontend.accommodations",compact("title","policies","rooms","types"));

     }
     public function check_rate(Request $request){
         $title='Check Rate';

         $rooms=[];
         $types=Category::get();
         $policies=Policy::get();

         if($request->ajax()){
             return view("frontend.list_room",compact("title","policies","rooms","types"));

         }

         return view("frontend.accommodations",compact("title","policies","rooms","types"));

     }
     public function offer(){
         $title='Offer';

        $offer_tops=Offer::where("top",1)->where("start_date","<=",date('Y-m-d'))
            ->where("end_date",'>=',date('Y-m-d'))->inrandomorder()->get();
        $rows=Offer::where("top",0)->where("start_date","<=",date('Y-m-d'))
            ->where("end_date",'>=',date('Y-m-d'))->inrandomorder()->get();

         return view("frontend.offer",compact("title","offer_tops",'rows'));

     }
     public function dining(){
         $title='Dining';
         $dining=Dining::first();
         $restaurants=Restaurant::where("type",0)->inrandomorder()->get();
         $barses=Restaurant::where("type",1)->inrandomorder()->get();
          return view("frontend.dining",compact("barses","restaurants","title","dining"));


     }
     public function gallery(){
         $title='Gallery';


         $videos=Video::inrandomorder()->get();
         $albums=PhotoType::inrandomorder()->get();
          return view("frontend.albums",compact("videos","albums","title"));


     }
     public function activities(){
         $title='activity';
$activities=Activity::get();
$divings=Diving::get();


          return view("frontend.activity",compact("divings","activities","title"));


     }
     public function spa(){
         $title='spa';
$spa=Spa::first();
$spa_items=SpaItem::get();
$items=ItemSpa::get();


return view("frontend.spa",compact("spa_items","items","spa","title"));


     }
     public function meeting(){
         $title='Meetings & Events';
$row=Meeting::first();
$items=MeetingItem::get();



return view("frontend.meeting",compact("items","row","title"));


    }
    public function wedding(){
         $title='Wedding';
$row=wedding::first();
$items=WeddingItem::get();
$rows=ItemWediing::get();

return view("frontend.wedding",compact("items","rows","row","title"));
    }
    public function private(){
         $title='private';

$items=Offer::where("top",0)->get();


return view("frontend.private",compact("items","title"));
    }
     public function contact(){
         $title="contact";
         return view("frontend.contact",compact("title"));
     }
      public function save_contact(ContactRequest $request){
          $url="https://www.google.com/recaptcha/api/siteverify";
          $response=$request['token_generate'];
          $secret="6LemduEjAAAAAKmMti8yMcnYsdaB4p5yMxMT8k8p";
          $remoateip=$request->ip();
          $data=file_get_contents($url.'?secret='.$secret.'&response='.$response);

          $show_dta=json_decode($data);
          if($show_dta->success==true) {
              $row = Contact::create([
                  "name" => strip_tags($request['name']),
                  "email" => strip_tags($request['email']),
                  "phone" => strip_tags($request['phone']),
                  "subject" => strip_tags($request['subject']),
                  "message" => strip_tags($request['message'])

              ]);

              $emails=[
				  
                  "Mahmoud.ElMoataz@kaisolhotels.com",
                  "Shoukry.moried@kaisolhotels.com",
                  "Svetlana.Potekhina@kaisolhotels.com",
                  "hassan.bastawy@kaisolhotels.com"

              ];
               foreach ($emails as $email){
                   $array=[
                       "email"=>$email,
                       "message"=>$row
                   ];
                   dispatch(new SendMessage($array));

               }

          }


return back();
      }
       public function booking(BookingRequest $request){
           $url="https://www.google.com/recaptcha/api/siteverify";
           $response=$request['token_generate'];
           $secret="6LemduEjAAAAAKmMti8yMcnYsdaB4p5yMxMT8k8p";
           $remoateip=$request->ip();
           $data=file_get_contents($url.'?secret='.$secret.'&response='.$response);

           $show_dta=json_decode($data);
           if($show_dta->success==true) {
               $row = Booking::create([
                   "room_id" => $request['room_id'],
                   "count_room" => $request['count_room'],
                   "start_date" => $request['start_date'],
                   "end_date" => $request['end_date'],
                   "first_name" => $request['first_name'],
                   "last_name" => $request['last_name'],
                   "phone" => $request['phone'],
                   "email" => $request['email']
                   , "country" => $request['country']

               ]);
           }
       return  true;

       }
     public function show_meeting($id,$slug){
         $row=MeetingItem::find($id);
         $title=$row['name'];

return view("frontend.show_meeting",compact("row","title"));

    }
    public function show_news($id,$slug){
         $row=News::find($id);
         $title=$row['title'];

return view("frontend.show_news",compact("row","title"));

    }
     public function show_spa($id,$slug){
         $row=SpaItem::find($id);
         $title=$row['name'];

return view("frontend.show_spa",compact("row","title"));


     }
     public function show_wedding($id,$slug){
         $row=WeddingItem::find($id);
         $title=$row['name'];

return view("frontend.show_wedding",compact("row","title"));


     }
     public function show_room($id,$slug){
        $row=Room::findorfail($id);
        $title=$row['name'];
        $polices=Policy::get();
        $rooms=Room::where("category_id",$row['category_id'])->inrandomorder()->get();
         return view('frontend.show_room',compact('row',"title",'polices',"rooms"));

     }
     public function show_resort($id,$slug){
        $row=Resort::findorfail($id);
        $title=$row['name'];
        $resorts=Resort::where('id','!=',$id)->inrandomorder()->get();

         return view('frontend.show_resort',compact('row',"resorts","title"));
    }
    public function show_restaurant($id,$slug){
        $row=Restaurant::findorfail($id);
        $title=$row['name'];
        $type_id=$row->meals()->get()->pluck('type_id')->toarray();
        $types=MealType::wherein("id",$type_id)->get();


         return view('frontend.show_restaurant',compact('row',"types","title"));
    }
     public function check_reservation(Request $request){
        $row=Room::find($request['id']);
        if(!isset($row)){
             return "false";
        }
     $count=Booking::where("room_id",$request['id'])
         ->where("start_date",'<=',date('Y-m-d',strtotime($request['end_date'])))
         ->where("end_date",">=",date('Y-m-d',strtotime($request['start_date'])))
         ->sum('count_room');
         if(($row['count']-$count)<$request['count']){
             return  "false";

         }
         return "true";



     }
      public function reservation(Request $request){
        $row=Room::find($request['room_id']);

         return view("frontend.booking",compact('request',"row"));

      }
       public function subscribe(Request $request){
           $url="https://www.google.com/recaptcha/api/siteverify";
           $response=$request['token_generate'];
           $secret="6LemduEjAAAAAKmMti8yMcnYsdaB4p5yMxMT8k8p";
           $remoateip=$request->ip();
           $data=file_get_contents($url.'?secret='.$secret.'&response='.$response);

           $show_dta=json_decode($data);
           if($show_dta->success==true) {
               Subscribe::updateorcreate([
                   "email" => $request['email']
               ]);
           }
         return back();

       }
}
