<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>تسجيل الدخول |{{$settings['name']??''}}</title>
    <link rel="icon"href="{{getfile($settings['icon']??0)}}">

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
<body class="hold-transition login-page" style="background-image: url('{{getfile($settings['admin_image']??0)}}')">
<div class="login-box">
    <div class="login-logo">
        <a href="/">
            <img class="rounded-circle" src="{{getfile($settings['logo']??0)}}" height="100px" width="100px">
            <br>
            <b>{{$settings['name']??''}}</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">تسجيل الدخول</p>

            <form action="{{route('admin.auth')}}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control" placeholder="البريد الالكتروني">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control hidden" name="password" placeholder="الرمز السري">
                    <div class="input-group-append" onclick="show_password($(this))">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">

                    <!-- /.col -->
                    <div class="col">
                        <button type="submit" class="btn btn-primary btn-block">تسجيل الدخول</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>


            <p class="mb-1">
                <a href="{{route('verify_email')}}">نسيت كلمة المرور</a>
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
<script>

    function show_password(element){
        $(element).siblings('input').toggleClass('hidden')
        $(element).find('.fas').toggleClass('fa-lock')
        $(element).find('.fas').toggleClass('fa-lock-open')
        if($(element).siblings('input').hasClass('hidden')){
            $(element).siblings('input') .attr('type','password')
        }else{
            $(element).siblings('input') .attr('type','text')
        }


    }

</script>
</body>
</html>
