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
            <?php echo e(__('Supervisor Powers')); ?>

        </h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item <?php echo e($pull); ?>"><a href="<?php echo e(URL::to('admin')); ?>"> <?php echo e(trans('admin.home')); ?></a></li>
            <li class="breadcrumb-item active <?php echo e($pull); ?>"> <?php echo e(__('Roles')); ?></li>
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
                        <a href="<?php echo e(URL::to('admin/roles/create')); ?>" class="btn btn-lg bg-black"><?php echo e(__('Add role')); ?></a>
                    </div>
                    <div class="box-body">
                        <table id="<?php echo e($datatable); ?>"
                               class="table table-bordered table-hover display nowrap margin-top-10 table-responsive">
                            <thead>
                            <tr>
                                <th class="<?php echo e($text); ?>">#</th>
                                <th class="<?php echo e($text); ?>"><?php echo e(__('Name in arabic')); ?></th>
                                <th class="<?php echo e($text); ?>"><?php echo e(__('Name in english')); ?></th>
                                <th class="<?php echo e($text); ?>"><?php echo e(trans('admin.edit')); ?></th>
                                <th class="<?php echo e($text); ?>"><?php echo e(trans('admin.delete')); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td style="vertical-align: middle;"><?php echo e($loop->iteration); ?></td>
                                    <td style="vertical-align: middle;"><?php echo e($role->getOriginal('name')['ar']); ?></td>
                                    <td style="vertical-align: middle;"><?php echo e($role->getOriginal('name')['en']); ?></td>
                                    <td style="vertical-align: middle;">
                                        <?php echo e(Form::open(array('url' =>'admin/roles/'.$role->id.'/edit', 'method' => 'GET'))); ?>

                                        <button type="submit" class="btn default btn-md btn-info"><i
                                                class="fa fa-edit"></i> <?php echo e(trans('admin.edit')); ?> </button>
                                        <?php echo e(Form::close()); ?>

                                    </td>
                                    <?php if($role->id == 1): ?>
                                        <td>--</td>
                                    <?php else: ?>
                                        <td style="vertical-align: middle;">
                                            <form action="<?php echo e(route('roles.destroy',$role->id)); ?>" method="POST">
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

<?php echo $__env->make('admin.layouts.table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Yosra\Documents\GitHub\taskk\resources\views/admin/roles/index.blade.php ENDPATH**/ ?>