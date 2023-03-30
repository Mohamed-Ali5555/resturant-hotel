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
                    <p class="mb-30">{!! $row['description'] !!}</p>

                    <div class="col-md-12">
                        <div class="butn-dark mt-15 mb-30"> <a href="javascript:void(0)" onclick="show_modal('{{$row['id']}}')"><span>Book Now</span></a> </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-title">Amenities Facilities</div>
                        </div>
                        @foreach($row['options'] as $option)
                        <div class="col-md-6">
                            <ul class="list-unstyled page-list mb-30">
                                <li>
                                    <div class="page-list-icon"> <span class="fa {{$option['icon']}}"></span> </div>
                                    <div class="page-list-text">
                                        <h6>{{$option['name']}}</h6>      <p>{{$option['pivot']['value']??''}}</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        @endforeach
                        <div class="col-12"></div>

                        <h2>Policies</h2>
                        @foreach($polices as $policy)
                            <div class="col-md-12">
                                <h6>{{$policy['title']}}</h6>
                                <p>{{strip_tags($policy['description'])}}</p>
                            </div>
                            @endforeach
                        @foreach($row['policies'] as $policy)
                        <div class="col-md-12">
                            <h6>{{$policy['title']}}</h6>
                            <p>{{$policy['description']}}</p>
                        </div>
                        @endforeach

                        <div class="col-md-12">
                            <div class="butn-dark mt-15 mb-30"> <a href="javascript:void(0)" onclick="show_modal('{{$row['id']}}')"><span>Resevation</span></a> </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 offset-md-1">
                    <h6>Amenities</h6>
                    <ul class="list-unstyled page-list mb-30">
                        @foreach($row['options'] as $option)
                        <li>
                            <div class="page-list-icon"> <span class="fa {{$option['icon']}}"></span> </div>
                            <div class="page-list-text">
                                <p>{{$option['pivot']['short_value']??''}}</p>
                            </div>
                        </li>
                            @endforeach

                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- Similiar Room -->
    <section class="rooms3 section-padding bg-black">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title"><span>Similar Rooms</span></div>
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
                                    <p>{{mb_substr(strip_tags($room['description']),0,100)}}</p>
                                    <div class="row room-facilities mb-30">
                                        @foreach($room['options'] as $option)
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
        </div>
    </section>
    <!-- Footer -->


@endsection
