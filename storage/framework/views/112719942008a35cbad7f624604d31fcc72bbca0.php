<?php if(permissionCheck('sale')): ?>

    <?php

        $sale = false;
        if(request()->is('sale/*'))
        {
            $sale = true;
            $conditional = false;
        }
    ?>


    <li class="<?php echo e($sale ?'mm-active' : ''); ?>">
        <a href="javascript:void (0);" class="has-arrow" aria-expanded="false">
            <div class="nav_icon_small">
                <span class="fas fa-store"></span>
            </div>
            <div class="nav_title">
                <span><?php echo e(__('sale.Sale')); ?></span>
            </div>
        </a>
        <ul>

            <?php if(permissionCheck('sale.index')): ?>
                <li>
                    <a href="<?php echo e(route('sale.index')); ?>"
                       class="<?php echo e(request()->is('sale/sale') || request()->is('sale/sale/*') && !request()->is('sale/sale-return/*') ? 'active' : ''); ?>"> <?php echo e(__('sale.Sale')); ?></a>
                </li>
            <?php endif; ?>

            <?php if(moduleStatusCheck('ExtraUser')): ?>
                <?php if(permissionCheck('affiliate.index')): ?>
                    <li>
                        <a href="<?php echo e(route('affiliate.index')); ?>"
                           class="<?php echo e(request()->is('sale/affiliate') || request()->is('sale/affiliate/*') && !request()->is('sale/sale-return/*') ? 'active' : ''); ?>"> <?php echo e(__('extrauser::extrauser.Affiliate')); ?></a>
                    </li>
                <?php endif; ?>
                <?php if(permissionCheck('commissioner.index')): ?>
                    <li>
                        <a href="<?php echo e(route('commissioner.index')); ?>"
                           class="<?php echo e(request()->is('sale/commissioner') || request()->is('sale/commissioner/*') && !request()->is('sale/sale-return/*') ? 'active' : ''); ?>"> <?php echo e(__('extrauser::extrauser.Commissioner')); ?></a>
                    </li>
                <?php endif; ?>
            <?php endif; ?>



            <?php if(permissionCheck('sale.return.index')): ?>
                <li>
                    <a href="<?php echo e(route('sale.return.index')); ?>"
                       class="<?php echo e(request()->is('sale/sale-return/*') ? 'active' : ''); ?>"> <?php echo e(__('sale.Sale Return')); ?></a>
                </li>
            <?php endif; ?>

        </ul>
    </li>
<?php endif; ?>
<?php /**PATH C:\projects\ERP\erp_github\resources\views/modules/sale/menu.blade.php ENDPATH**/ ?>