@extends('frontend.layouts.index')


@section('content')
    <header class="header slider-fade">
        <div class="owl-carousel owl-theme">
            <!-- The opacity on the image is made with "data-overlay-dark="number". You can change it using the numbers 0-9. -->
            @foreach($sliders as $slider)
                <div class="text-center item bg-img" data-overlay-dark="2" data-background="{{getfile($slider['image'])}}">
                    <div class="v-middle caption">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-10 offset-md-1">
                                    <h1> {{$slider['text']}} </h1>
                                    @if(isset($slider['route']))
                                        <div class="butn-light mt-30 mb-30"> <a href="{{$slider['route']}}" data-scroll-nav="1"><span>Book Room</span></a> </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </header>
    <!-- About -->
    <section class="about section-padding gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-30 animate-box home-center" data-animate-effect="fadeInUp">

                    <div class="section-subtitle"> {{$settings['title']}}</div>
                    <div class="section-title">{{$settings['sub_title']}}</div>
                    <p> {!! $settings['about'] !!}</p>

                </div>
            </div>
        </div>
    </section>
    <!-- Rooms -->
    <section class="rooms3 section-padding accommodations_bg" data-scroll-index="1">
        <div class="container ">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title home-center">Accommodations</div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme">
                        @foreach($rooms as $room)
                            <div class="square-flip">
                                <div class="square bg-img" data-background="{{getfile($room['image'])}}">
                                    <span class="category"><a href="#">Book</a></span>
                                    <div class="square-container d-flex align-items-end justify-content-end">
                                        <div class="box-title">
                                            @if(priceroom($room['id'],date('Y-m-d'))>0)
                                                <h6>{{priceroom($room['id'],date('Y-m-d'))}}$ / Night</h6>
                                            @endif
                                            <h4>{{$room['name']}}</h4>
                                        </div>
                                    </div>
                                    <div class="flip-overlay"></div>
                                </div>
                                <div class="square2 bg-white">
                                    <div class="square-container2">
                                        @if(priceroom($room['id'],date('Y-m-d'))>0)
                                            <h6>{{priceroom($room['id'],date('Y-m-d'))}}$ / Night</h6>
                                        @endif
                                        <h4>{{$room['name']}}</h4>
                                        <p>{{mb_substr(strip_tags($room['description']),0,150)}}</p>
                                        <div class="row room-facilities mb-30">
                                            @foreach($room->options()->take(4)->get() as $option)
                                                <div class="col-md-6">
                                                    <ul>
                                                        <li><i class="fa {{$option['icon']}}"></i> {{$option['pivot']['short_value']}}</li>

                                                    </ul>
                                                </div>
                                            @endforeach

                                        </div>
                                        <div class="btn-line"><a href="{{route('show_rom',[$room['id'],\Illuminate\Support\Str::slug($room['name'])])}}">Details</a></div>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                    </div>
                </div>
            </div>
            @if(count($offers)>0)
                <section class="news  ">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-title home-center">Featured Offers</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="owl-carousel owl-theme">
                                @foreach($offers as $offer)
                                    <div class="item">
                                        <div class="position-re o-hidden"> <img src="{{getfile($offer['image'])}}"
                                                                                alt="{{$offer['name']}}">
                                            <div class="date">
                                                <a href="#"> <i>{{$offer['price']}}% Off</i> </a>
                                            </div>
                                        </div>
                                        <div class="con">
                                            <h5><a href="{{route('show_rom',[$offer['room_id'],\Illuminate\Support\Str::slug($offer['rooms']['name'])])}}">{{$offer['name']}}</a></h5>
                                        </div>
                                    </div>
                                @endforeach



                            </div>
                        </div>
                    </div>

                </section>
            @endif
        </div>

    </section>

    <!-- Services -->
    <section class="services section-padding gray-bg">
        <div class="container">
            @foreach($resorts as $key=> $resort)
                @if($key%2==0)
                    <div class="row">
                        <div class="col-md-6 p-0 animate-box" data-animate-effect="fadeInLeft">
                            <div class="img left">
                                <a href="{{route('show_resort',[$resort['id'],\Illuminate\Support\Str::slug($resort['name'])])}}"><img src="{{getfile($resort['image'])}}" alt="{{$resort['name']}}"></a>
                            </div>
                        </div>
                        <div class="col-md-6 p-0 bg-color1 bg-color1 valign animate-box" data-animate-effect="fadeInRight">
                            <div class="content">
                                <div class="cont text-left">

                                    <h4>{{$resort['name']}}</h4>
                                    <p class="color-1">{{mb_substr(strip_tags($resort['description']),0,200)}}</p>
                                    <div class="butn-dark"> <a href="{{route('show_resort',[$resort['id'],\Illuminate\Support\Str::slug($resort['name'])])}}"><span>Learn More</span></a> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="row">
                        <div class="col-md-6 bg-color2 p-0 order2 valign animate-box" data-animate-effect="fadeInLeft">
                            <div class="content">
                                <div class="cont text-left">
                                    <h4>{{$resort['name']}}</h4>
                                    <p class="color-1">{{mb_substr(strip_tags($resort['description']),0,200)}}</p>
                                    <div class="butn-dark"> <a href="{{route('show_resort',[$resort['id'],\Illuminate\Support\Str::slug($resort['name'])])}}"><span>Learn More</span></a> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 p-0 order1 animate-box" data-animate-effect="fadeInRight">
                            <div class="img">
                                <a href="{{route('show_resort',[$resort['id'],\Illuminate\Support\Str::slug($resort['name'])])}}"><img src="{{getfile($resort['image'])}}" alt="{{$resort['name']}}"></a>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </section>

    <!-- Reservation & Booking Form -->
    <section class="testimonials home-center ">
        <div class="background bg-img bg-fixed section-padding pb-0" data-background="{{getfile($settings['chek_home'])}}" data-overlay-dark="2">
            <div class="container">
                <div class="row">
                    <!-- Reservation -->
                    <div class="col-md-12 mb-30 mt-30">
                        <h1>Looking for a Relaxing Resort Vacation Rental?</h1>
                        <div class="butn-light mt-30 mb-30">
                            <a href="{{route('check_rate')}}" class=" col-md-3 btn-light ">Check Availability</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Clients -->



@endsection
