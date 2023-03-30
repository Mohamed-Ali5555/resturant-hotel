@extends('layouts.index')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">اعدادات حسابي</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">الرئيسية</a></li>
                            <li class="breadcrumb-item active">اعدادت حسابي</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">

                        <!-- Profile Image -->
                        <div class="card  card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <form method="post" action="{{route('update_image')}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group ">

                                            <label for="projectinput1">  {{ucfirst('الصورة لشخصية')}}  </label>
                                            <div class="pernt_image">
                                                <img class="show_image rounded-circle" width="100px" height="100px" src="{{isset(auth()->user()['image'])?getfile(auth()->user()['image']): getfile(0)}}">
                                            </div>
                                            <span id="image" onclick="upload_image($(this))" style="width: 100px;padding: 7px ;margin: 10px 0" class="btn btn-success btn-lg"><i class="fa fa-upload"></i> تحميل</span>
                                            <input  class="input_upload " type="file"


                                                    class="form-control"

                                                    name="image">
                                            @error('image')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>

                                        <button class="btn btn-primary">حفظ</button>
                                    </form>

                                </div>



                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->


                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                   <li class="nav-item "><a class="nav-link active" href="#settings" data-toggle="tab">الاعدادات</a></li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">


                                    <div class="active tab-pane" id="settings">
                                        <form class="form-horizontal" action="{{route('save_profile')}}" method="post">
                                           @csrf
                                            <div class="form-group row">
                                                <label for="inputName" class="col-sm-2 col-form-label">الاسم</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="name" value="{{auth()->user()['name']??''}}" class="form-control" id="name" placeholder="الاسم">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail" class="col-sm-2 col-form-label">البريد الالكتروني</label>
                                                <div class="col-sm-10">
                                                    <input type="email" name="email" value="{{auth()->user()['email']}}" class="form-control" id="email" placeholder="البريد اللكتروني">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail" class="col-sm-2 col-form-label">الهاتف </label>
                                                <div class="col-sm-10">
                                                    <input dir="ltr" type="text"value="{{auth()->user()['phone']??''}}" name="phone" class="form-control ltr" style="direction: ltr" data-inputmask="&quot;mask&quot;: &quot;(+999) 99-999-9999&quot;" data-mask="" inputmode="text">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail" class="col-sm-2 col-form-label">الرمز السري</label>
                                                <div class="col-sm-10">
                                                    <input autocomplete="new-password" type="password" name="password" value="" class="form-control" id="password" placeholder="الرمز السري الجديد">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="offset-sm-2 col-sm-10">
                                                    <button onclick="save_form($(this),event)"  type="submit" class="btn btn-danger">تعديل</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
    </div>
@endsection
@section('js')

    <script>
        $('[data-mask]').inputmask()

    </script>

@endsection
