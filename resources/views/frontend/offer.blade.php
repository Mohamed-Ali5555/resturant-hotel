@extends('frontend.layouts.index')


@section('content')

    <!-- Slider Grid Backround -->
    <div class="slider-grid-bg">
        @foreach($offer_tops as $key=>$top)
        <div style="background-image: url('{{getfile($top['image'])}}')" class="grid-img {{$key==0?'grid-img-active':''}}"></div>
        @endforeach

        <div class="content container">
            <div class="row">
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme">
                        @foreach($offer_tops as $key=>$top)

                        <div class="grid-item">
                            <a href="{{route('show_rom',[$top['room_id'],\Illuminate\Support\Str::slug($top['rooms']['name']??$settings['name'])])}}" class="grid-con">
                                <span class="book">Book</span>
                                <span class="subtitle-title">
                                    <span class="subtitle">{{$top['rooms']['price']??''}}$ / Night</span>
                                    <span class="title">{{$top['name']??''}}</span>
                                </span>
                            </a>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Rooms -->
    <section class="rooms2 section-padding bg-cream" data-scroll-index="1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-subtitle">KaiSol Hotel</div>
                    <div class="section-title">Rooms & Suites</div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme">
                        @foreach($rows as $key=> $item)
                        <div class="rooms2 {{$key%2==1?'left':''}}">
                            <figure><img src="{{getfile($item['image'])}}" alt="{{$item['name']}}" class="img-fluid"></figure>
                            <div class="caption padding-left">
                                <h3>{{$item['price']}}$ <span>/ Night</span></h3>
                                <h4><a href="{{route('show_rom',[$item['room_id'],\Illuminate\Support\Str::slug($item['rooms']['name'])])}}">{{$item['name']??""}}</a></h4>
                                <p>{{mb_substr(strip_tags($item['rooms']['description']??''),0,100)}}</p>
                                <div class="row room-facilities">
                                    @foreach($item['rooms']->options()->take(4)->get() as $option)
                                    <div class="col-md-4">
                                        <ul>

                                            <li><i class="fa {{$option['icon']}}"></i> {{$option['name']}}</li>
                                        </ul>
                                    </div>
                                    @endforeach

                                </div>
                                <hr class="border-2">
                                <div class="info-wrapper">
                                    <div class="more"><a href="{{route('show_rom',[$item['room_id'],\Illuminate\Support\Str::slug($item["rooms"]['name']??$settings['name'])])}}" class="link-btn" tabindex="0">Details <i class="ti-arrow-right"></i></a></div>
                                    <div class="butn-dark"> <a href=href="javascript:void(0)" onclick="show_modal('{{$item['room_id']}}')" data-scroll-nav="1"><span>Book Now</span></a> </div>
                                </div>
                            </div>
                        </div>
                        @endforeach



                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
