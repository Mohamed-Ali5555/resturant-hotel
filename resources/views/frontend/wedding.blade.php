@extends('frontend.layouts.index')


@section('content')


    <!-- Header Banner -->
    <div class="banner-header section-padding valign bg-img bg-fixed" data-overlay-dark="4"
         data-background="{{getfile($row['image'])}}">
        <div class="container">
            <div class="row">
                <div class="col-md-12 caption mt-90">
                    <h5>KaiSol Hotel</h5>
                    <h1>Weddings </h1>
                </div>
            </div>
        </div>
    </div>
    <!-- About -->
    <section class="about section-padding accommodations_bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-30 animate-box home-center fadeInUp animated" data-animate-effect="fadeInUp">
                    <div class="section-title">Weddings</div>
<p>{!! $row['description'] !!}</p>
                </div>
            </div>

        </div>
        <section class="services section-padding ">
            <div class="container">
                @foreach($items as $key=> $item )
                    @if($key%2==0)
                <div class="row">
                    <div class="col-md-6 p-0 animate-box fadeInLeft animated" data-animate-effect="fadeInLeft">
                        <div class="img left">
                            <a href="#"><img src="{{getfile($item['image'])}}" alt="{{$item['name']}}"></a>
                        </div>
                    </div>
                    <div class="col-md-6 p-0 bg-color1 bg-color1 valign animate-box fadeInRight animated"
                         data-animate-effect="fadeInRight">
                        <div class="content">
                            <div class="cont text-left">

                                <h4>{{$item['name']}}</h4>
                                <p class="color-1">{{mb_substr(strip_tags($item['description']),0,150)}}</p>
                                <div class="butn-dark"> <a href="{{route('show_wedding',[$item['id'],\Illuminate\Support\Str::slug($item['name'])])}}"><span>Learn More</span></a> </div>
                            </div>
                        </div>
                    </div>
                </div>
                    @else
                <div class="row">
                    <div class="col-md-6 bg-color2 p-0 order2 valign animate-box" data-animate-effect="fadeInLeft">
                        <div class="content">
                            <div class="cont text-left">
                                <h4>{{$item['name']}}</h4>
                                <p class="color-1">{{mb_substr(strip_tags($item['description']),0,150)}}</p>
                                <div class="butn-dark"> <a href="{{route('show_wedding',[$item['id'],\Illuminate\Support\Str::slug($item['name'])])}}"><span>Learn More</span></a> </div>
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
        <section class="section-padding ">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="accordion-box clearfix">
                            @foreach($rows as $item)
                            <li class="accordion block">
                                <div class="acc-btn">{{$item['name']}}</div>
                                <div class="acc-content">
                                    <div class="content">
                                        <div class="text">{{strip_tags($item['description'])}}</div>
                                    </div>
                                </div>
                            </li>
                                @endforeach

                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </section>


@endsection
