@extends('layouts.index')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Spa Item</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{route($route_pref.'.index')}}">Spa</a></li>
                            <li class="breadcrumb-item active"> Add Item</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header p-2">

                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">


                                    <div class="active tab-pane" id="settings">
                                        <form class="form-horizontal" action="{{route($route_pref.'.store')}}" enctype="multipart/form-data" method="post">
                                            @csrf
                                          @include('admin.'.$route_pref.'.form')
                                        </form>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <!-- /.card -->
                    </div>

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
    </div>
@endsection
@section('js')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-jcrop/0.9.15/css/jquery.Jcrop.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-jcrop/0.9.15/js/jquery.Jcrop.js"></script>
    <script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyA9UBKQHciVMSJZEoM640mtwKkTXavjrD4&libraries=places"></script>

    <script>
        $('[data-mask]').inputmask()
        $('#image_plan').Jcrop({
            onSelect: function(c){
                console.log(c);
$('#x_image').val(c.x)
                $('#y_image').val(c.y)
                $('#w_image').val(c.w)
                $('#h_image').val(c.h)


            }
        })

    </script>

    <script>
        var lat_locale={{$row['lat']??30.1254945}};
        var lng_locale={{$row['lang']??31.3198379}}



        var map = new google.maps.Map(document.getElementById('map'), {
            center:{
                lat: parseFloat(lat_locale),
                lng:parseFloat(lng_locale)
            },
            zoom: 13

        });
        var infoWindow = new google.maps.InfoWindow({map: map});
        function tyoe_map(){
            @if(!isset($row['lat']))


            @else


            @endif

        }
        function handleLocationError(browserHasGeolocation, infoWindow, pos) {
            infoWindow.setPosition(pos);
            infoWindow.setContent(browserHasGeolocation ?
                'Error: خطاء في الخرائط.' :
                'Error: المتصفح لا يدعم الخرائط');
        }
        var marker2= new google.maps.Marker({
            position:{
                lat: lat_locale,
                lng: lng_locale
            },

            map: map,
            draggable: true
        }, map.setCenter({lat:lat_locale,lng:lng_locale}));

        google.maps.event.addListener(marker2, 'dragend', function (){
            var lat = marker2.getPosition().lat();
            var lng = marker2.getPosition().lng();
            $("#lat").val(lat);
            $("#lang").val(lng);
        });



        map.addListener('click', function(e) {
            var geocoder = geocoder = new google.maps.Geocoder();
            geocoder.geocode({ 'latLng': e.latLng }, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    marker2.setPosition( e.latLng)

                    var lat = marker2.getPosition().lat();
                    var lng = marker2.getPosition().lng();
                    $("#lat").val(lat);
                    $("#lang").val(lng);
                    map.setCenter( e.latLng);
                }
            });

        });



        function current() {

            if (navigator.geolocation) {

                navigator.geolocation.getCurrentPosition(function (position) {

                    lat =position.coords.latitude;
                    lng = position.coords.longitude

                    var pos = {
                        lat: lat,
                        lng: lng
                    };

                    marker2.setPosition(pos)

                    $("#lat").val(lat);
                    $("#lang").val(lng);
                    map.setCenter(pos);
                }, function () {
                    handleLocationError(true, infoWindow, map.getCenter());
                });
            } else {
                // Browser doesn't support Geolocation
                handleLocationError(false, infoWindow, map.getCenter());
            }
        }
        var searchBox  = new google.maps.places.SearchBox(document.getElementById('search2'));
        google.maps.event.addListener(searchBox , 'places_changed' , function(){

            var places = searchBox.getPlaces();
            var bounds = new google.maps.LatLngBounds();
            var i, place;
            for (i = 0; place = places[i]; i++) {
                bounds.extend(place.geometry.location)
                marker2.setPosition(place.geometry.location)
            }
            var lat =parseFloat( marker2.getPosition().lat());

            var lng = parseFloat(marker2.getPosition().lng());
            console.log(place.geometry.location)
            map.fitBounds(bounds);

            map.setZoom(13);
            map.setCenter(lat,lng);
        });
        google.maps.event.addListener(marker2 , 'position_changed' , function(){
            var lat =parseFloat( marker2.getPosition().lat());

            var lng = parseFloat(marker2.getPosition().lng());
            var lat = marker2.getPosition().lat();
            var lng = marker2.getPosition().lng();
            $("#lat").val(lat);
            $("#lang").val(lng);
            marker2.setPosition(lat,lng)
            var pos = {
                lat: lat,
                lng: lng
            };
            map.setCenter(pos);
        });
        //
        tyoe_map()
    </script>

@endsection
