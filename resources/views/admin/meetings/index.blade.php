@extends('layouts.index')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"> Meeting</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active">Meeting</li>
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

    ['model_key' => 'description','type'=>"textarea", 'model' => isset($row) ? $row : null, 'model_name' =>'Description'],


                        ];
                        ?>


                        @include('include.input_lang',$fields )





<div class="row">
    <div class="col-md-3">
        <div class="form-group">

            <label for="projectinput1">  {{ucfirst('Header Image')}}  </label>
            <div class="pernt_image">
                <img class="show_image" width="100px" height="100px"
                     src="{{isset($row['image'])?getfile($row['image']): getfile(0)}}">
            </div>
            <span id="image" onclick="upload_image($(this))" style="width: 100px;padding: 7px ;margin: 10px 0" class="btn btn-success btn-lg"><i class="fa fa-upload"></i> Upload</span>
            <input  class="input_upload " type="file"


                    class="form-control"

                    name="image">

        </div>
    </div>
    <div class="col-12">
        <div class="pernt_image row" id="images_vue">
            @isset($row['images'])
                @foreach($row['images'] as $image)
                    <div class="col-3 single_image_upload"  >
                        <input type="hidden" name="photos[]" value="{{$image['id']}}"  >
                        <span class="btn" onclick="remove_image($(this),'{{$image['id']}}')">
                                             -
                                            </span>


                        <img title="{{getfile_name($image['id'])}}" width="100px" src="{{getfile($image['id']??0)}}"  style="margin: 5px">


                    </div>
                @endforeach
            @endif


        </div>

        <span id="images"  style="padding: 7px ;margin: 10px 0"
              class="btn btn-primary btn-lg"><i class="fas fa-upload"></i> Add Images</span>
        <hr>
        <div class="progress mt-3" style="height: 0px ">
            <div class="progress-bar progress-bar-striped progress-bar-animated"
                 role="progressbar"  aria-valuemin="0" aria-valuemax="100" style="width: 0%; height: 100%">0</div>
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
