
<?php $__env->startSection('mainContent'); ?>
    <?php echo $__env->make("backEnd.partials.alertMessage", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>
    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="box_header">
                        <div class="main-title d-flex">
                            <h3 class="mb-0 mr-30" ><?php echo e(__('common.Login - Logut Activity')); ?></h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="QA_section QA_section_heading_custom check_box_table">
                        <div class="QA_table ">
                            <!-- table-responsive -->
                            <div class="">
                                <table class="table Crm_table_active3">
                                    <thead>
                                    <tr>
                                        <th scope="col"><?php echo e(__('common.ID')); ?></th>
                                        <th scope="col"><?php echo e(__('common.User')); ?></th>
                                        <th scope="col"><?php echo e(__('common.Login At')); ?></th>
                                        <th scope="col"><?php echo e(__('common.Logout At')); ?></th>
                                        <th scope="col"><?php echo e(__('setting.IP')); ?></th>
                                        <th scope="col"><?php echo e(__('setting.Agent')); ?></th>
                                        <th scope="col"><?php echo e(__('common.Description')); ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $activities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <th><?php echo e($key+1); ?></th>
                                            <td><?php echo e($activity->user->name); ?></td>
                                            <td><?php echo e($activity->login_time); ?></td>
                                            <td><?php echo e($activity->logout_time); ?></td>
                                            <td><?php echo e($activity->ip); ?></td>
                                            <td><?php echo e($activity->agent); ?></td>
                                            <td><?php echo e($activity->subject); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\projects\ERP\InfixBiz V3.3.2\resources\views/modules/useractivitylog/login_index.blade.php ENDPATH**/ ?>