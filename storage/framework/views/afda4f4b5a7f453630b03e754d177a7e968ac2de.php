<?php if(permissionCheck('quotation')): ?>


<?php

    $quotation = false;

    if(request()->is('quotation/*'))
    {
        $quotation = true;
    }

?>

<li class="<?php echo e($quotation ?'mm-active' : ''); ?>">
    <a href="javascript:void (0);" class="has-arrow" aria-expanded="false">
        <div class="nav_icon_small">
            <span class="fas fa-coffee"></span>
        </div>
        <div class="nav_title">
            <span><?php echo e(__('quotation.Quotation')); ?></span>
        </div>
    </a>
    <ul>
        <?php if(permissionCheck('quotation.index')): ?>
            <li>
                <a href="<?php echo e(route('quotation.index')); ?>" class="<?php echo e(request()->is('quotation') || request()->is('quotation/*') ? 'active' : ''); ?>"> <?php echo e(__('quotation.Quotation')); ?></a>
            </li>
        <?php endif; ?>
    </ul>
</li>
<?php endif; ?>
<?php /**PATH C:\projects\ERP\erp_github\resources\views/modules/quotation/menu.blade.php ENDPATH**/ ?>