<?php if(permissionCheck('backup.index')): ?>
   <?php

        $backup = false;

        if(request()->is('backup'))
        {
            $backup = true;
        }

    ?>

<li class="<?php echo e($backup ?'mm-active' : ''); ?>">
    <a href="<?php echo e(route('backup.index')); ?>" class="<?php echo e($backup ?'active' : ''); ?>" aria-expanded="false">
        <div class="nav_icon_small">
            <span class="fas fa-file-download"></span>
        </div>
        <div class="nav_title">
            <span><?php echo e(__('common.Backup')); ?></span>
        </div>
    </a>
</li>
<?php endif; ?>
<?php /**PATH C:\projects\ERP\erp_github\resources\views/modules/backup/menu.blade.php ENDPATH**/ ?>