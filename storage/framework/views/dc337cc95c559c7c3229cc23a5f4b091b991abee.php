
<?php $__env->startSection('mainContent'); ?>
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="box_header common_table_header">
                <div class="main-title d-md-flex">
                    <h3 class="mb-0 mr-30 mb_xs_15px mb_sm_20px"><?php echo e(__('common.Activity Logs')); ?></h3>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="QA_section QA_section_heading_custom check_box_table">
                <div class="QA_table ">
                    <table class="table Crm_table_active3">
                        <thead>
                            <tr>
                                <th scope="col"><?php echo e(__('common.ID')); ?></th>
                                <th width="25%" scope="col"><?php echo e(__('common.Description')); ?></th>
                                <th scope="col"><?php echo e(__('common.Type')); ?></th>
                                <th scope="col"><?php echo e(__('setting.URL')); ?></th>
                                <th scope="col"><?php echo e(__('setting.IP')); ?></th>
                                <th width="25%" scope="col"><?php echo e(__('setting.Agent')); ?></th>
                                <th scope="col"><?php echo e(__('common.Attempted At')); ?></th>
                                <th scope="col"><?php echo e(__('common.User')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $activities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th><?php echo e($key+1); ?></th>
                                <td><?php echo e($activity->subject); ?></td>
                                <td>
                                    <?php if($activity->type == 0): ?>
                                        <span class="badge_4">Error</span>
                                    <?php elseif($activity->type == 1): ?>
                                        <span class="badge_1">Success</span>
                                    <?php elseif($activity->type == 2): ?>
                                        <span class="badge_3">Warning</span>
                                    <?php else: ?>
                                        <span class="badge_2">Info</span>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo e($activity->url); ?></td>
                                <td><?php echo e($activity->ip); ?></td>
                                <td><?php echo e($activity->agent); ?></td>
                                <td><?php echo e($activity->updated_at); ?></td>
                                <td><?php echo e(userName($activity->user_id)); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\projects\ERP\InfixBiz V3.3.2\resources\views/modules/useractivitylog/index.blade.php ENDPATH**/ ?>