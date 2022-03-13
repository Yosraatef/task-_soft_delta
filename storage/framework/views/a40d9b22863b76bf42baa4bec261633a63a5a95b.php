


<?php $__env->startSection('content'); ?>
    <style>
        .content .small-box h3 {
            font-size: 30px;
        }

    </style>
    <?php
    $lang = App::getLocale();
    $text = 'text-left';
    $pull = 'pull-left';
    $pulll = 'pull-right';
    if ($lang == 'ar') {
        $text = 'text-right';
        $pull = 'pull-right';
        $pulll = 'pull-left';
    }
    ?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php echo e(trans('admin.admin')); ?>

        </h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(URL::to('admin')); ?>"><i class="fa fa-home"></i>
                    <?php echo e(trans('admin.home')); ?></a></li>
        </ol>
    </section>

    <!-- Main content -->

    <section class="content">

        <div class="row">
            <?php if(Session::has('message')): ?>
                <div class="col-lg-12 col-xl-12">
                    <div class="alert alert-success alert-dismissible">
                        <?php echo e(Session::get('message')); ?>

                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div id="chart-container"></div>
                <br>
            </div>
            <div class="row">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show_profile')): ?>
                    <div class="col-12 col-md-4 col-lg-3">
                        <div class="info-box">
                            <a href="<?php echo e(URL::to('admin/profile/')); ?>">
                                <span class="info-box-icon bg-green"><i class="fa fa-user"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-number"><br></span>
                                    <span class="info-box-text"><?php echo e(__('my Profile')); ?></span>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php endif; ?>
        

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show_settings')): ?>
                    <div class="col-12 col-md-4 col-lg-3">
                        <div class="info-box">
                            <a href="<?php echo e(URL::to('admin/settings/1/edit')); ?>">
                                <span class="info-box-icon bg-red"><i class="fa fa-globe"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-number"><br></span>
                                    <span class="info-box-text"><?php echo e(__('Website settings')); ?></span>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php endif; ?>


       


                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show_log')): ?>
                    <div class="col-12 col-md-4 col-lg-3">
                        <div class="info-box">
                            <a href="<?php echo e(URL::to('admin/log/')); ?>">
                                <span class="info-box-icon bg-yellow"><i class="fa fa-tasks"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-number"><?php echo e($log); ?></span>
                                    <span class="info-box-text"><?php echo e(__('System logs')); ?></span>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php endif; ?>
              
          

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show_admins')): ?>
                    <div class="col-12 col-md-4 col-lg-3">
                        <div class="info-box">
                            <a href="<?php echo e(URL::to('admin/admins')); ?>">
                                <span class="info-box-icon bg-aqua"><i class="fa fa-user-secret"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-number"><?php echo e($admins); ?></span>
                                    <span class="info-box-text"><?php echo e(__('Admins')); ?></span>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show_roles')): ?>
                    <div class="col-12 col-md-4 col-lg-3">
                        <div class="info-box">
                            <a href="<?php echo e(URL::to('admin/roles/')); ?>">
                                <span class="info-box-icon bg-maroon"><i class="fa fa-key"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-number"><?php echo e($roles); ?></span>
                                    <span class="info-box-text"><?php echo e(__('Roles')); ?></span>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php endif; ?>


                <div class="col-12 col-md-4 col-lg-3">
                    <div class="info-box">
                        <a href="<?php echo e(URL::to('admin/logout')); ?>">
                            <span class="info-box-icon bg-navy-active"><i class="fa fa-sign-out"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-number"><br></span>
                                <span class="info-box-text"><?php echo e(trans('admin.logout')); ?></span>
                            </div>
                        </a>
                    </div>
                </div>

            </div>
        </div>

    </section>

    <!-- /.content -->


<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Yosra\Documents\GitHub\taskk\resources\views/admin/home/index.blade.php ENDPATH**/ ?>