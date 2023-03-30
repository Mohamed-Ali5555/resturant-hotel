@extends('frontend.layouts.index')


@section('content')
    <header class="header slider">
        <div class="owl-carousel owl-theme">
            <!-- The opacity on the image is made with "data-overlay-dark="number". You can change it using the numbers 0-9. -->
            @if(isset($activities[0]['images']))
                @foreach($activities[0]['images'] as $image)
                    <div class="text-center item bg-img" data-overlay-dark="3" data-background="{{getfile($image['id'])}}"></div>
                @endforeach
            @endif

        </div>
        <!-- arrow down -->
        <div class="arrow bounce text-center">
            <a href="#" data-scroll-nav="1" class=""> <i class="ti-arrow-down"></i> </a>
        </div>
    </header>

    <section class="section-padding services  accommodations_bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @foreach($activities as $key=> $activity)

                        <div class="row">
                            <div class="col-md-6 bg-color2 p-0 order2 valign animate-box {{$key%2==1?'right':''}} fadeInLeft animated" data-animate-effect="fadeInLeft">
                                <div class="content">
                                    <div class="cont text-left">
                                        <h4>{{$activity['name']}}</h4>
                                        <p class="color-1">{!! $activity['description'] !!}</p>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 p-0 order1 animate-box fadeInRight {{$key%2==1?'left':''}} animated" data-animate-effect="fadeInRight">
                                <div class="img">
                                    <a href="#"><img src="{{getfile($activity['image'])}}" alt="{{$activity['name']}}"></a>
                                </div>
                            </div>
                        </div>

                    @endforeach


                </div>
            </div>

        </div>
        <div class="container ">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title home-center">Diving in Detail</div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="accordion-box clearfix">
                        @foreach($divings as $diving)
                            <li class="accordion block">
                                <div class="acc-btn">{{$diving['name']}}</div>
                                <div class="acc-content">
                                    <div class="content">
                                        <div class="text"> {{$diving['description']}}</div>
                                    </div>
                                </div>
                            </li>
                        @endforeach

                    </ul>
                </div>
            </div>
        </div>
    </section>


@endsection
