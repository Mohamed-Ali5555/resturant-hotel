@extends('frontend.layouts.index')


@section('content')

    <!-- Header Banner -->
    <div class="banner-header section-padding valign bg-img bg-fixed" data-overlay-dark="4"
         data-background="{{getfile($row['image'])}}">
        <div class="container">
            <div class="row">
                <div class="col-md-12 caption mt-90">
                    <h5>KaiSol Hotel</h5>
                    <h1>Events & Meetings </h1>
                </div>
            </div>
        </div>
    </div>
    <!-- About -->
    <section class="about section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-30 animate-box home-center fadeInUp animated" data-animate-effect="fadeInUp">
                    <div class="section-title">Meetings & Events</div>
<p>
    {!! $row['description'] !!}
</p>                </div>
            </div>
        </div>
        <div class="container">
            <div class="row mb-30 animate-box home-center fadeInUp animated">
                <div class="col-md-12">
                    <div class="row" style="background-color: #ccc;">
                        <div class="col-3"><h6>Find a Venue</h6></div>
                        <div class="col-2"><h6>Size (m2)</h6></div>
                        <div class="col-2"><h6>Banquet</h6></div>
                        <div class="col-2"><h6>Classroom</h6></div>
                        <div class="col-2"><h6>Reception</h6></div>
                    </div>
                    @foreach($items as $item)
                    <div class="row">
                        <div class="col-3"><a href="{{route('show_meeting',[$item['id'],\Illuminate\Support\Str::slug($item['name'])])}}">{{$item['name']}}</a></div>
                        <div class="col-2"><a href="{{route('show_meeting',[$item['id'],\Illuminate\Support\Str::slug($item['name'])])}}">{{$item['size']}}</a></div>
                        <div class="col-2"><a href="{{route('show_meeting',[$item['id'],\Illuminate\Support\Str::slug($item['name'])])}}">{{$item['banquet']}}</a></div>
                        <div class="col-2"><a href="{{route('show_meeting',[$item['id'],\Illuminate\Support\Str::slug($item['name'])])}}">{{$item['classroom']}} </a></div>
                        <div class="col-2"><a href="{{route('show_meeting',[$item['id'],\Illuminate\Support\Str::slug($item['name'])])}}">{{$item['reception']}} </a></div>
                    </div>
                        @endforeach

                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row mb-30 animate-box home-center fadeInUp animated">
            @foreach($row['images'] as $image)
            <div class="col-md-4 gallery-item">
                <a href="{{getfile($image['id'])}}" title="{{$settings['name']}}" class="img-zoom">
                    <div class="gallery-box">
                        <div class="gallery-img"> <img src="{{getfile($image['id'])}}" class="img-fluid mx-auto d-block"
                                                       alt="{{$settings['name']}}"> </div>
                    </div>
                </a>
            </div>
                @endforeach

        </div>
    </div>


@endsection
