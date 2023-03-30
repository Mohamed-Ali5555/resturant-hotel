@extends('frontend.layouts.index')


@section('content')
    <header class="header slider">
        <div class="owl-carousel owl-theme">
            <!-- The opacity on the image is made with "data-overlay-dark="number". You can change it using the numbers 0-9. -->
            @foreach($spa['images'] as $image)
            <div class="text-center item bg-img" data-overlay-dark="3" data-background="{{getfile($image['id'])}}"></div>
         @endforeach
        </div>
        <!-- arrow down -->
        <div class="arrow bounce text-center">
            <a href="#" data-scroll-nav="1" class=""> <i class="ti-arrow-down"></i> </a>
        </div>
    </header>
    <!-- Spa-Wellness Content -->
    <section class="rooms-page section-padding accommodations_bg" data-scroll-index="1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">{{$spa['name']}}</div>
                    <p class="mb-30">{{$spa['description']}}</p>
                </div>
                <div class="col-md-12">
                    <div class="reservations">
                        <div class="icon"><span class="flaticon-call"></span></div>
                        <div class="text">
                            <p>Reservations</p> <a href="tel:0129837465">{{$spa['phone']}}</a>
                        </div>
                    </div>
                    <div class="butn-dark mt-15 mb-30"> <a href="check-room.html"><span>Book Now</span></a> </div>
                </div>
            </div>
        </div>

        <section class="services section-padding2">
            <div class="container">
                @foreach($spa_items as $key=> $item)
                    @if($key%2==0)
                <div class="row">
                    <div class="col-md-6 p-0 animate-box" data-animate-effect="fadeInLeft">
                        <div class="img left">
                            <a href="#"><img src="{{getfile($item['image'])}}" alt="{{$item['name']}}"></a>
                        </div>
                    </div>
                    <div class="col-md-6 p-0 bg-color2 valign animate-box" data-animate-effect="fadeInRight">
                        <div class="content">
                            <div class="cont text-left">
                                <h4>{{$item['name']}}</h4>
                                <p>
                                    {!! $item['description'] !!}
                                </p>
                          </div>
                        </div>
                    </div>
                </div>
                    @else
                <div class="row">
                    <div class="col-md-6 bg-color1 p-0 order2 valign animate-box" data-animate-effect="fadeInLeft">
                        <div class="content">
                            <div class="cont text-left">
                                <h4>{{$item['name']}}</h4>
                         <p>{!! $item['description'] !!}</p>
                          </div>
                        </div>
                    </div>
                    <div class="col-md-6 p-0 order1 animate-box" data-animate-effect="fadeInRight">
                        <div class="img">
                            <a href="#"><img src="{{getfile($item['image'])}}" alt="{{$item['name']}}"></a>
                        </div>
                    </div>
                </div>
                    @endif
                @endforeach

            </div>
        </section>


    </section>
    <section class="positions section-padding gray-bg">
        <div class="container">
            <div class="row">


            </div>
        </div>
    </section>

    <section class="positions section-padding gray-bg">
        <div class="container">
            <div class="row">
                @foreach($items as $item)
                    <div class="col-md-6  col-sm-12  mb-60">
                        <div class="position">
                            <a class="position-link" onclick="show_spa($(this))" data-id="{{$item['description']}}" href="javascript:void(0)"></a>
                            <div class="position-title">{{$item['name']}}
                                <span>{!!  $item['short_description']!!}</span>
                            </div>
                            <div class="position-icon"><i class="ti-arrow-right"></i></div>
                        </div>

                    </div>




                @endforeach
            </div>
        </div>
    </section>


    <div class="modal fade" id="model_sap" tabindex="-1" role="dialog"
         aria-labelledby="model_sap" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body model_spa">

                </div>

            </div>
        </div>
    </div>




@endsection

@section("js")
    <script>
        function show_spa(element){
            $('.model_spa').html($(element).data('id'))
            $('#model_sap').modal('show')

        }
    </script>

@endsection
