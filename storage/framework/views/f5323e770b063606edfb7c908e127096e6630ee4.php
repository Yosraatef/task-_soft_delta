<?php $__env->startSection('content'); ?>
    <?php
    $lang = App::getLocale();
    $text = "text-left";
    $pull = "float-left";
    $pulll = "float-right";
    $datatable = 'example';
    if ($lang == "ar") {
        $text = "text-right";
        $pull = "float-right";
        $pulll = "float-left";
        $datatable = 'example_ar';
    }
    ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php echo e(__('Supervisors')); ?>

        </h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item <?php echo e($pull); ?>"><a href="<?php echo e(URL::to('admin')); ?>"> <?php echo e(trans('admin.home')); ?></a></li>
            <li class="breadcrumb-item active <?php echo e($pull); ?>"> <?php echo e(__('Supervisors')); ?></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-lg-12" id="active_response">

                    </div>
                </div>

                <?php if(Session::has('message')): ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="alert alert-success alert-dismissible">
                                <?php echo e(Session::get('message')); ?>

                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if(Session::has('error')): ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="alert alert-danger alert-dismissible">
                                <?php echo e(Session::get('error')); ?>

                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="box">
                    <div class="box-header">
                        <a href="<?php echo e(URL::to('admin/admins/create')); ?>"
                           class="btn btn-lg bg-black"><?php echo e(__('Add supervisor')); ?></a>
                    </div>
                    <div class="box-body">
                        <table id="<?php echo e($datatable); ?>"
                               class="table table-bordered table-hover display nowrap margin-top-10 table-responsive">
                            <thead>
                            <tr>
                                <th class="<?php echo e($text); ?>">#</th>
                                <th class="<?php echo e($text); ?>"><?php echo e(trans('admin.name')); ?></th>
                                <th class="<?php echo e($text); ?>"><?php echo e(trans('admin.email')); ?></th>
                                <th class="<?php echo e($text); ?>"><?php echo e(trans('admin.phone')); ?></th>
                                <th class="<?php echo e($text); ?>"><?php echo e(__('Role')); ?></th>
                                <th class="<?php echo e($text); ?>"><?php echo e(__('Active')); ?></th>
                                <th class="<?php echo e($text); ?>"><?php echo e(trans('admin.edit')); ?></th>
                                <th class="<?php echo e($text); ?>"><?php echo e(trans('admin.delete')); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $admins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td style="vertical-align: middle;"><?php echo e($loop->iteration); ?></td>
                                    <td style="vertical-align: middle;"><?php echo e($admin->name); ?></td>
                                    <td style="vertical-align: middle;"><?php echo e($admin['email']); ?></td>
                                    <td style="vertical-align: middle;" dir="ltr"
                                        class="<?php echo e($text); ?>"><?php echo e($admin['phone']); ?></td>
                                    <td style="vertical-align: middle;" dir="ltr"
                                        class="<?php echo e($text); ?>">
                                        <?php $__currentLoopData = $admin->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <h4><span class="label label-info"><?php echo e($role->name); ?></span></h4>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </td>
                                    <td style="vertical-align: middle;">
                                        <?php if($admin['id'] != Auth::User()->id): ?>
                                            <label class="switch" style="margin-bottom: 0;">
                                                <?php if($admin['status'] == 1): ?>
                                                    <input class="switch_active" page='admins' id="<?php echo e($admin['id']); ?>"
                                                           type="checkbox" checked="">
                                                <?php else: ?>
                                                    <input class="switch_active" page='admins' id="<?php echo e($admin['id']); ?>"
                                                           type="checkbox">
                                                <?php endif; ?>
                                                <span class="slider"></span>
                                            </label>
                                        <?php endif; ?>
                                    </td>
                                    <td style="vertical-align: middle;">
                                        <?php echo e(Form::open(array('url' =>'admin/admins/'.$admin->id.'/edit', 'method' => 'GET'))); ?>

                                        <button type="submit" class="btn default btn-md btn-info"><i
                                                class="fa fa-edit"></i> <?php echo e(trans('admin.edit')); ?> </button>
                                        <?php echo e(Form::close()); ?>

                                    </td>
                                    <?php if($admin->id == 1): ?>
                                        <td class="text text-danger"><?php echo e(__('Can not delete')); ?></td>
                                    <?php else: ?>
                                        <td style="vertical-align: middle;">
                                            <form action="<?php echo e(route('admins.destroy',$admin->id)); ?>" method="POST">
                                                <?php echo method_field('DELETE'); ?>
                                                <?php echo csrf_field(); ?>

                                                <button class="btn btn-danger"
                                                        onclick="return confirm('Are you sure you want to delete this item?');"><?php echo e(trans('admin.delete')); ?></button>
                                            </form>
                                        </td>
                                    <?php endif; ?>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>


                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>


    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Yosra\Documents\GitHub\taskk\resources\views/admin/admins/index.blade.php ENDPATH**/ ?>