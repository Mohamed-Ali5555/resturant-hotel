<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$settings['name']}} | اعادة تعين كلمة السر</title>
    <link rel="icon"href="{{getfile($settings['icon'])}}">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{my_asset('admin')}}/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{my_asset('admin')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link href='https://fonts.googleapis.com/css?family=Cairo' rel='stylesheet'>
    <link rel="stylesheet" href="{{my_asset('admin')}}/dist/css/adminlte.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="card card-outline ">
        <div class="card-header text-center">
            <img class="rounded-circle" width="100px" src="{{getfile($settings['logo'])}}">
        </div>
        <div class="card-body">
            @if(session()->has('error'))
                <div class="alert alert-danger">{{session()->get('error')}}</div>
            @elseif(session()->has('success'))
                <div class="alert alert-success">{{session()->get('success')}}</div>
                @endif
            <p class="login-box-msg">يمكن اعادة كلمة السر </p>
            <form action="{{route('send_rest_password')}}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="email" name="email" value="{{old('email')}}" class="form-control" placeholder="ادخل البريد الالكتروني ">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">اعادة تعين كلمة السر</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            <p class="mt-3 mb-1">
                <a href="{{route('admin.login')}}">العودة لتسجيل الدخول</a>
            </p>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{my_asset('admin')}}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{my_asset('admin')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{my_asset('admin')}}/dist/js/adminlte.min.js"></script>
</body>
</html>
