<?php if(permissionCheck('useractivitylog')): ?>
   <?php
        $useractivitylog = false;
        if(request()->is('useractivitylog/*') || request()->is('useractivitylog'))
        {
            $useractivitylog = true;
        }
    ?>
    <li class="<?php echo e($useractivitylog ?'mm-active' : ''); ?>">
        <a href="javascript:;" class="has-arrow" aria-expanded="false">
            <div class="nav_icon_small">
                <span class="fas fa-clock-o"></span>
            </div>
            <div class="nav_title">
                <span><?php echo e(__('common.All Activity Logs')); ?></span>
            </div>
        </a>
        <ul>
            <?php if(permissionCheck('activity_log')): ?>
            <li>
                <a href="<?php echo e(route('activity_log')); ?>" class="<?php echo e(request()->is('useractivitylog') ? 'active' : ''); ?>"><?php echo e(__('common.Activity Logs')); ?></a>
            </li>
            <?php endif; ?>
                <?php if(permissionCheck('activity_log.login')): ?>
            <li>
                <a href="<?php echo e(route('activity_log.login')); ?>" class="<?php echo e(request()->is('useractivitylog/*') ? 'active' : ''); ?>"><?php echo e(__('common.Login - Logut Activity')); ?></a>
            </li>
                <?php endif; ?>
        </ul>
    </li>
<?php endif; ?>
<?php /**PATH C:\projects\ERP\erp_github\resources\views/modules/useractivitylog/menu.blade.php ENDPATH**/ ?>