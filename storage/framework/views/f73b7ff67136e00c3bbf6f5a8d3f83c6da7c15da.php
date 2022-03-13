<?php

$lang = App::getLocale();
$text = "text-left";
$pull = "pull-left";
if ($lang == "ar") {
    $text = "text-right";
    $pull = "pull-right";
}
?>
<header class="main-header" dir="<?php echo e($dir); ?>">
    <!-- Logo -->
    <a href="<?php echo e(URL::to('admin')); ?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>T</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b><?php echo e(isset($settings) ? $settings->title : ''); ?></b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?php echo e(URL::to('admin_panel')); ?>/images/avatarr.png" class="user-image rounded" alt="User Image">
                    </a>
                    <ul class="dropdown-menu scale-up">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?php echo e(URL::to('admin_panel')); ?>/images/avatarr.png" class="rounded float-right" alt="User Image">

                            <p>
                               <?php echo e(Auth::User()->name  ?? 'Admin'); ?>

                                <small><?php echo e(Auth::User()->roles()->first()->name ?? ''); ?></small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-right">
                                <a href="#" class="btn btn-block btn-primary"><?php echo e(trans('admin.website')); ?></a>
                            </div>
                            <div class="pull-left">
                                <a href="<?php echo e(URL::to('admin/logout')); ?>" class="btn btn-block btn-danger"><?php echo e(trans('admin.logout')); ?></a>
                            </div>
                        </li>
                    </ul>
                </li>

               
                <!-- Control Sidebar Toggle Button -->
                <li>
                    <a href="#" data-toggle="control-sidebar"></a>
                </li>
            </ul>
        </div>
    </nav>
</header>
<?php /**PATH C:\Users\Yosra\Documents\GitHub\taskk\resources\views/admin/layouts/include/header.blade.php ENDPATH**/ ?>