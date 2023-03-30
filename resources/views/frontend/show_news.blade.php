@extends('frontend.layouts.index')


@section('content')
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
    <!-- Spa-Wellness Content -->
    <section class="rooms-page section-padding accommodations_bg" data-scroll-index="1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">{{$row['title']}}</div>
                    <p class="mb-30">{!!  $row['description']!!}</p>
                </div>

            </div>
        </div>




    </section>







@endsection

@section("js")
    <script>
        function show_spa(element){
            $('.model_spa').html($(element).data('id'))
            $('#model_sap').modal('show')

        }
    </script>

@endsection
