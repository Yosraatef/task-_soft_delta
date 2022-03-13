<!doctype html>
<html lang="{{app()->getLocale()}}">
<?php
$setting = \App\Models\Setting::first();
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$setting->getTranslation('title',app()->getLocale()) ?? ''}}</title>
    <link rel="icon" type="image/png" href="{{asset('admin_panel/images/logo/logo.png')}}" sizes="16x16">
    <link href="{{asset('front/css/simple-lightbox.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('front/css/animate.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('front/css/hover.css')}}" rel="stylesheet">
    <link href="{{asset('front/css/slick.css')}}" rel="stylesheet">
    <link href="{{asset('front/css/slick-theme.css')}}" rel="stylesheet">
    <link href="{{asset('front/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('front/css/main.css')}}" rel="stylesheet">
    @if(app()->getLocale() == 'en')
        <link href="{{asset('front/css/style-en.css')}}" rel="stylesheet">
    @else
        <link href="{{asset('front/css/style-ar.css')}}" rel="stylesheet">
    @endif
    <link href="{{asset('front/js/sweetalert/sweetalert.css')}}" rel="stylesheet">
    <script src="https://use.fontawesome.com/d10920a460.js"></script>
    <style>
        .error_sms {
            color: #cc1616;
            background-color: #dc35451a;
            font-size: 0.8rem;
            padding: 3px 9px;
            border-radius: 3px;
            width: 100%;
            display: none;
        }

        .contact__form .form_group {
            display: block;
        }

        .contact__form .form_group .form__icon {
            top: 22px;
        }
        .upload__icon {
            top: 2px;
        }
        .news__card .news_des{
            -webkit-line-clamp: 4
        }
    </style>
</head>

<body>

<!--loader-->
<div class="loader-container" id="loader-container">
    <div class="loader">
        <div class="loader-ring">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
</div>

<!--start header-->
@include('front.layouts.header')
<!--end header-->




@yield('content')


<!--Start footer -->
@include('front.layouts.footer')

<a href="#" class="go-top" data-toggle="tooltip" title="" data-placement="left" data-original-title="go to top">
    <i class="fa fa-arrow-up"></i>
</a>


<script src="{{asset('front/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('front/js/slick.js')}}"></script>
<script src="{{asset('front/js/simple-lightbox.min.js')}}" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
<script src="{{asset('front/js/bootstrap.min.js')}}"></script>
<script src="{{asset('front/js/main.js')}}"></script>
<script src="{{asset('front/js/wow.min.js')}}"></script>
<script src="{{asset('front/js/sweetalert/sweetalert.min.js')}}"></script>
<script>
    new WOW().init();
</script>
<script>

    @if( session()->get('success'))
    swal({
        title: '{{__('THANKS')}}',
        text: '{{session('success')}}',
        type: "success",
        showConfirmButton: true,
    });
    @elseif(session()->get('fail'))
    swal({
        title: '{{__('Failed!')}}',
        text: '{{session('fail')}}',
        type: "error",
        showConfirmButton: false,
        timer: 4000
    });
    @endif
</script>

<script>
    window.laravelUrl = "{{url('/')}}";
</script>
@stack('scripts')
</body>

</html>

