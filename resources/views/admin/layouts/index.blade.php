<!DOCTYPE html>
<?php
    $settings = \App\Models\Setting::find(1);
$lang = App::getLocale();
$dir = "";
$arrow = "right";
$pull = "pull-left";
$datatable = "example";
if ($lang == "ar") {
    $dir = "rtl";
    $arrow = "left";
    $pull = "pull-right";
    $datatable = "example_ar";
}
$site = App\Models\Site::first();
?>
<html lang="{{$lang}}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" type="image/png" href="{{asset('admin_panel/images/logo/logo.png')}}" sizes="16x16">
 <!-- CSRF Token -->
 <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="manifest" href="{{URL::to('favicon')}}/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="{{URL::to('favicon')}}/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">

        <meta property="og:title" content="{{$site[$lang.'_title'] ?? ''}}">
        <meta property="og:description" content="{{$site[$lang.'_desc'] ?? ''}}">
        <meta property="og:site_name" content="{{url('/')}}">
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{url('/')}}">
        <meta property="og:image" content="../og.png">

        <title>{{isset($settings) ? $settings->title : ''}} - {{__('Dashboard')}}</title>

        <!-- bootstrap             4.0 -->
        <link rel="stylesheet" href="{{URL::to('admin_panel')}}/assets/vendor_components/bootstrap/dist/css/bootstrap.css">

        <!-- Bootstrap 4.0-->
        <link rel="stylesheet" href="{{URL::to('admin_panel')}}/assets/vendor_components/bootstrap/dist/css/bootstrap-extend.css">

        <!-- font awesome -->
        <link rel="stylesheet" href="{{URL::to('admin_panel')}}/assets/vendor_components/font-awesome/css/font-awesome.css">

        <!-- ionicons -->
        <link rel="stylesheet" href="{{URL::to('admin_panel')}}/assets/vendor_components/Ionicons/css/ionicons.css">

        <!-- theme style -->
        <link rel="stylesheet" href="{{URL::to('admin_panel')}}/css/{{$lang}}/master_style.css">

        <!-- mpt_admin skins. choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
        @if(app()->getLocale() == 'ar')
            <link rel="stylesheet" href="{{URL::to('admin_panel')}}/css/ar/skins/_all-skins.css">
        @else
            <link rel="stylesheet" href="{{URL::to('admin_panel')}}/css/en/skins/_all-skins.css">
        @endif

        <!-- morris chart -->
        <link rel="stylesheet" href="{{URL::to('admin_panel')}}/assets/vendor_components/morris.js/morris.css">

        <!-- jvectormap -->
        <link rel="stylesheet" href="{{URL::to('admin_panel')}}/assets/vendor_components/jvectormap/jquery-jvectormap.css">

        <!-- date picker -->
        <link rel="stylesheet" href="{{URL::to('admin_panel')}}/assets/vendor_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.css">

        <!-- daterange picker -->
        <link rel="stylesheet" href="{{URL::to('admin_panel')}}/assets/vendor_components/bootstrap-daterangepicker/daterangepicker.css">

        <!-- bootstrap wysihtml5 - text editor -->
        <link rel="stylesheet" href="{{URL::to('admin_panel')}}/assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.css">

        <!-- weather weather -->
        <link rel="stylesheet" href="{{URL::to('admin_panel')}}/assets/vendor_components/weather-icons/weather-icons.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- google font -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

        @yield('styles')
    </head>

    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">

            @include('admin.layouts.include.header')

            @include('admin.layouts.include.sidebar')

            <div class="content-wrapper" dir="{{$dir}}">
                @yield('content')
            </div>

            @include('admin.layouts.include.footer')


        </div>

        <!-- jQuery 3 -->
        <script src="{{URL::to('admin_panel')}}/assets/vendor_components/jquery/dist/jquery.js"></script>
        <script src="{{url('admin_panel')}}/js/notify.js"></script>
        <script src="{{url('admin_panel')}}/js/ion.sound.js"></script>

        <!-- jQuery UI 1.11.4 -->
        <script src="{{URL::to('admin_panel')}}/assets/vendor_components/jquery-ui/jquery-ui.js"></script>

        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
$.widget.bridge('uibutton', $.ui.button);
        </script>

        <!-- popper -->
        <script src="{{URL::to('admin_panel')}}/assets/vendor_components/bootstrap/assets/js/vendor/popper.min.js"></script>

        <!-- Bootstrap 4.0 -->
        <script src="{{URL::to('admin_panel')}}/assets/vendor_components/bootstrap/dist/js/bootstrap.js"></script>

        <!-- FLOT CHARTS -->
        <script src="{{URL::to('admin_panel')}}/assets/vendor_components/Flot/jquery.flot.js"></script>

        <!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
        <script src="{{URL::to('admin_panel')}}/assets/vendor_components/Flot/jquery.flot.resize.js"></script>

        <!-- FLOT PIE PLUGIN - also used to draw donut charts -->
        <script src="{{URL::to('admin_panel')}}/assets/vendor_components/Flot/jquery.flot.pie.js"></script>

        <!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
        <script src="{{URL::to('admin_panel')}}/assets/vendor_components/Flot/jquery.flot.categories.js"></script>

        <!-- Sparkline -->
        <script src="{{URL::to('admin_panel')}}/assets/vendor_components/jquery-sparkline/dist/jquery.sparkline.js"></script>

        <!-- jvectormap -->
        <script src="{{URL::to('admin_panel')}}/assets/vendor_plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="{{URL::to('admin_panel')}}/assets/vendor_plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

        <!-- jQuery Knob Chart -->
        <script src="{{URL::to('admin_panel')}}/assets/vendor_components/jquery-knob/js/jquery.knob.js"></script>

        <!-- daterangepicker -->
        <script src="{{URL::to('admin_panel')}}/assets/vendor_components/moment/min/moment.min.js"></script>
        <script src="{{URL::to('admin_panel')}}/assets/vendor_components/bootstrap-daterangepicker/daterangepicker.js"></script>

        <!-- datepicker -->
        <script src="{{URL::to('admin_panel')}}/assets/vendor_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.js"></script>

        <!-- Bootstrap WYSIHTML5 -->
        <script src="{{URL::to('admin_panel')}}/assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js"></script>

        <!-- Slimscroll -->
        <script src="{{URL::to('admin_panel')}}/assets/vendor_components/jquery-slimscroll/jquery.slimscroll.js"></script>

        <!-- FastClick -->
        <script src="{{URL::to('admin_panel')}}/assets/vendor_components/fastclick/lib/fastclick.js"></script>

        <!-- ChartJS -->
        <script src="{{URL::to('admin_panel')}}/assets/vendor_components/chart-js/chart.js"></script>

        <!-- mpt_admin App -->
        <script src="{{URL::to('admin_panel')}}/js/template.js"></script>

        <!-- mpt_admin dashboard demo (This is only for demo purposes) -->
        <script src="{{URL::to('admin_panel')}}/js/pages/dashboard.js"></script>

        <!-- mpt_admin for demo purposes -->
        <script src="{{URL::to('admin_panel')}}/js/demo.js"></script>

        <!-- weather for demo purposes -->
        <script src="{{URL::to('admin_panel')}}/assets/vendor_plugins/weather-icons/WeatherIcon.js"></script>



        @yield('scripts')

    

    </body>
</html>
