
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
            <p class="login-box-msg">انشاء كلمة سر جديدة وقوية </p>
            <form action="{{route('new_password')}}" method="post">
                @csrf
                <input required class="form-control" value="{{$user['email']}}" name="email" type="hidden" >
                <div class="input-group mb-3">
                    <input type="password" class="form-control hidden" name="password" placeholder="كلمة السر">
                    <div class="input-group-append pointer-event" onclick="show_password($(this))">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">تغير كلمة السر</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>


        </div>
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
