@extends('frontend.layouts.index')


@section('content')

    <section class="testimonials">
        <div class="background bg-img bg-fixed section-padding pb-0" data-background="{{getfile($settings['accommodation_image'])}}" data-overlay-dark="2">
            <div class="container">
                <div class="row">
                    <!-- Reservation -->
                    <div class="col-md-5 mb-30 mt-30">
                        <h5>{{$settings['accommodation_text']}}</h5>
                        <div class="reservations mb-30">
                            <div class="icon color-1"><span class="flaticon-call"></span></div>
                            <div class="text">
                                <p class="color-1">Reservation</p> <a class="color-1" href="tel:{{$settings['phone']}}">{{$settings['phone']}}</a>
                            </div>
                        </div>
                    </div>
                    <!-- Booking From -->
                    <div class="col-md-5 offset-md-2">
                        <div class="booking-box">
                            <div class="head-box">
                                <h6>Rooms & Suites</h6>
                                <h4>Hotel Booking Form</h4>
                            </div>
                            <div class="booking-inner clearfix">
                                <form action="{{route('accommodations')}}"  class="form1 clearfix">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="input1_wrapper">
                                                <label>Check-in date</label>
                                                <div class="input1_inner">
                                                    <input type="text" name="start_date" id="start_date" onkeyup="get_room()"  class="form-control input datepicker" placeholder="Check-in date">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input1_wrapper">
                                                <label>Check-out date</label>
                                                <div class="input1_inner">
                                                    <input type="text" onkeyup="get_room()" name="end_date" id="end_date" class="form-control input datepicker" placeholder="Check-out date">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="select1_wrapper">
                                                <label>Adults</label>
                                                <div class="select1_inner">
                                                    <select id="adult_id" onchange="get_room()" name="adult_id"  class="form-control select2 select" style="">
                                                        <option value="0">Adults</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="select1_wrapper">
                                                <label>Room Type</label>
                                                <div class="select1_inner">
                                                    <select id="category_id" onchange="get_room()" name="category_id"  class="select2 select form-control" >
                                                        <option value="">Room Type</option>
                                                        @foreach($types as $type)
                                                            <option value="{{$type['id']}}">{{$type['name']}}</option>
                                                            @endforeach

                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <button type="submit" class="btn-form1-submit mt-15">Check Availability</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Rooms  -->
    <div class="rooms3 section-padding">
        <div class="container">
            <div class="row" id="all_room">
                @if(count($rooms)==0)
                    <h1>No Rooms Avilable</h1>

                    @endif
              @include("frontend.list_room")

            </div>
        </div>

    </div>

    <!-- Policies -->
    <section class="pricing section-padding bg-black">
        <div class="container">
            <div class="section-title"><span>Policies</span></div>
            <div class="row">
                @foreach($policies as $policy)
                <div class="col-md-4">

                    <div class="reservations mb-30">
                        <div class="icon"><span class="fa {{$policy['icon']}}"></span></div>

                        <div class="text">
                            <a >{{$policy['title']}}</a> <hr /> <p>{!! $policy['description'] !!}</p>
                        </div>
                    </div>
                </div>
                    @endforeach


            </div>
        </div>
    </section>

@endsection
@section('js')
    <script>
        function get_room()
        {

            adult_id=$('#adult_id').val()
            category_id=$('#category_id').val()
            start_date=$('#start_date').val()
            end_date=$('#end_date').val()

            $.ajax({
                type:"get",
                url:"{{route('accommodations')}}",
                data:{adult_id:adult_id,category_id:category_id,start_date:start_date,end_date:end_date},
                success:function (data){
                    console.log(data)
                    $('#all_room').html(data)

                }
            })
        }

    </script>


@endsection
