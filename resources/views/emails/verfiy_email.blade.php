<!DOCTYPE html>
<html lang="ar" >
<head>
    <meta charset="utf-8">
    <title>تاكيد الحساب</title>
</head>
<body>
<img src="{{getfile($settings['logo'])}}" width="100px">
<h1 style="text-align: center">مرحبا {{$user['name']}} في {{$settings['name']}}</h1>
<h2 style="text-align: center">تفعيل الحساب</h2>
<p style="display: block; text-align: center">اضغط علي الزرار لفتعيل الحساب</p>
<p  style="display: block; text-align: center">اذا لم تكن انت لا تضغط</p>
<div style="text-align: center">
<a  href="{{route('verify_email',['id'=>encrypt($user['id']),'token'=>$user['remember_token']])}}"
    style="display: inline-block; text-align: center;padding: 10px;background: #09096b;color: #fff;margin: auto" >اضغط هنا</a>
</div>
{{----}}
</body>
</html>
