<!DOCTYPE html>
<html>
<head>
    <title>اعادة تعين كلمة السر</title>
</head>
<body>


<h1 style="text-align: center">مرحبا {{$user['name']}} في {{$settings['name']}}</h1>
<h2 style="text-align: center">اعادة تعين كلمة السر في {{$settings['name']}}</h2>
<p style="display: block; text-align: center">اذا كنت من يحول اعادة تغير كلمة السر اضغط علي الرز</p>
<p  style="display: block; text-align: center">واذا لم تكن فلا تضغط</p>
<div style="text-align: center">
    <a  href="{{route('rest_password',['id'=>encrypt($user['id']),'token'=>$user['remember_token']])}}"
        style="display: inline-block; text-align: center;padding: 10px;background: #09096b;color: #fff;margin: auto" >click Hare</a>
</div>
{{----}}
</body>
</html>
