<!DOCTYPE html>
<?php

$lang = App::getLocale();
$dir = "";
$arrow = "right";
$pull = "pull-left";
if ($lang == "ar") {
    $dir = "rtl";
    $arrow = "left";
    $pull = "pull-right";
}
//$site = App\Models\Site::first();
?>
<html lang="{{$lang}}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" href="{{asset('admin_panel/images/logo/logo.png')}}" sizes="16x16">
    <link rel="manifest" href="{{URL::to('favicon')}}/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{URL::to('favicon')}}/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <meta property="og:site_name" content="{{url('/')}}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{url('/')}}">
    <meta property="og:image" content="../og.png">
    <title>{{isset($settings) ? $settings->title : ''}} - {{__('Dashboard')}}</title>
<!-- Bootstrap 4.0-->
    <link rel="stylesheet"
          href="{{URL::to('admin_panel')}}/assets/vendor_components/bootstrap/dist/css/bootstrap.min.css">

    <!-- Bootstrap 4.0-->
    <link rel="stylesheet"
          href="{{URL::to('admin_panel')}}/assets/vendor_components/bootstrap/dist/css/bootstrap-extend.css">

    <!-- Font Awesome -->
    <link rel="stylesheet"
          href="{{URL::to('admin_panel')}}/assets/vendor_components/font-awesome/css/font-awesome.min.css">

    <!-- Ionicons -->
    <link rel="stylesheet" href="{{URL::to('admin_panel')}}/assets/vendor_components/Ionicons/css/ionicons.min.css">

    <!-- bootstrap datepicker -->
    <link rel="stylesheet"
          href="{{URL::to('admin_panel')}}/assets/vendor_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

    <!-- Bootstrap time Picker -->
    <link rel="stylesheet"
          href="{{URL::to('admin_panel')}}/assets/vendor_plugins/timepicker/bootstrap-timepicker.min.css">

    <!-- Select2 -->
    <link rel="stylesheet" href="{{URL::to('admin_panel')}}/assets/vendor_components/select2/dist/css/select2.min.css">

    <!-- lightbox library -->
    <link rel="stylesheet" href="{{URL::to('admin_panel')}}/assets/vendor_components/lightbox2/css/lity.css">
    {{--    <link rel="stylesheet" href="{{URL::to('admin_panel')}}/assets/vendor_components/lightbox2/css/lightbox.min.css">--}}

<!-- Theme style -->
    <link rel="stylesheet" href="{{URL::to('admin_panel')}}/css/{{$lang}}/master_style.css">

    <!-- bonitoadmin Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    @if(app()->getLocale() == 'ar')
        <link rel="stylesheet" href="{{URL::to('admin_panel')}}/css/ar/skins/_all-skins.css">
    @else
        <link rel="stylesheet" href="{{URL::to('admin_panel')}}/css/en/skins/_all-skins.css">
    @endif
@yield('styles')

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    @include('admin.layouts.include.header')

    @include('admin.layouts.include.sidebar')

    <div class="content-wrapper" dir="{{$dir}}">
        @yield('content')
    </div>
    <!-- /.content-wrapper -->

    @include('admin.layouts.include.footer')

    <input type="hidden" value="{{URL::to('/')}}" id="base-url">
</div>
<!-- jQuery 3 -->
<script src="{{URL::to('admin_panel')}}/assets/vendor_components/jquery/dist/jquery.js"></script>
<script src="{{url('admin_panel')}}/js/notify.js"></script>
<script src="{{url('admin_panel')}}/js/ion.sound.js"></script>
<script>
    $('.user-menu').click(function () {
        if ($(this).hasClass('show')) {
            $(this).removeClass('show');
        } else {
            $(this).addClass('show');
        }
    });
</script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!-- popper -->
<script src="{{URL::to('admin_panel')}}/assets/vendor_components/popper/dist/popper.min.js"></script>

<!-- Bootstrap 4.0-->
<script src="{{URL::to('admin_panel')}}/assets/vendor_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Select2 -->
<script src="{{URL::to('admin_panel')}}/assets/vendor_components/select2/dist/js/select2.full.js"></script>

<!-- SlimScroll -->
<script src="{{URL::to('admin_panel')}}/assets/vendor_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>

<!-- FastClick -->
<script src="{{URL::to('admin_panel')}}/assets/vendor_components/fastclick/lib/fastclick.js"></script>

<!-- bonitoadmin App -->
<script src="{{URL::to('admin_panel')}}/js/template.js"></script>

<!-- bonitoadmin for demo purposes -->
<script src="{{URL::to('admin_panel')}}/js/demo.js"></script>

<!-- bootstrap datepicker -->
<script
    src="{{URL::to('admin_panel')}}/assets/vendor_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<!-- bootstrap time picker -->
<script src="{{URL::to('admin_panel')}}/assets/vendor_plugins/timepicker/bootstrap-timepicker.min.js"></script>

<script src="{{URL::to('admin_panel')}}/assets/vendor_components/ckeditor/ckeditor.js"></script>

<!-- lightbox library -->
<script src="{{URL::to('admin_panel')}}/assets/vendor_components/lightbox2/js/lity.js"></script>
{{--<script src="{{URL::to('admin_panel')}}/assets/vendor_components/lightbox2/js/lightbox.min.js"></script>--}}

<!-- Bootstrap WYSIHTML5 -->
<script src="{{URL::to('admin_panel')}}/assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js"></script>

<!-- bonitoadmin for editor -->
<script src="{{URL::to('admin_panel')}}/js/pages/editor.js"></script>

@yield('scripts')
<script>
    window.laravelUrl = "{{url('/')}}";
</script>
<script>
    function submitForm(btn) {
        // disable the button
        btn.disabled = true;
        // submit the form
        btn.form.submit();
    }
</script>
<script>
    $('#spark').hide();
    $('.select2').select2();
</script>
</body>
</html>

