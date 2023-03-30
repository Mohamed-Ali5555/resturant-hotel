@extends('layouts.index')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"> Settings</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active">Setting</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <form action=" @if (isset($row)) {{route($route_pref.'.update',$row['id'])}} @else{{route($route_pref.'.store')}} @endif" method="post" enctype="multipart/form-data">
                    @csrf
                    @if(isset($row))
                        <input type="hidden" name="_method" value="PUT">
                        @endif

                    <input type="hidden" name="lat" id="lat" value="{{$row['lat']??''}}">
                    <input type="hidden" name="lang" id="lang" value="{{$row['lang']??''}}">
                    <div class="row">
                        <?php
                        $fields = [
                            ['model_key' => 'name', 'model' => isset($row) ? $row : null, 'model_name' =>"Name"],
                            ['model_key' => 'title', 'model' => isset($row) ? $row : null, 'model_name' =>"Title"],
                            ['model_key' => 'sub_title', 'model' => isset($row) ? $row : null, 'model_name' =>"Sub Title"],
    ['model_key' => 'address', 'model' => isset($row) ? $row : null, 'model_name' =>"Address"],

                            ['model_key' => 'short_description','type'=>"area", 'model' => isset($row) ? $row : null, 'model_name' =>'short description'],
      ['model_key' => 'bars','type'=>"area", 'model' => isset($row) ? $row : null, 'model_name' =>'Bars'],
         ['model_key' => 'restaurant_text','type'=>"area", 'model' => isset($row) ? $row : null,
             'model_name' =>'restaurant text'],
       ['model_key' => 'terms_booking','type'=>"area", 'model' => isset($row) ? $row : null, 'model_name' =>'Terms Booking'],
     ['model_key' => 'accommodation_text','type'=>"area", 'model' => isset($row) ? $row : null, 'model_name' =>'Accommodation Text'],

    ['model_key' => 'about','type'=>"textarea", 'model' => isset($row) ? $row : null, 'model_name' =>'About'],


                        ];
                        ?>


                        @include('include.input_lang',$fields )



                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Email</label>
                                <input type="email" name="email" value="{{$settings['email']??''}}" id="email" class="form-control" placeholder="Enter Email ">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Phone</label>
                                <input  name="phone" value="{{$settings['phone']??''}}" id="phone" class="form-control"
                                        placeholder="Enter Phone">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Whatsapp</label>
                                <input type="" name="whatsapp" value="{{$settings['whatsapp']??''}}" id="whatsapp" class="form-control" placeholder="Enter Whatsapp">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> FaceBook</label>
                                <input type="" name="facebook" value="{{$settings['facebook']??''}}"
                                       id="facebook" class="form-control" placeholder="FaceBook">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Instagram</label>
                                <input type="" name="instagram" value="{{$settings['instagram']??''}}"
                                       id="instagram" class="form-control" placeholder="Instagram">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Twitter</label>
                                <input type="" name="twitter" value="{{$settings['twitter']??''}}"
                                       id="twitter" class="form-control" placeholder="Twitter ">
                            </div>
                        </div>
                            <div class="col-md-6">
                            <div class="form-group">
                                <label> Pinterest</label>
                                <input type="" name="pintrex" value="{{$settings['pintrex']??''}}"
                                       id="pintrex" class="form-control" placeholder="pinterest ">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Youtube</label>
                                <input type="" name="youtube" value="{{$settings['youtube']??''}}"
                                       id="youtube" class="form-control" placeholder="Youtube">
                            </div>
                        </div>
                            <div class="col-md-6">
                            <div class="form-group">
                                <label> service charge</label>
                                <input type="number" name="service_charge" value="{{$settings['service_charge']??0}}"
                                       id="service_charge" class="form-control" placeholder="service charge">
                            </div>
                        </div>
                            <div class="col-md-6">
                            <div class="form-group">
                                <label> vat</label>
                                <input type="number" name="vat" value="{{$settings['vat']??0}}"
                                       id="vat" class="form-control" placeholder="service charge">
                            </div>
                        </div>


                        <div class="col-12">
                            <label for="inputName" class="col-sm-2 col-form-label"> Tags </label>
                            <div class="col-sm-10">
                                <input name='tages' value=' {{$array?? ''}}' id="keywords" class="form-control basic_tag" >
                            </div>
                        </div>





                        <div class="row">
                         <div class="col-md-3">
                             <div class="form-group">

                                 <label for="projectinput1">  {{ucfirst('Logo')}}  </label>
                                 <div class="pernt_image">
                                     <img class="show_image" width="100px" height="100px" src="{{isset($row['logo'])?getfile($row['logo']): getfile(0)}}">
                                 </div>
                                 <span id="logo" onclick="upload_image($(this))" style="width: 100px;padding: 7px ;margin: 10px 0" class="btn btn-success btn-lg"><i class="fa fa-upload"></i> Upload</span>
                                 <input  class="input_upload " type="file"


                                         class="form-control"

                                         name="logo">
                                 @error('logo')
                                 <span class="text-danger">{{$message}}</span>
                                 @enderror
                             </div>
                         </div>

                            <div class="col-md-3">
                             <div class="form-group ">

                                 <label for="projectinput1">  {{ucfirst('default image')}}  </label>
                                 <div class="pernt_image">
                                     <img class="show_image" width="100px" height="100px" src="{{isset($row['default_image'])?getfile($row['default_image']): getfile(0)}}">
                                 </div>
                                 <span id="default_image" onclick="upload_image($(this))" style="width: 100px;padding: 7px ;margin: 10px 0" class="btn btn-success btn-lg"><i class="fa fa-upload"></i> Ubload</span>
                                 <input  class="input_upload " type="file"


                                         class="form-control"

                                         name="default_image">
                                 @error('default_image')
                                 <span class="text-danger">{{$message}}</span>
                                 @enderror
                             </div>
                         </div>
                            <div class="col-md-3">
                             <div class="form-group ">

                                 <label for="projectinput1">  {{ucfirst('Icon')}}  </label>
                                 <div class="pernt_image">
                                     <img class="show_image" width="100px" height="100px" src="{{isset($row['icon'])?getfile($row['icon']): getfile(0)}}">
                                 </div>
                                 <span id="icon" onclick="upload_image($(this))" style="width: 100px;padding: 7px ;margin: 10px 0" class="btn btn-success btn-lg">
                                     <i class="fa fa-upload"></i> Upload</span>
                                 <input  class="input_upload" type="file"


                                         class="form-control"

                                         name="icon">
                                 @error('icon')
                                 <span class="text-danger">{{$message}}</span>
                                 @enderror
                             </div>
                         </div>


                            <div class="col-md-3">
                             <div class="form-group ">

                                 <label for="projectinput1">  {{ucfirst('Admin Image')}}  </label>
                                 <div class="pernt_image">
                                     <img class="show_image" width="100px" height="100px" src="{{isset($row['admin_image'])?getfile($row['admin_image']): getfile(0)}}">
                                 </div>
                                 <span id="admin_image" onclick="upload_image($(this))" style="width: 100px;padding: 7px ;margin: 10px 0" class="btn btn-success btn-lg"><i class="fa fa-upload"></i> Upload</span>
                                 <input  class="input_upload" type="file"


                                         class="form-control"

                                         name="admin_image">
                                 @error('admin_image')
                                 <span class="text-danger">{{$message}}</span>
                                 @enderror
                             </div>
                         </div>

                            <div class="col-md-3">
                             <div class="form-group ">

                                 <label for="projectinput1">  {{ucfirst('Accommodation Image')}}  </label>
                                 <div class="pernt_image">
                                     <img class="show_image" width="100px" height="100px" src="{{isset($row['accommodation_image'])?getfile($row['accommodation_image']): getfile(0)}}">
                                 </div>
                                 <span id="accommodation_image" onclick="upload_image($(this))" style="width: 100px;padding: 7px ;margin: 10px 0" class="btn btn-success btn-lg"><i class="fa fa-upload"></i> Upload</span>
                                 <input  class="input_upload" type="file"


                                         class="form-control"

                                         name="accommodation_image">
                                 @error('admin_image')
                                 <span class="text-danger">{{$message}}</span>
                                 @enderror
                             </div>
                         </div>
                            <div class="col-md-3">
                             <div class="form-group ">

                                 <label for="projectinput1">  {{ucfirst('Album Image')}}  </label>
                                 <div class="pernt_image">
                                     <img class="show_image" width="100px" height="100px" src="{{isset($row['album_image'])?getfile($row['album_image']): getfile(0)}}">
                                 </div>
                                 <span id="album_image" onclick="upload_image($(this))" style="width: 100px;padding: 7px ;margin: 10px 0" class="btn btn-success btn-lg"><i class="fa fa-upload"></i> Upload</span>
                                 <input  class="input_upload" type="file"


                                         class="form-control"

                                         name="album_image">

                             </div>
                         </div>
                            <div class="col-md-3">
                             <div class="form-group ">

                                 <label for="projectinput1">  {{ucfirst('Chek Home')}}  </label>
                                 <div class="pernt_image">
                                     <img class="show_image" width="100px" height="100px"
                                          src="{{isset($row['chek_home'])?getfile($row['chek_home']): getfile(0)}}">
                                 </div>
                                 <span id="chek_home" onclick="upload_image($(this))" style="width: 100px;padding: 7px ;margin: 10px 0" class="btn btn-success btn-lg"><i class="fa fa-upload"></i> Upload</span>
                                 <input  class="input_upload" type="file"


                                         class="form-control"

                                         name="chek_home">

                             </div>
                         </div>
                            <div class="col-md-3">
                             <div class="form-group ">

                                 <label for="projectinput1">  {{ucfirst('Privet Image')}}  </label>
                                 <div class="pernt_image">
                                     <img class="show_image" width="100px" height="100px"
                                          src="{{isset($row['privet_image'])?getfile($row['privet_image']): getfile(0)}}">
                                 </div>
                                 <span id="privet_image" onclick="upload_image($(this))" style="width: 100px;padding: 7px ;margin: 10px 0" class="btn btn-success btn-lg"><i class="fa fa-upload"></i> Upload</span>
                                 <input  class="input_upload" type="file"


                                         class="form-control"

                                         name="privet_image">

                             </div>
                         </div>
                            <div class="col-md-3">
                             <div class="form-group ">

                                 <label for="projectinput1">  {{ucfirst('contact image')}}  </label>
                                 <div class="pernt_image">
                                     <img class="show_image" width="100px" height="100px"
                                          src="{{isset($row['contact_image'])?getfile($row['contact_image']): getfile(0)}}">
                                 </div>
                                 <span id="contact_image" onclick="upload_image($(this))" style="width: 100px;padding: 7px ;margin: 10px 0" class="btn btn-success btn-lg"><i class="fa fa-upload"></i> Upload</span>
                                 <input  class="input_upload" type="file"


                                         class="form-control"

                                         name="contact_image">

                             </div>
                         </div>

                            <div class="col-12 " id="all_map">
                                <div class="row">
                                    <div class="form-group row form-md-line-input col-12">
                                        <div class="col-md-12">
                                            <input id="search2" style="margin-bottom: 4px;border: 1px solid #ff4e1c;color: #ff4e1c"  placeholder="{{ __('Seacrch') }}" class="form-control">
                                            <div class="form-control-focus"> </div>
                                        </div>
                                    </div>
                                </div>
                                <div style="height: 400px" id="map"></div>
                            </div>



                        </div>






                    </div>

<div>
    <button  onclick="save_form($(this),event)"   type="submit" class="btn btn-primary">
        <i class="la la-check-square-o"></i> Save
    </button>
</div>

                </form>

            </div>
        </section>

    </div>
@endsection
@section('js')
    <script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyA9UBKQHciVMSJZEoM640mtwKkTXavjrD4&libraries=places"></script>

    <script>
        $('[data-mask]').inputmask()

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
