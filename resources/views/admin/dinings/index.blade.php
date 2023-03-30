@extends('layouts.index')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"> Dining</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active">Dining</li>
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
                    <div class="row">
                        <?php
                        $fields = [
                            ['model_key' => 'title', 'model' => isset($row) ? $row : null, 'model_name' =>"Title"],

    ['model_key' => 'description','type'=>"textarea", 'model' => isset($row) ? $row : null, 'model_name' =>'Description'],


                        ];
                        ?>


                        @include('include.input_lang',$fields )



                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Phone</label>
                                <input  name="phone" value="{{$settings['phone']??''}}" id="phone" class="form-control"
                                        placeholder="Enter Phone">
                            </div>
                        </div>


<div class="row">
    <div class="col-md-3">
        <div class="form-group">

            <label for="projectinput1">  {{ucfirst('Header Image')}}  </label>
            <div class="pernt_image">
                <img class="show_image" width="100px" height="100px" src="{{isset($row['header_image'])?getfile($row['header_image']): getfile(0)}}">
            </div>
            <span id="header_image" onclick="upload_image($(this))" style="width: 100px;padding: 7px ;margin: 10px 0" class="btn btn-success btn-lg"><i class="fa fa-upload"></i> Upload</span>
            <input  class="input_upload " type="file"


                    class="form-control"

                    name="header_image">

        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">

            <label for="projectinput1">  {{ucfirst('First Image')}}  </label>
            <div class="pernt_image">
                <img class="show_image" width="100px" height="100px" src="{{isset($row['first_image'])?getfile($row['first_image']): getfile(0)}}">
            </div>
            <span id="first_image" onclick="upload_image($(this))" style="width: 100px;padding: 7px ;margin: 10px 0" class="btn btn-success btn-lg"><i class="fa fa-upload"></i> Upload</span>
            <input  class="input_upload " type="file"


                    class="form-control"

                    name="first_image">

        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">

            <label for="projectinput1">  {{ucfirst('Second Image')}}  </label>
            <div class="pernt_image">
                <img class="show_image" width="100px" height="100px" src="{{isset($row['second_image'])?getfile($row['second_image']): getfile(0)}}">
            </div>
            <span id="second_image" onclick="upload_image($(this))" style="width: 100px;padding: 7px ;margin: 10px 0" class="btn btn-success btn-lg"><i class="fa fa-upload"></i> Upload</span>
            <input  class="input_upload " type="file"


                    class="form-control"

                    name="second_image">

        </div>
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

    <script>
        $('[data-mask]').inputmask()

    </script>

    @endsection
