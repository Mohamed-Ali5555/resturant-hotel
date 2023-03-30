@extends('layouts.index')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">أنشاء حساب {{$type_user}}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">الرئيسية</a></li>
                            <li class="breadcrumb-item"><a href="{{route($route_pref.'.show',$type)}}">{{$type_user}}</a></li>
                            <li class="breadcrumb-item active">انشاء حساب</li>
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

    <script>
        $('[data-mask]').inputmask()

    </script>

@endsection
