@extends('frontend.layouts.index')


@section('content')

    <!-- Header Banner -->
    <div class="banner-header section-padding valign bg-img bg-fixed" data-overlay-dark="4"
         data-background="{{getfile($settings['contact_image'])}}">
        <div class="container">
            <div class="row">
                <div class="col-md-12 caption mt-90">
                    <h5>KaiSol Hotel</h5>
                    <h1>Contact Us </h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact -->
    <section class="contact section-padding accommodations_bg">
        <div class="container">
            <div class="row mb-90">
                <div class="col-md-6 mb-60">

    <h3>Kaisol Luxury Hotel</h3>
    <div class="reservations mb-30">
        <div class="icon"><span class="flaticon-call"></span></div>
        <div class="text">
            <p>Reservation</p> <a href="tel:{{$settings['phone']}}">{{$settings['phone']}}</a>
        </div>
    </div>
    <div class="reservations mb-30">
        <div class="icon"><span class="flaticon-envelope"></span></div>
        <div class="text">
            <p>Email Info</p> <a href="mailto:info@kaisol.com">{{$settings['email']}}</a>
        </div>
    </div>
    <div class="reservations">
        <div class="icon"><span class="flaticon-location-pin"></span></div>
        <div class="text">
            <p>Address</p>{{$settings['address']}}
        </div>
    </div>
    </div>
    <div class="col-md-5 mb-30 offset-md-1">
        <h3>Get in touch</h3>
        <form method="post" class="" action="{{route('save_contact')}}">
            <!-- form message -->
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-success contact__msg" style="display: none" role="alert"> Your message was sent successfully. </div>
                </div>
            </div>
            <!-- form elements -->
            <div class="row">
                <div class="col-md-6 form-group">
                    <input name="name" id="name" type="text" placeholder="Your Name *" required="">
                </div>
                <div class="col-md-6 form-group">
                    <input name="email" id="email" type="email" placeholder="Your Email *" required="">
                </div>
                <div class="col-md-6 form-group">
                    <input name="phone" id="phone" type="text" placeholder="Your Number *" required="">
                </div>
                <div class="col-md-6 form-group">
                    <input name="subject" id="subject" type="text" placeholder="Subject *" required="">
                </div>
                <div class="col-md-12 form-group">
                    <textarea name="message"  id="message" cols="30" rows="4" placeholder="Message *" required=""></textarea>
                </div>
                <input type="hidden" name="token_generate"class="token_generate">
                <div class="col-md-12">
                    <button onclick="save_form($(this),event)" class="btn btn-dark"><span>Send Message</span></button>
                </div>
            </div>
        </form>
    </div>
    </div>
    <!-- Map Section -->
    <div class="row">
        <div class="col-md-12 map animate-box fadeInUp animated" data-animate-effect="fadeInUp">
            @if(isset($settings['lat']))
                <div style="height: 400px" id="map"></div>
                @endif

        </div>
    </div>
    </div>
    </section>



@endsection
@section("js")
    <script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyA9UBKQHciVMSJZEoM640mtwKkTXavjrD4&libraries=places"></script>

    <script>
        var lat_locale={{$settings['lat']}};
        var lng_locale={{$settings['lang']}}



        var map = new google.maps.Map(document.getElementById('map'), {
            center:{
                lat: parseFloat(lat_locale),
                lng:parseFloat(lng_locale)
            },
            zoom: 13

        });
        var infoWindow = new google.maps.InfoWindow({map: map});


        var marker2= new google.maps.Marker({
            position:{
                lat: lat_locale,
                lng: lng_locale
            },

            map: map,
            draggable: true
        }, map.setCenter({lat:lat_locale,lng:lng_locale}));


    </script>


@endsection

