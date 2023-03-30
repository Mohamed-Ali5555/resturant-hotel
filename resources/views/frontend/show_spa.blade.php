@extends('frontend.layouts.index')

@section('content')

    <!-- Restaurant Slider -->
    <header class="header slider">
        <div class="owl-carousel owl-theme">
            <!-- The opacity on the image is made with "data-overlay-dark="number". You can change it using the numbers 0-9. -->
            <div class="text-center item bg-img" data-overlay-dark="3" data-background="{{getfile($row['image'])}}"></div>
{{--            @foreach($row['images'] as $image)--}}

{{--                <div class="text-center item bg-img" data-overlay-dark="3" data-background="{{getfile($image['id'])}}"></div>--}}

{{--            @endforeach--}}

        </div>
        <!-- arrow down -->
        <div class="arrow bounce text-center">
            <a href="#" data-scroll-nav="1" class=""> <i class="ti-arrow-down"></i> </a>
        </div>
    </header>
    <!-- Restaurant Content -->
    <section class="rooms-page section-padding" data-scroll-index="1">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-left">
                    <div class="section-title">{{$row['name']}}</div>

                </div>
                <div class="col-md-12">
                    <p class="mb-30">{!! $row['description'] !!}</p>
                    <h6>Type of Serving</h6>
                    <p>{{$row['service_type']}}</p>

            </div>
            </div>
        </div>
    </section>

@endsection
