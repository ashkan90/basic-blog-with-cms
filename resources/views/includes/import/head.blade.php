<head>
    <meta charset="utf-8">
    <title>{{$site->title}}  @if(!Route('index')) -{{ $post->title }} @endif</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ $site->description }}">
    <meta name="keywords" content="{{ $site->keywords }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="">
    <meta property="og:description" content="">
    
    <!-- FAVICON -->
    <link rel="icon" type="image/x-icon" href="{{asset('assets/uploads/site/icon.png')}}"/>

    <!-- CSS & JS Library -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <script src="{{asset('assets/js/jquery-1.11.1.js')}}"></script>
    
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Courgette' rel='stylesheet' type='text/css'>
</head>