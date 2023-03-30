@extends('frontend.layouts.index')


@section('content')

<!-- Header Banner -->
<div class="banner-header section-padding valign bg-img bg-fixed" data-overlay-dark="4" data-background="{{getfile($row['image'])}}">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-left caption mt-30">
                <h4><a href="{{route('home')}}"><i class=" ti-back-left"></i>Back</a> </h4>
                <h3>Book direct and get the best rate and most favourable cancellation terms, guaranteed.</h3>

            </div>
        </div>
    </div>
</div>

<section class="section-padding">
    <div class="container">
        <div class="row">

            <!-- Sidebar -->
            <div class="col-md-4">
                <div class="news2-sidebar row">
                    <div class="col-md-12 col-sm-3">
                        <div class="widget">
                            <div class="widget-title">
                                <h6>Your Reservation</h6>
                            </div>
                            <ul>
                                <li><a>{{$request['start_date']}} - {{$request['end_date']}}</a></li>
                                <li><a>{{$request['count_room']}} Room {{$row['adult']}} Adults </a></li>
                                <li><div class="butn-dark mt-15"> <a style="color: #fff;">Edite</a></div></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-3">
                        <div class="widget">
                            <div class="widget-title">
                                <h4>{{$row['name']}}</h4>
                            </div>
                            <ul>
                                <?php
                                $start= new DateTime($request['start_date']);
                                $end_time= new DateTime($request['end_date']);
//                                $end_date= new DateTime( date('Y-m-d',strtotime("+1 days",strtotime($request['end_date']))));
                                $difrent=$end_time->diff($start)->format("%a");


                                $interval = DateInterval::createFromDateString('1 day');
                                $period = new DatePeriod($start, $interval, $end_time);
                                $days=[];
                                $price=0;
                                $discount=check_offer($row['id'],$request['start_date'],$request['end_date'],
                                    $request["count_room"],$difrent);
                                foreach ($period as $key=>$dt) {
                                    $day_price=priceroom($row['id'],$dt->format("Y-m-d"));
                                    if($discount>0){
                                        $day_price=$day_price-(($day_price*$discount)/100);
}
$price +=$day_price;
                                     $days[$key]['day']=$dt->format("Y-m-d");
                                     $days[$key]['price']=$day_price;
                                }

                                $service_charge=number_format($price*($settings['service_charge']/100),2);
                                $vat=number_format($price*($settings['vat']/100),2);

                                ?>
                                @if($discount>0)

                                <li><a>{{$difrent }} Days  {{$discount}}% Off</a></li>
                                    @endif
                                <li><a>Average Rate <span style="font-size: 20px;"> USD {{number_format(($price/$difrent),2)}}</span></a></li>
                            </ul>
                            <ul class="accordion-box clearfix">
                                <li class="accordion block">
                                    <div class="acc-btn">Daily Day Rate</div>
                                    <div class="acc-content" style="display: none;">
                                        <div class="content">
                                            <div class="text">
                                                <ul>
                                                    @foreach($days as $day)
                                                    <li><a>{{$day['day']}} <span style="font-size: 20px;"> USD {{$day['price']}}</span></a></li>
                                                        @endforeach

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <div class="widget-title">
                                <h6>Total Room Rates :<span> USD {{$price}}</span></h6>
                            </div>
                            <div class="widget-title">
                                <h6>Service Charge ({{$settings['service_charge']}}%) :
                                    <span> USD {{$service_charge}}</span></h6>
                            </div>
                            <div class="widget-title">
                                <h6>VAT ({{$settings['vat']}}%) : <span> USD {{$vat}}</span> </h6>
                            </div>
                            <div class="widget">
                                <h6>Estimated Total: USD {{$price+$vat+$service_charge}}</h6>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

            <div class="col-md-8">
                <div class="post-comment-section">
                    <div class="row">
                        <!-- Comment -->
                        <h1>Confirm Your Stay</h1>
                        <!-- Contact Form -->

                        <div class="col-md-12">
                            <h3 class="mb-30">Guest Details</h3>
                            <form method="post" class="row" action="{{route('booking')}}">

                                @csrf
                                <input type="hidden" name="room_id" value="{{$request['room_id']}}">
                                <input type="hidden" name="count_room" value="{{$request['count_room']}}">
                                <input type="hidden" name="start_date" value="{{$request['start_date']}}">
                                <input type="hidden" name="end_date" value="{{$request['end_date']}}">
                                <input type="hidden" name="price" value="{{$price+$vat+$service_charge}}">
                                <div class="col-md-6">
                                    <input type="text" name="first_name" id="first_name" placeholder="First Name *" required="">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="last_name" id="last_name" placeholder="Last Name *" required="">
                                </div>
                                <div class="col-md-12">
                                    <input type="text" name="phone" id="phone" placeholder="Mobile Phone Number *" required="">
                                </div>
                                <div class="col-md-12">
                                    <input type="text" name="email" id="email" placeholder="Email Address *" required="">
                                </div>

                                <div class="col-md-12">
                                    <input type="text" name="country" id="country" placeholder="Country/Region *" required="">
                                </div>
                                <blockquote>
                                    <cite>Terms & Conditions</cite>

                                    <p> <input class="form-check-input" required name="terms" id="terms" type="checkbox" value="1" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            I have read & accepted the
                                        </label></p>
                                    <p>{{$settings['terms_booking']}}</p>
                                </blockquote>
                                <input type="hidden" name="token_generate"class="token_generate">
                                <div class="col-md-12">
                                    <button onclick="save_form($(this),event)" class=" btn btn-dark mt-15"><span>Book</span></button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</section>
@endsection

