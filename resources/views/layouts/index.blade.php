<!DOCTYPE html>
<html>
@include('layouts.style')
<body class="skin-blue sidebar-mini">

<div class="wrapper">
    @include('layouts.header')
    @include('layouts.sidebar')
    @yield('content')


</div>
@include('layouts.footer_style')
@yield('js');
</body>
</html>
