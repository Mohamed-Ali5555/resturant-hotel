@extends('frontend.layouts.index')

@section('content')
<!-- Header Banner -->
<div class="banner-header section-padding valign bg-img bg-fixed" data-overlay-dark="4"
     data-background="{{getfile($settings['privet_image'])}}">
    <div class="container">
        <div class="row">
            <div class="col-md-12 caption mt-90">
                <h5>KaiSol Hotel</h5>
                <h1>Private Retreats </h1>
            </div>
        </div>
    </div>
</div>
<!-- Private -->
<section class="section-padding accommodations_bg">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @foreach($items as $key=>$item)
                <div class="rooms2 {{$key%2==1?'left':''}} mb-90 animate-box fadeInUp animated" data-animate-effect="fadeInUp">
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
</section>

@endsection
