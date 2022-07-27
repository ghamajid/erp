<?php if(permissionCheck('contact')): ?>

    <?php

        $contact = false;

        if(request()->is('contact/*'))
        {
        $contact = true;
        }

    ?>

    <li class="<?php echo e($contact ?'mm-active' : ''); ?>">
        <a href="javascript:void (0);" class="has-arrow" aria-expanded="false">
            <div class="nav_icon_small">
                <span class="fas fa-file-contract"></span>
            </div>
            <div class="nav_title">
                <span><?php echo e(__('common.Contacts')); ?></span>
            </div>
        </a>
        <ul>
            <?php if(permissionCheck('add_contact.store')): ?>
                <li>
                    <a href="<?php echo e(route('add_contact.index')); ?>"
                       class="<?php echo e(spn_active_link(['add_contact.index', 'contact_csv_upload'])); ?>"> <?php echo e(__('common.Add Contacts')); ?> </a>
                </li>
            <?php endif; ?>

            <?php if(permissionCheck('supplier')): ?>
                <li>
                    <a href="<?php echo e(route('supplier')); ?>"
                       class="<?php echo e(spn_active_link('supplier')); ?>"> <?php echo e(__('common.Supplier')); ?> </a>
                </li>
            <?php endif; ?>

            <?php if(permissionCheck('customer')): ?>
                <li>
                    <a href="<?php echo e(route('customer')); ?>"
                       class="<?php echo e(spn_active_link('customer')); ?>"> <?php echo e(__('common.Customer')); ?> </a>
                </li>
            <?php endif; ?>
                <?php if ($__env->exists('extrauser::menu')) echo $__env->make('extrauser::menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php if(permissionCheck('contact.settings')): ?>
                <li>
                    <a href="<?php echo e(route('contact.settings')); ?>"
                       class="<?php echo e(spn_active_link('contact.settings')); ?>"> <?php echo e(__('common.Settings')); ?> </a>
                </li>
            <?php endif; ?>

        </ul>
    </li>
<?php endif; ?>

<?php if(auth()->user()->role_id == 5 or auth()->user()->role_id == 4): ?>
    <li class="<?php echo e(request()->is('my_details') ?'mm-active' : ''); ?>">
        <a href="<?php echo e(route('contact.my_details')); ?>">
            <div class="nav_icon_small">
                <span class="fas fa-file-contract"></span>
            </div>
            <div class="nav_title">
                <span><?php echo e(__('common.My Details')); ?></span>
            </div>
        </a>
    </li>

    <li class="<?php echo e(request()->is('invoice') ?'mm-active' : ''); ?>">
        <a href="<?php echo e(route('contact.invoice')); ?>">
            <div class="nav_icon_small">
                <span class="fas fa-file-contract"></span>
            </div>
            <div class="nav_title">
                <span><?php echo e(__('common.Invoice')); ?></span>
            </div>
        </a>
    </li>

    <li class="<?php echo e(request()->is('return') ?'mm-active' : ''); ?>">
        <a href="<?php echo e(route('contact.return')); ?>">
            <div class="nav_icon_small">
                <span class="fas fa-file-contract"></span>
            </div>
            <div class="nav_title">
                <span><?php echo e(__('common.Return')); ?></span>
            </div>
        </a>
    </li>

    <li class="<?php echo e(request()->is('transaction') ?'mm-active' : ''); ?>">
        <a href="<?php echo e(route('contact.transaction')); ?>">
            <div class="nav_icon_small">
                <span class="fas fa-file-contract"></span>
            </div>
            <div class="nav_title">
                <span><?php echo e(__('common.Transaction')); ?></span>
            </div>
        </a>
    </li>
<?php endif; ?>

<?php /**PATH C:\projects\ERP\InfixBiz V3.3.2\resources\views/modules/contact/menu.blade.php ENDPATH**/ ?>