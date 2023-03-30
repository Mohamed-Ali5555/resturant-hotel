@extends('frontend.layouts.index')

@section('content')

    <!-- Restaurant Slider -->
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
    <!-- Restaurant Content -->
    <section class="rooms-page section-padding" data-scroll-index="1">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-left">
                    <div class="section-title">{{$row['name']}}</div>
                    <span>
                        <i class="star-rating"></i>
                        <i class="star-rating"></i>
                        <i class="star-rating"></i>
                        <i class="star-rating"></i>
                        <i class="star-rating"></i>
                    </span>
                </div>
                <div class="col-md-12">
                    <p class="mb-30">{!! $row['description'] !!}</p>
                    <h6>Hours</h6>
                    <ul class="list-unstyled page-list mb-30">
                        @foreach($row['times'] as $times)
                        <li>
                            <div class="page-list-icon"> <span class="ti-time"></span> </div>
                            <div class="page-list-text">
                                <p>{{$times['title']}}</p>
                            </div>
                        </li>
                        @endforeach

                    </ul>
                    <h6>Type of Serving</h6>
                    <p>{{$row['service_type']}}</p>
                    <h6>Dress Code</h6>
                    <p>{{$row['dress_code']}}</p>
                    <h6>Seating Capacity</h6>
                    <ul class="list-unstyled page-list mb-30">
                        <li>
                            <div class="page-list-icon"> <span class="ti-user"></span> </div>
                            <div class="page-list-text">
                                <p>Indoor: {{$row['indoor']}} Personal</p>
                            </div>
                        </li>
                        <li>
                            <div class="page-list-icon"> <span class="ti-user"></span> </div>
                            <div class="page-list-text">
                                <p>Outdoor: {{$row['outdoor']}} Personal</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- Restaurant Menu -->
    <section id="menu" class="restaurant-menu menu section-padding bg-black">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="section-title"><span>Pavilion Restaurant Menu</span></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="tabs-icon col-md-10 offset-md-1 text-center">
                            <div class="owl-carousel owl-theme">
                                <div  onclick="change_tap($(this))" data-id="0" class=" item  ">
                                    <h6>All</h6>
                                </div>
                                @foreach($types as $key=> $type)
                                <div onclick="change_tap($(this))" data-id="{{$type['id']}}"   class=" item  ">
                                    <h6>{{$type['name']}}</h6>
                                </div>
                                @endforeach

                            </div>
                        </div>
                        <div class="restaurant-menu-content container">
                            <!-- Mains -->
                            <div  class="cont active row">
                                @foreach($row['meals'] as $key=>$meal)

                                    <div class="col-md-6 single_meal tap-0 tap-{{$meal['type_id']}} ">
                                        <div class="row">
                                        <div class="col-8">
                                            <div class="menu-info">
                                                <h5>{{$meal['name']}} <span class="price">{{$meal['price']}}$</span></h5>
                                                <p>{{$meal['description']}}</p>
                                            </div>
                                        </div>
                                        <div class="col-4 gallery-item">
                                            <a href="{{getfile($meal['image'])}}" title="{{$meal['name']}}" class="img-zoom">
                                                <div class="gallery-box">
                                                    <div class="gallery-img"> <img  src="{{getfile($meal['image'])}}"
                                                                                   class="img-fluid imag_item_new mx-auto d-block" alt="{{$meal['name']}}"> </div>
                                                </div>
                                            </a>
                                        </div>
                                        </div>


                                    </div>
                                @endforeach

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




@endsection
@section("js")
    <script>
        function change_tap(element){
            $('.restaurant-menu-content .con').css('display',"block")
            $('.single_meal').removeClass('d-none')
            $('.single_meal').not('.tap-'+$(element).data('id')).addClass('d-none');



        }
    </script>

    @endsection
