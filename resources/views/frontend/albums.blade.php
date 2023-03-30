@extends('frontend.layouts.index')


@section('content')
    <div class="banner-header section-padding valign bg-img bg-fixed" data-overlay-dark="4"
         data-background="{{getfile($settings['album_image'])}}">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-left caption mt-90">
                    <h5>Images & Videos</h5>
                    <h1>Our Gallery</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Image Gallery -->
    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-subtitle">Images</div>
                    <div class="section-title">Image Gallery</div>
                </div>
                <!-- 3 columns -->
                @foreach($albums as $album)
                    @foreach($album['images'] as $image)
                <div class="col-md-4 gallery-item">
                    <a href="{{getfile($image['image'])}}" title="{{$settings['name']}}" class="img-zoom">
                        <div class="gallery-box">
                            <div class="gallery-img"> <img src="{{getfile($image['image'])}}"
                                                           class="img-fluid mx-auto d-block" alt="{{$settings['name']}}"> </div>
                        </div>
                    </a>
                </div>
                    @endforeach
                @endforeach

            </div>
        </div>
    </section>
    <!-- Video Gallery -->
    <section class="section-padding bg-cream">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-subtitle">Videos</div>
                    <div class="section-title">Video Gallery</div>
                </div>
             @foreach($videos as $video)
                <div class="col-md-4">
                    <div class="vid-area mb-30">
                        <div class="vid-icon"> <img src="{{getfile($video['image'])}}" alt="{{$settings['name']}}">
                            <a class="video-gallery-button vid" href="{{$video['url']}}"> <span class="video-gallery-polygon">
                                    <i class="ti-control-play"></i>
                                </span> </a>
                        </div>
                    </div>
                </div>
                 @endforeach

            </div>
        </div>
    </section>


@endsection
