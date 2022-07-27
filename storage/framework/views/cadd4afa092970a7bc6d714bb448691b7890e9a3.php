<?php if(permissionCheck('product')): ?>
    <?php

        $product = false;

        if(request()->is('product/*'))
        {
            $product = true;
        }

    ?>
    <li class="<?php echo e($product ?'mm-active' : ''); ?>">
        <a href="javascript:;" class="has-arrow" aria-expanded="<?php echo e($product ? 'true' : 'false'); ?>">
            <div class="nav_icon_small">
                <span class="fab fa-product-hunt"></span>
            </div>
            <div class="nav_title">
                <span><?php echo e(__('common.Products')); ?></span>
            </div>
        </a>
        <ul>

            <?php if(permissionCheck('add_product.store')): ?>
                <li>
                    <a href="<?php echo e(route('add_product.create')); ?>" class="<?php echo e(request()->is('product/add_product/create') ? 'active' : ''); ?>"> <?php echo e(__('common.Product List')); ?> </a>
                </li>
            <?php endif; ?>
            <?php if(permissionCheck('add_product.service')): ?>
                <li>
                    <a href="<?php echo e(route('add_product.service')); ?>" class="<?php echo e(request()->is('product/add_product/service') ? 'active' : ''); ?>"> <?php echo e(__('product.Service')); ?> </a>
                </li>
            <?php endif; ?>
            <?php if(permissionCheck('add_product.index')): ?>
                <li>
                    <a href="<?php echo e(route('add_product.index')); ?>" class="<?php echo e(request()->is('product/add_product') ? 'active' : ''); ?>"> <?php echo e(__('common.Add Product')); ?> </a>
                </li>
            <?php endif; ?>

            <?php if(permissionCheck('category.index')): ?>
                <li>
                    <a href="<?php echo e(route('category.index')); ?>" class="<?php echo e(request()->is('product/category') ? 'active' : ''); ?>"> <?php echo e(__('common.Category')); ?> </a>
                </li>
            <?php endif; ?>
            <?php if(permissionCheck('brand.index')): ?>
                <li>
                    <a href="<?php echo e(route('brand.index')); ?>" class="<?php echo e(request()->is('product/brand') ? 'active' : ''); ?>"> <?php echo e(__('common.Brand')); ?> </a>
                </li>
            <?php endif; ?>

            <?php if(permissionCheck('model.index')): ?>
                <li>
                    <a href="<?php echo e(route('model.index')); ?>" class="<?php echo e(request()->is('product/model') ? 'active' : ''); ?>"> <?php echo e(__('common.Model')); ?> </a>
                </li>
            <?php endif; ?>

            <?php if(permissionCheck('unit_type.index')): ?>
                <li>
                    <a href="<?php echo e(route('unit_type.index')); ?>" class="<?php echo e(request()->is('product/unit_type') ? 'active' : ''); ?>"> <?php echo e(__('common.Unit Type')); ?></a>
                </li>
            <?php endif; ?>

            <?php if(permissionCheck('variant.index')): ?>
                <li>
                    <a href="<?php echo e(route('variant.index')); ?>" class="<?php echo e(request()->is('product/variant') ? 'active' : ''); ?>"> <?php echo e(__('common.Variant')); ?></a>
                </li>
            <?php endif; ?>
        </ul>
    </li>

<?php endif; ?>
<?php /**PATH C:\projects\ERP\erp_github\resources\views/modules/product/menu.blade.php ENDPATH**/ ?>