@extends('frontend.layouts.index')


@section('content')

    <!-- Header Banner -->
    <div class="banner-header section-padding valign bg-img bg-fixed" data-overlay-dark="4"
         data-background="{{getfile($row['image'])}}">
        <div class="container">
            <div class="row">
                <div class="col-md-12 caption mt-90">
                    <h5>KaiSol Hotel</h5>
                    <h1>{{$row['name']}} </h1>
                </div>
            </div>
        </div>
    </div>
    <!-- About -->
    <section class="about section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-30 animate-box home-center fadeInUp animated" data-animate-effect="fadeInUp">
                    <div class="section-title">{{$row['name']}}</div>
                    <p>
                        {!! $row['description'] !!}
                    </p>
                </div>
            </div>
            <div class="row">
                @foreach($row['images'] as $image)
                    <div class="col-md-6 gallery-item">
                        <a href="{{getfile($image['id'])}}" title="{{$row['name']}}" class="img-zoom">
                            <div class="gallery-box">
                                <div class="gallery-img"> <img src="{{getfile($image['id'])}}"
                                                               class="img-fluid mx-auto d-block" alt="{{$row['name']}}"> </div>
                            </div>
                        </a>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

@endsection
