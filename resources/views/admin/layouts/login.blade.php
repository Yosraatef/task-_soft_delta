<!DOCTYPE html>
<?php

$lang = App::getLocale();
$dir = '';
$arrow = 'right';
$pull = 'pull-left';
if ($lang == 'ar') {
    $dir = 'rtl';
    $arrow = 'left';
    $pull = 'pull-right';
}
//$site = App\Models\Site::first();
?>

<html lang="{{ $lang }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ url('admin_panel/images/logo/logo.png') }}">
    <meta property="og:site_name" content="{{ url('/') }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:image" content="../og.png">

    <title>{{isset($settings) ? $settings->title : ''}} - {{__('Dashboard')}}</title>

    <!-- Bootstrap 4.0-->
    <link rel="stylesheet"
        href="{{ URL::to('admin_panel') }}/assets/vendor_components/bootstrap/dist/css/bootstrap.min.css">

    <!-- Bootstrap 4.0-->
    <link rel="stylesheet"
        href="{{ URL::to('admin_panel') }}/assets/vendor_components/bootstrap/dist/css/bootstrap-extend.css">

    <!-- Font Awesome -->
    <link rel="stylesheet"
        href="{{ URL::to('admin_panel') }}/assets/vendor_components/font-awesome/css/font-awesome.min.css">

    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ URL::to('admin_panel') }}/assets/vendor_components/Ionicons/css/ionicons.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ URL::to('admin_panel') }}/css/{{ $lang }}/master_style.css">

    <!-- bonitoadmin Skins. Choose a skin from the css/skins
           folder instead of downloading all of them to reduce the load. -->
    @if(app()->getLocale() == 'ar')
        <link rel="stylesheet" href="{{URL::to('admin_panel')}}/css/ar/skins/_all-skins.css">
    @else
        <link rel="stylesheet" href="{{URL::to('admin_panel')}}/css/en/skins/_all-skins.css">
    @endif

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <style>
        html {
            position: relative;
        }

        .login-back img {
            position: absolute;
            z-index: -10;
            width: 100%;
            height: 100%;
            top: 0px;
            left: 0px;
            opacity: 0.8;
        }

        .login-page {
            background-image: unset;
            background-color: #000;
        }

    </style>
</head>

<body class="hold-transition login-page">
    <div class="login-back" style="background-color: #fff">
        <img src="{{ url('admin_panel/images/header img.png') }}" alt="" width="100%" height="100%">
    </div>
    <div class="login-box" dir="{{ $dir }}">

        <div class="login-logo">
            <a href="{{ URL::to('/') }}" title="{{ isset($settings) ? $settings->title : ''}}">
                <img width="100%" src="{{ url('admin_panel/images/logo/logo.png') }}"
                    alt="{{ isset($settings) ? $settings->title : ''}}" style="height: 220px;">
            </a>
        </div>

        @yield('content')
    </div>
    <!-- /.login-box -->


    <!-- jQuery 3 -->
    <script src="{{ URL::to('admin_panel') }}/assets/vendor_components/jquery/dist/jquery.min.js"></script>

    <!-- popper -->
    <script src="{{ URL::to('admin_panel') }}/assets/vendor_components/popper/dist/popper.min.js"></script>

    <!-- Bootstrap 4.0-->
    <script src="{{ URL::to('admin_panel') }}/assets/vendor_components/bootstrap/dist/js/bootstrap.min.js"></script>

</body>

</html>
