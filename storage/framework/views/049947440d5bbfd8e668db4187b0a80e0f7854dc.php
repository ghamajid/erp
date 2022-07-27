<?php if(permissionCheck('purchase')): ?>


    <?php

        $purchase = false;

        if(request()->is('purchase/*') && !request()->is('purchase/purchase/receive-list/*') )
        {
            $purchase = true;
        }

    ?>


    <li class="<?php echo e($purchase ?'mm-active' : ''); ?>">
        <a href="javascript:void (0);" class="has-arrow" aria-expanded="false">
            <div class="nav_icon_small">
                <span class="fas fa-store-alt"></span>
            </div>
            <div class="nav_title">
                <span><?php echo e(__('purchase.Purchase')); ?></span>
            </div>
        </a>
        <ul>

            <?php if(permissionCheck('purchase_order.index')): ?>
                <li>
                    <a href="<?php echo e(route('purchase_order.index')); ?>"
                       class="<?php echo e(request()->is('purchase/purchase_order') || request()->is('purchase/purchase_order/*') ? 'active' : ''); ?>"> <?php echo e(__('purchase.Purchase Order')); ?></a>
                </li>
            <?php endif; ?>
            <?php if(permissionCheck('purchase.suggest')): ?>
                <li>
                    <a href="<?php echo e(route('purchase.suggest')); ?>"
                       class="<?php echo e(request()->is('purchase/suggested-list') ? 'active' : ''); ?>"> <?php echo e(__('purchase.Stock Alert List')); ?></a>
                </li>
            <?php endif; ?>
            <?php if(permissionCheck('purchase.return.index')): ?>
                <li>
                    <a href="<?php echo e(route('purchase.return.index')); ?>"
                       class="<?php echo e(request()->is('purchase/purchase-return-list') ? 'active' : ''); ?>"> <?php echo e(__('purchase.Purchase Return List')); ?></a>
                </li>
            <?php endif; ?>
            <?php if(permissionCheck('cnf.index')): ?>
                <li>
                    <a href="<?php echo e(route('cnf.index')); ?>"
                       class="<?php echo e(spn_active_link(['cnf.index'])); ?>"> <?php echo e(__('purchase.CNF')); ?></a>
                </li>
            <?php endif; ?>

        </ul>
    </li>
<?php endif; ?>
<?php /**PATH C:\projects\ERP\erp_github\resources\views/modules/purchase/menu.blade.php ENDPATH**/ ?>