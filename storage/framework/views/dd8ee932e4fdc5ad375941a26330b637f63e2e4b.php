<!DOCTYPE html>
<?php

$lang = App::getLocale();
$dir = '';
$arrow = 'right';
$pull = 'pull-left';
$datatable = 'example';
if ($lang == 'ar') {
    $dir = 'rtl';
    $arrow = 'left';
    $pull = 'pull-right';
    $datatable = 'example_ar';
}
?>
<html lang="<?php echo e($lang); ?>">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" href="<?php echo e(asset('admin_panel/images/logo/logo.png')); ?>" sizes="16x16">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="manifest" href="<?php echo e(URL::to('favicon')); ?>/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php echo e(URL::to('favicon')); ?>/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <meta property="og:site_name" content="<?php echo e(url('/')); ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo e(url('/')); ?>">
    <meta property="og:image" content="../og.png">
    <title><?php echo e(isset($settings) ? $settings->title : ''); ?> - <?php echo e(__('Dashboard')); ?></title>


    <!-- Bootstrap 4.0-->
    <link rel="stylesheet"
        href="<?php echo e(URL::to('admin_panel')); ?>/assets/vendor_components/bootstrap/dist/css/bootstrap.min.css">

    <!-- Bootstrap 4.0-->
    <link rel="stylesheet"
        href="<?php echo e(URL::to('admin_panel')); ?>/assets/vendor_components/bootstrap/dist/css/bootstrap-extend.css">

    <!-- Font Awesome -->
    <link rel="stylesheet"
        href="<?php echo e(URL::to('admin_panel')); ?>/assets/vendor_components/font-awesome/css/font-awesome.min.css">

    <!-- Ionicons -->
    <link rel="stylesheet"
        href="<?php echo e(URL::to('admin_panel')); ?>/assets/vendor_components/Ionicons/css/ionicons.min.css">

    <!-- bootstrap datepicker -->
    <link rel="stylesheet"
        href="<?php echo e(URL::to('admin_panel')); ?>/assets/vendor_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

    <!-- Select2 -->
    <link rel="stylesheet"
        href="<?php echo e(URL::to('admin_panel')); ?>/assets/vendor_components/select2/dist/css/select2.min.css">

    <!-- lightbox library -->
    <link rel="stylesheet" href="<?php echo e(URL::to('admin_panel')); ?>/assets/vendor_components/lightbox2/css/lity.min.css">
    

    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo e(URL::to('admin_panel')); ?>/css/<?php echo e($lang); ?>/master_style.css">

    <!-- bonitoadmin Skins. Choose a skin from the css/skins
           folder instead of downloading all of them to reduce the load. -->
    <?php if(app()->getLocale() == 'ar'): ?>
        <link rel="stylesheet" href="<?php echo e(URL::to('admin_panel')); ?>/css/ar/skins/_all-skins.css">
    <?php else: ?>
        <link rel="stylesheet" href="<?php echo e(URL::to('admin_panel')); ?>/css/en/skins/_all-skins.css">
    <?php endif; ?>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

    <style>
        .box-body {
            width: 100%;
            overflow-x: scroll;
        }

        .content .small-box h3 {
            font-size: 20px !important;
        }

    </style>

</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <?php echo $__env->make('admin.layouts.include.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->make('admin.layouts.include.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="content-wrapper" dir="<?php echo e($dir); ?>">
            <?php echo $__env->yieldContent('content'); ?>
        </div>

        <?php echo $__env->make('admin.layouts.include.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <input type="hidden" value="<?php echo e(URL::to('/')); ?>" id="base-url">
    </div>
    <!-- ./wrapper -->
    <input type="hidden" class="datatable-print" value="<?php echo e(__('Print')); ?>">
    <input type="hidden" class="datatable-copy" value="<?php echo e(__('Copy')); ?>">
    <input type="hidden" class="datatable-excel" value="<?php echo e(__('Export')); ?>">
    <input type="hidden" class="datatable-search" value="<?php echo e(__('Search')); ?>">
    <input type="hidden" class="next-page" value="<?php echo e(__('Next')); ?>">
    <input type="hidden" class="prev-page" value="<?php echo e(__('Previous')); ?>">
    <!-- jQuery 3 -->
    <script src="<?php echo e(URL::to('admin_panel')); ?>/assets/vendor_components/jquery/dist/jquery.js"></script>
    <script src="<?php echo e(url('admin_panel')); ?>/js/notify.js"></script>
    <script src="<?php echo e(url('admin_panel')); ?>/js/ion.sound.js"></script>

    <!-- popper -->
    <script src="<?php echo e(URL::to('admin_panel')); ?>/assets/vendor_components/popper/dist/popper.min.js"></script>

    <!-- Bootstrap 4.0-->
    <script src="<?php echo e(URL::to('admin_panel')); ?>/assets/vendor_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Select2 -->
    <script src="<?php echo e(URL::to('admin_panel')); ?>/assets/vendor_components/select2/dist/js/select2.full.js"></script>

    <!-- DataTables -->
    <script src="<?php echo e(URL::to('admin_panel')); ?>/assets/vendor_components/datatables.net/js/jquery.dataTables.min.js">
    </script>
    <script src="<?php echo e(URL::to('admin_panel')); ?>/assets/vendor_components/datatables.net-bs/js/dataTables.bootstrap.min.js">
    </script>

    <!-- SlimScroll -->
    <script src="<?php echo e(URL::to('admin_panel')); ?>/assets/vendor_components/jquery-slimscroll/jquery.slimscroll.min.js">
    </script>

    <!-- FastClick -->
    <script src="<?php echo e(URL::to('admin_panel')); ?>/assets/vendor_components/fastclick/lib/fastclick.js"></script>

    <!-- bonitoadmin App -->
    <script src="<?php echo e(URL::to('admin_panel')); ?>/js/template.js"></script>

    

    <!-- This is data table -->
    <script
        src="<?php echo e(URL::to('admin_panel')); ?>/assets/vendor_plugins/DataTables-1.10.15/media/js/jquery.dataTables.min.js">
    </script>

    <!-- bootstrap datepicker -->
    <script
        src="<?php echo e(URL::to('admin_panel')); ?>/assets/vendor_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js">
    </script>

    <!-- lightbox library -->
    <script src="<?php echo e(URL::to('admin_panel')); ?>/assets/vendor_components/lightbox2/js/lity.min.js"></script>
    

    <!-- start - This is for export functionality only -->
    <script
        src="<?php echo e(URL::to('admin_panel')); ?>/assets/vendor_plugins/DataTables-1.10.15/extensions/Buttons/js/dataTables.buttons.min.js">
    </script>
    <script
        src="<?php echo e(URL::to('admin_panel')); ?>/assets/vendor_plugins/DataTables-1.10.15/extensions/Buttons/js/buttons.flash.min.js">
    </script>
    <script src="<?php echo e(URL::to('admin_panel')); ?>/assets/vendor_plugins/DataTables-1.10.15/ex-js/jszip.min.js"></script>
    <script src="<?php echo e(URL::to('admin_panel')); ?>/assets/vendor_plugins/DataTables-1.10.15/ex-js/pdfmake.min.js"></script>
    <script src="<?php echo e(URL::to('admin_panel')); ?>/assets/vendor_plugins/DataTables-1.10.15/ex-js/vfs_fonts.js"></script>
    <script
        src="<?php echo e(URL::to('admin_panel')); ?>/assets/vendor_plugins/DataTables-1.10.15/extensions/Buttons/js/buttons.html5.min.js">
    </script>
    <script
        src="<?php echo e(URL::to('admin_panel')); ?>/assets/vendor_plugins/DataTables-1.10.15/extensions/Buttons/js/buttons.print.min.js">
    </script>
    <!-- end - This is for export functionality only -->

    <!-- bonitoadmin for Data Table -->
    <script src="<?php echo e(URL::to('admin_panel')); ?>/js/pages/data-table.js"></script>
    <script src="<?php echo e(URL::to('admin_panel')); ?>/assets/vendor_components/jquery-ui/jquery-ui.js"></script>

    <?php echo $__env->yieldContent('scripts'); ?>
    <script>
        $('.user-menu').click(function() {
            if ($(this).hasClass('show')) {
                $(this).removeClass('show');
            } else {
                $(this).addClass('show');
            }
        });
    </script>
    <script>
        $('#spark').hide();
        $("body").on("change", ".switch_active", function(e) {
            var id = $(this).attr('id');
            var page = $(this).attr('page');
            var base_url = $('#base-url').val();
            $('#active_response').html('');
            $.ajax({
                type: "GET",
                url: base_url + "/admin/edit_active/" + page + "/" + id,
                success: function(data) {
                    if (data.status == 1) {
                        $('#active_response').html(
                            '<div class="alert alert-success alert-dismissible">' + data.message +
                            '</div>')
                    } else {
                        $('#active_response').html(
                            '<div class="alert alert-danger alert-dismissible">' + data.message +
                            '</div>')
                    }
                }
            });
        });
    </script>

</body>

</html>
<?php /**PATH C:\Users\Yosra\Documents\GitHub\taskk\resources\views/admin/layouts/table.blade.php ENDPATH**/ ?>