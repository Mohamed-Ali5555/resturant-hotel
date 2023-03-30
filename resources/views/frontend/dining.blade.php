@extends('frontend.layouts.index')


@section('content')

    <div class="banner-header section-padding valign bg-img bg-fixed" data-overlay-dark="4" data-background="{{getfile($dining['header_image'])}}">
        <div class="container">
            <div class="row">
                <div class="col-md-12 caption mt-90">
                    <h5>KaiSol Hotel</h5>
                    <h1>DINING</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- About -->
    <section class="about section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-30 animate-box" data-animate-effect="fadeInUp">

                    <div class="section-subtitle">KaiSol Hotel</div>
                    <span>
                        <i class="star-rating"></i>
                        <i class="star-rating"></i>
                        <i class="star-rating"></i>
                        <i class="star-rating"></i>
                        <i class="star-rating"></i>
                    </span>
                    <div class="section-title">{{$dining['title']}}</div>
                    <p> {!! $dining['description'] !!}</p>

                    <!-- reservation -->
                    <div class="reservations">
                        <div class="icon"><span class="flaticon-call"></span></div>
                        <div class="text">
                            <p>Reservation</p> <a href="tel:{{$dining['phone']}}">{{$dining['phone']}}</a>
                        </div>
                    </div>
                </div>
                <div class="col col-md-3 animate-box" data-animate-effect="fadeInUp"> <img src="{{getfile($dining['first_image'])}}" alt="{{$settings['name']}}" class="mt-90 mb-30"> </div>
                <div class="col col-md-3 animate-box" data-animate-effect="fadeInUp"> <img src="{{getfile($dining['second_image'])}}" alt="{{$settings['name']}}"> </div>
            </div>
        </div>
    </section>
    <!-- Restorant -->
    <section class="pricing section-padding bg-black">
        <div class="container">


            <div class="row">
                <div class="col-md-4">
                    <div class="section-title align-content-center" style="color: #aa8453;">Restaurants</div>
                    <p class="color-2">{{$settings['restaurant_text']}}</p>
                </div>
                <div class="col-md-8">
                    <div class="owl-carousel owl-theme">
                        @foreach($restaurants as $restaurant)
                        <div class="pricing-card align-content-center">
                            <img src="{{getfile($restaurant['image'])}}" alt="{{$restaurant['name']}}">
                            <div class="desc">
                                <div class="name align-content-center">{{$restaurant['name']}}</div>
                                <ul class="list-unstyled list">
                                    <li><i class=" ti-time"></i> {{$restaurant['start_time']}} – {{$restaurant['end_time']}}</li>
                                    <li><i class=" ti-hand-point-right"></i> {{$restaurant['service_type']}}</li>
                                </ul>
                                <div class="butn-dark "> <a href="{{route('show_restaurant',[$restaurant['id'],\Illuminate\Support\Str::slug($restaurant['name'])])}}"><span> More ...</span></a> </div>

                            </div>

                        </div>
                            @endforeach

                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- Bars -->
    <section class="pricing section-padding gray-bg accommodations_bg">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="section-title align-content-center" style="color: #aa8453;">Bars</div>
                    <p class="color-2">{{$settings['bars']}}</p>
                </div>
                <div class="col-md-8">
                    <div class="owl-carousel owl-theme">
                        @foreach($barses as $bars)
                        <div class="pricing-card">
                            <img src="{{getfile($bars['image'])}}" alt="{{$bars['name']}}">
                            <div class="desc">
                                <div class="amount">
                                    <a href="{{route('show_restaurant',[$bars['id'],\Illuminate\Support\Str::slug($bars['name'])])}}">{{$bars['name']}}</a></div>
                                <ul class="list-unstyled list">
                                    <li><i class=" ti-user"></i> Seating Capacity : {{$bars['indoor']}} Indoors</li>
                                    <li><i class="ti-time"></i> Opening Hours : {{$bars['start_time']}}-{{$bars['end_time']}}</li>
                                </ul>
                            </div>
                        </div>
                            @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
