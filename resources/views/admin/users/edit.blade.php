@extends('layouts.index')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">تعديل حساب {{$row['name']}}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">الرئيسية</a></li>
                            <li class="breadcrumb-item"><a href="{{route($route_pref.'.show',$row['user_type']??'user')}}">الاعضاء</a></li>
                            <li class="breadcrumb-item active">تعديل حساب {{$row['name']}}</li>
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
                                <ul class="nav nav-pills">
                                    <li class="nav-item "><a class="nav-link active" href="#settings" data-toggle="tab">معلومات الحساب</a></li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">


                                    <div class="active tab-pane" id="settings">
                                        <form class="form-horizontal" action="{{route($route_pref.'.update',$row['id'])}}" enctype="multipart/form-data" method="post">
                                            @csrf
                                            <input type="hidden" name="_method" value="PUT">
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

    <script>
        $('[data-mask]').inputmask()

    </script>

@endsection
