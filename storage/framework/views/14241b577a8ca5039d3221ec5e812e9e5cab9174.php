<?php

use Illuminate\Support\Facades\Auth;

$lang = App::getLocale();
$float = 'right';
if ($lang == 'en') {
    $float = 'left';
}
?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar" dir="<?php echo e($dir); ?>">
        <!-- Sidebar user panel -->
        <div class="user-panel"
             style="background-image:url('<?php echo e(url('front/img/about.png')); ?>'); background-size: 100% 100%; padding-top: 120px; height: 170px;">

            <div class="clearfix"></div>
        </div>


        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree" style="padding-bottom: 50px;">

            <li class="___class_+?5___">
                <a href="<?php echo e(URL::to('lang')); ?>">
                    <i class="fa fa-language"></i>
                    <?php if($lang == 'ar'): ?>
                        <span>English Version</span>
                    <?php else: ?>
                        <span>النسخة العربية</span>
                    <?php endif; ?>
                </a>
            </li>
            <?php $__currentLoopData = sidebar(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($key == 'spliter'): ?>
                    <hr style="background: #fff;">
                <?php else: ?>
                    <?php if(isset($row['childs']) &&  isset($row['role'])): ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check($row['role'])): ?>
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa <?php echo e($row['icon']); ?>"></i>
                                    <span><?php echo e($row['title']); ?></span>
                                    <span class="pull-<?php echo e($arrow); ?>-container">
                                        <i class="fa fa-angle-<?php echo e($arrow); ?> pull-<?php echo e($arrow); ?>"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <?php $__currentLoopData = $row['childs']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li>
                                            <a href="<?php echo e($child['url']); ?>">
                                                <i class="fa fa-circle-o"></i>
                                                <?php echo e($child['title']); ?></a>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </li>
                        <?php endif; ?>
                    <?php else: ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check($row['role'])): ?>
                            <li class="___class_+?13___">
                                <a href="<?php echo e($row['url']); ?>">
                                    <i class="fa <?php echo e($row['icon']); ?>"></i>
                                    <span><?php echo e($row['title']); ?></span>
                                </a>
                            </li>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <hr style="background: #fff;">
            <li class="___class_+?15___">
                <a href="<?php echo e(URL::to('admin/logout')); ?>">
                    <i class="fa fa-sign-out"></i>
                    <span><?php echo e(trans('admin.logout')); ?></span>
                </a>
            </li>
        </ul>
    </section>

    <!-- /.sidebar -->
    <div class="sidebar-footer">
        <!-- item-->
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show_settings')): ?>
            <a href="<?php echo e(URL::to('admin/settings/1/edit')); ?>" class="link" data-toggle="tooltip" title=""
               data-original-title="<?php echo e(trans('admin.site')); ?>"><i class="fa fa-cog fa-spin"></i></a>
        <?php endif; ?>
    <!-- item-->
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show_contacts')): ?>
            <a href="<?php echo e(URL::to('admin/contact')); ?>" class="link" data-toggle="tooltip" title=""
               data-original-title="<?php echo e(trans('admin.contact')); ?>"><i class="fa fa-envelope"></i></a>
    <?php endif; ?>
    <!-- item-->
        <a href="<?php echo e(URL::to('admin/logout')); ?>" class="link" data-toggle="tooltip" title=""
           data-original-title="<?php echo e(trans('admin.logout')); ?>"><i class="fa fa-power-off"></i></a>
    </div>

</aside>

<?php /**PATH C:\Users\Yosra\Documents\GitHub\taskk\resources\views/admin/layouts/include/sidebar.blade.php ENDPATH**/ ?>