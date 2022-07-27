<?php if(permissionCheck('leave')): ?>
    <?php

        $leave = false;

        if(request()->is('leave') || request()->is('leave/*'))
        {
            $leave = true;
        }

    ?>

    <li class="<?php echo e($leave ?'mm-active' : ''); ?>">
        <a href="javascript:void(0);" class="has-arrow" aria-expanded="false">
            <div class="nav_icon_small">
                <span class="fas fa-print"></span>
            </div>
            <div class="nav_title">
                <span><?php echo e(__('leave.Leave')); ?></span>
            </div>
        </a>
        <ul>
            <?php if(permissionCheck('leave_types.index')): ?>
                <li>
                    <a href="<?php echo e(route('leave_types.index')); ?>"
                       class="<?php echo e(request()->is('leave/types') ? 'active' : ''); ?>"><?php echo e(__('leave.Leave Type')); ?></a>
                </li>
            <?php endif; ?>
            <?php if(permissionCheck('leave_define.index')): ?>
                <li>
                    <a href="<?php echo e(route('leave_define.index')); ?>"
                       class="<?php echo e(request()->is('leave/define-lists') ? 'active' : ''); ?>"><?php echo e(__('leave.Leave Define')); ?></a>
                </li>
            <?php endif; ?>
            <?php if(permissionCheck('apply_leave.index')): ?>
                <li>
                    <a href="<?php echo e(route('apply_leave.index')); ?>"
                       class="<?php echo e(request()->is('leave') ? 'active' : ''); ?>"><?php echo e(__('leave.Apply Leave')); ?></a>
                </li>
            <?php endif; ?>
            <?php if(permissionCheck('approved_index')): ?>
                <li>
                    <a href="<?php echo e(route('approved_index')); ?>"
                       class="<?php echo e(request()->is('leave/approved') ? 'active' : ''); ?>"><?php echo e(__('leave.Approve Leave Request')); ?></a>
                </li>
            <?php endif; ?>



            <?php if(permissionCheck('pending_index')): ?>
                <li>
                    <a href="<?php echo e(route('pending_index')); ?>"
                       class="<?php echo e(request()->is('leave/pending') ? 'active' : ''); ?>"><?php echo e(__('leave.Pending Leave')); ?></a>
                </li>
            <?php endif; ?>

            <?php if(permissionCheck('holidays.index')): ?>
                <li>
                    <a href="<?php echo e(route('holidays.index')); ?>"
                       class="<?php echo e(request()->is('leave/holidays') || request()->is('leave/holidays/*')  ? 'active' : ''); ?>"><?php echo e(__('holiday.Holiday Setup')); ?></a>
                </li>
            <?php endif; ?>

            <?php if(permissionCheck('carry.forward')): ?>
                <li>
                    <a href="<?php echo e(route('carry.forward')); ?>"
                       class="<?php echo e(request()->is('leave/carry-forward') ? 'active' : ''); ?>"><?php echo e(__('leave.Carry Forward')); ?></a>
                </li>
            <?php endif; ?>
        </ul>
    </li>
<?php endif; ?>
<?php /**PATH C:\projects\ERP\InfixBiz V3.3.2\resources\views/modules/leave/menu.blade.php ENDPATH**/ ?>