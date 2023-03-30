@extends('layouts.index')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{$type_user}}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">الرئيسية</a></li>
                            <li class="breadcrumb-item active">{{$type_user}}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                @if($type !='user')
                <div class="card-header">
                    <a href="{{route('new_user',$type)}}" class="btn btn-primary"><i class="fas fa-plus"></i> اضافة </a>
                </div>
                @endif
                <div class="card-body">
                <table id="example1" class="table datatable table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>الاسم</th>
                        @if($type=='user')
                            <th>النادي</th>
                            @endif
                        <th>البريد الالكتروني</th>
                        <th>الهاتف</th>
                        <th>التحكم</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($rows as $row)
                        <tr>
                            <td>{{$row['name']??''}}</td>
                            @if($type=='user')
                                <td>{{$row['stedium']['name']??''}}</td>
                            @endif
                            <td>{{$row['email']??''}}</td>
                            <td>{{$row['phone']??''}}</td>
                            <td>
                                @include('include.buttons')

                            </td>
                        </tr>

                        @endforeach
                    </tbody>

                </table>
                </div>
            </div>
        </section>

    </div>
@endsection

