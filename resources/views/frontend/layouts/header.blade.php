<head>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <title>{{$settings['name']}} | {{$title??''}}</title>
    <!-- Meta tag Keywords -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <link rel="shortcut icon" href="{{getfile($row['image']??$settings['icon'])}}" type="image/x-icon">
    <meta property="og:title" content="{{$settings['name']}}| {{$title??''}}" />
    <meta property="og:image" content="{{getfile($row['image']??$settings['icon'])}}" />
    <meta name="description" content= "{{$description??$settings['short_description']}}">
    <meta name="keywords" content="
@foreach($settings['keywords'] as $key=> $keywords)
    @if($key>0) , @endif {{$keywords['tag']}}
    @endforeach
        ,
        {{$tages??''}}

        " />

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Barlow&amp;family=Barlow+Condensed&amp;family=Gilda+Display&amp;display=swap">
    <link rel="stylesheet" href="{{my_asset('frontend/')}}/css/plugins.css" />
    <link rel="stylesheet" href="{{my_asset('frontend/')}}/css/style.css" />
</head>
