        <?php if(permissionCheck('inventory')): ?>
           <?php
                $inventory = false;

                if((request()->is('inventory/*') && !request()->is('inventory/showroom') && !request()->is('inventory/warehouse') && !request()->is('inventory/showroom/*')) || request()->is('purchase/purchase/receive-list/*'))
                {
                    $inventory = true;
                }

            ?>

        <li class="<?php echo e($inventory ?'mm-active' : ''); ?> report">
            <a href="javascript:;" class="has-arrow" aria-expanded="false">
                <div class="nav_icon_small">
                    <span class="fa fa-university"></span>
                </div>
                <div class="nav_title">
                    <span><?php echo e(__('inventory.Inventory')); ?></span>
                </div>
            </a>
            <ul>
                <?php if(permissionCheck('add_opening_stock_create')): ?>
                    <li>
                        <a href="<?php echo e(route('add_opening_stock_create')); ?>" class="<?php echo e(request()->is('inventory/product/add-opening-stock') ? 'active' : ''); ?>"> <?php echo e(__('common.Add Opening Stock')); ?></a>
                    </li>
                <?php endif; ?>
                <?php if(permissionCheck('purchase_order.recieve.index')): ?>
                    <li>
                        <a href="<?php echo e(route('purchase_order.recieve.index')); ?>" class="<?php echo e(request()->is('inventory/purchase-order-recieve') || request()->is('purchase/purchase/receive-list/*') ? 'active' : ''); ?>"> <?php echo e(__('purchase.Recieve Your Product')); ?> </a>
                    </li>
                <?php endif; ?>
                <?php if(permissionCheck('purchase_order.cost_of_goods.index')): ?>
                    <li>
                        <a href="<?php echo e(route('purchase_order.cost_of_goods.index')); ?>" class="<?php echo e(request()->is('inventory/inventory/cost-of-goods-history') ? 'active' : ''); ?>"> <?php echo e(__('inventory.Product Costing')); ?>(<?php echo e(__('inventory.Sales')); ?>) </a>
                    </li>
                <?php endif; ?>

                <?php if(permissionCheck('stock-transfer.index')): ?>
                    <li>
                        <a href="<?php echo e(route('stock-transfer.index')); ?>" class="<?php echo e(request()->is('inventory/stock-transfer') || request()->is('inventory/stock-transfer/*') ? 'active' : ''); ?>"> <?php echo e(__('common.Stock Transfer')); ?></a>
                    </li>
                <?php endif; ?>
                <?php if(permissionCheck('stock.report')): ?>
                    <li>
                        <a href="<?php echo e(route('stock.report')); ?>" class="<?php echo e(request()->is('inventory/stock-report') ? 'active' : ''); ?>"> <?php echo e(__('common.Stock List')); ?> </a>
                    </li>
               <?php endif; ?>
                <?php if(permissionCheck('product_movement.index')): ?>
                <li>
                    <a href="<?php echo e(route('product_movement.index')); ?>" class="<?php echo e(request()->is('inventory/product-movement') ? 'active' : ''); ?>"><?php echo e(__('inventory.Product Movement')); ?></a>
                </li>
                <?php endif; ?>
                <?php if(permissionCheck('stock_adjustment.index')): ?>
                <li>
                    <a href="<?php echo e(route('stock_adjustment.index')); ?>" class="<?php echo e(request()->is('inventory/stock-adjustment/*') ? 'active' : ''); ?>"> <?php echo e(__('common.Stock Adjustment')); ?> </a>
                </li>
                <?php endif; ?>
                <?php if(permissionCheck('stock.product.info')): ?>
                <li>
                    <a href="<?php echo e(route('stock.product.info')); ?>" class="<?php echo e(request()->is('inventory/stock-product-info') ? 'active' : ''); ?>"> <?php echo e(__('inventory.Product Info')); ?> </a>
                </li>
                <?php endif; ?>
            </ul>
        </li>
        <?php endif; ?>
<?php /**PATH C:\projects\ERP\InfixBiz V3.3.2\resources\views/modules/inventory/menu.blade.php ENDPATH**/ ?>