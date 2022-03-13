<?php $__env->startSection('content'); ?>
    <?php
    $lang = App::getLocale();
    $text = "text-left";
    $pull = "pull-left";
    if ($lang == "ar") {
        $text = "text-right";
        $pull = "pull-right";
    }
    ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php echo e(__('Roles')); ?>

        </h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item <?php echo e($pull); ?>"><a href="<?php echo e(URL::to('admin')); ?>"> <?php echo e(trans('admin.home')); ?></a></li>
            <li class="breadcrumb-item <?php echo e($pull); ?>"><a href="<?php echo e(URL::to('admin/roles')); ?>">   <?php echo e(__('Roles')); ?></a></li>
            <li class="breadcrumb-item active <?php echo e($pull); ?>"><?php echo e(__('Role edit')); ?></li>
        </ol>
    </section>

    <section class="content">

        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo e(__('Role edit')); ?> : <?php echo e($role['name']); ?></h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>

            <form action="<?php echo e(URL::to('admin/roles/'.$role['id'])); ?>" method="post" enctype="multipart/form-data">
                <?php echo e(Form::hidden('_method','PATCH')); ?>

                <?php echo e(csrf_field()); ?>


                <div class="box-body">
                    <div class="row">
                        <div class="col-12">
                            <?php if(Session::has('message')): ?>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="alert alert-success alert-dismissible">
                                            <?php echo e(Session::get('message')); ?>

                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                                ×
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>


                                <div class="form-group row">
                                    <label for="name[ar]" class="col-sm-3 col-form-label"><?php echo e(__('Name in arabic')); ?></label>
                                    <div class="col-sm-9">
                                        <?php echo e(Form::text('name[ar]', $role->getOriginal('name')['ar'], ['class'=>'form-control','id'=>'name[ar]'])); ?>

                                        <?php $__errorArgs = ['name'.'.'.'ar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div
                                            class="alert alert-danger"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="name[en]" class="col-sm-3 col-form-label"><?php echo e(__('Name in english')); ?></label>
                                    <div class="col-sm-9">
                                        <?php echo e(Form::text('name[en]', $role->getOriginal('name')['en'], ['class'=>'form-control','id'=>'name[en]'])); ?>

                                        <?php $__errorArgs = ['name'.'.'.'en'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div
                                            class="alert alert-danger"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>


                            <h3><?php echo e(__('Permissions')); ?></h3>
                            <div class="row" style="padding-right: 15px;">
                                <?php $__currentLoopData = $permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label class="m-checkbox m-checkbox--check-bold m-checkbox--state-primary">

                                                <?php echo e(Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'col-sm-3'))); ?>

                                                <label class="form-check-label" for="<?php echo e($value); ?>" style="height: 10px;"></label>
                                                <?php echo e(str_replace('_' , ' ',__($value->name))); ?>

                                            </label>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box-footer">
                    <button type="submit" onclick="submitForm(this);" class="btn btn-primary btn-lg"
                            style="font-size: 16px;"><?php echo e(trans('admin.save')); ?></button>
                    <a href="<?php echo e(URL::to('admin/roles')); ?>" class="btn btn-default btn-lg"
                       style="font-size: 16px;"><?php echo e(trans('admin.back')); ?></a>
                </div>

            </form>

        </div>

    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Yosra\Documents\GitHub\taskk\resources\views/admin/roles/edit.blade.php ENDPATH**/ ?>