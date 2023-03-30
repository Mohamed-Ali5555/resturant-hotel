@extends('frontend.layouts.index')



<!-- Mirrored from duruthemes.com/demo/html/cappa/demo1/index2.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Nov 2022 10:21:26 GMT -->



{{--<!-- Slider -->--}}
{{--<header class="header slider-fade">--}}

{{--    <!-- slider reservation -->--}}

{{--</header>--}}
{{--<!-- Booking Search -->--}}
<!-- Slider -->
@section('content')


    <!-- Room Page Slider -->
    <header class="header slider">
        <div class="owl-carousel owl-theme">
            <!-- The opacity on the image is made with "data-overlay-dark="number". You can change it using the numbers 0-9. -->

            <div class="text-center item bg-img" data-overlay-dark="3" data-background="{{getfile($row['image'])}}"></div>
            @foreach($row['images'] as $image)
                <div class="text-center item bg-img" data-overlay-dark="3" data-background="{{getfile($image['id'])}}"></div>
            @endforeach

        </div>
        <!-- arrow down -->
        <div class="arrow bounce text-center">
            <a href="#" data-scroll-nav="1" class=""> <i class="ti-arrow-down"></i> </a>
        </div>
    </header>
    <!-- Room Content -->
    <section class="rooms-page section-padding" data-scroll-index="1">
        <div class="container">
            <!-- project content -->
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">{{$row['name']}}</div>
                </div>
                <div class="col-md-8">
                    <p class="mb-30">{!!  $row['description']!!}</p>


                </div>

            </div>
        </div>
    </section>
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


@endsection
