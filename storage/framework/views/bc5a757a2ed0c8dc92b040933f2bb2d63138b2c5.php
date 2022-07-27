<?php if(permissionCheck('setting.index')): ?>
    <?php

        $setting = false;

        if(request()->is('setting/*') or request()->is('setup/*') or request()->is('localization'))
        {
            $setting = true;
        }

    ?>


    <li class="<?php echo e($setting ?'mm-active' : ''); ?>">
        <a href="javascript:void (0);" class="has-arrow" aria-expanded="false">
            <div class="nav_icon_small">
                <span class="fas fa-store"></span>
            </div>
            <div class="nav_title">
                <span><?php echo e(__('setting.System Settings')); ?></span>
            </div>
        </a>
        <ul>

            <?php if(permissionCheck('setting.index')): ?>
                <li>
                    <a href="<?php echo e(url('setting')); ?>"> <?php echo e(__('setting.Settings')); ?></a>
                </li>
            <?php endif; ?>
            <?php if(permissionCheck('pdf_fonts.index')): ?>
                <li>
                    <a href="<?php echo e(route('pdf_fonts.index')); ?>"> <?php echo e(__('setting.Pdf Fonts')); ?></a>
                </li>
            <?php endif; ?>
            <?php if(permissionCheck('payment-method-settings')): ?>
                <li>
                    <a href="<?php echo e(route('payment-method-settings')); ?>"> <?php echo e(__('setting.Payment Method Setting')); ?></a>
                </li>
            <?php endif; ?>

            <?php if ($__env->exists('setup::menu', ['include_from' => 'setting'])) echo $__env->make('setup::menu', ['include_from' => 'setting'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php if(permissionCheck('modulemanager.index')): ?>
                <li>
                    <a href="<?php echo e(route('modulemanager.index')); ?>"
                       class="<?php echo e(spn_active_link('modulemanager.index', 'active')); ?>"><?php echo e(__('common.Module Manager')); ?></a>
                </li>
            <?php endif; ?>


            <?php if(permissionCheck('setting.updatesystem')): ?>
                <li>
                    <a href="<?php echo e(route('setting.updatesystem')); ?>"
                       class="<?php echo e(spn_active_link('setting.updatesystem', 'active')); ?>"><?php echo e(__('setting.Update')); ?></a>
                </li>
            <?php endif; ?>


        </ul>
    </li>

<?php endif; ?>

<?php if(permissionCheck('style.index')): ?>
    <?php
        $style = false;

        if(request()->is('style/*'))
        {
            $style = true;
        }
    ?>

    <li class="<?php echo e($style ?'mm-active' : ''); ?>">
        <a href="javascript:void (0);" class="has-arrow" aria-expanded="false">
            <div class="nav_icon_small">
                <span class="fas fa-store"></span>
            </div>
            <div class="nav_title">
                <span><?php echo e(__('setting.Styles')); ?></span>
            </div>
        </a>
        <ul>


            <?php if(permissionCheck('guest-background')): ?>
                <li>
                    <a href="<?php echo e(route('guest-background')); ?>"
                       class="<?php echo e(spn_active_link('guest-background', 'active')); ?>"><?php echo e(__('setting.Background')); ?></a>
                </li>
            <?php endif; ?>
            <?php if(permissionCheck('themes.index')): ?>
                <li>
                    <a href="<?php echo e(route('themes.index')); ?>"
                       class="<?php echo e(spn_active_link('themes.index', 'active')); ?>"><?php echo e(__('setting.Theme Customization')); ?></a>
                </li>

            <?php endif; ?>

            <?php if(permissionCheck('themes.change_view')): ?>
                <li>
                    <a href="<?php echo e(route('themes.change_view')); ?>"
                       class="<?php echo e(spn_active_link('themes.change_view', 'active')); ?>"><?php echo e(__('common.Change View')); ?></a>
                </li>

            <?php endif; ?>


        </ul>
    </li>

<?php endif; ?>
<?php if(permissionCheck('utilities')): ?>
    <li class="<?php echo e(request()->is('utilities') ? 'mm-active' : ''); ?>">
        <a href="<?php echo e(route('utilities')); ?>">
            <div class="nav_icon_small">
                <span class="fas fa-store"></span>
            </div>
            <div class="nav_title">
                <span><?php echo e(__('setting.Utilities')); ?></span>
            </div>
        </a>
    </li>
<?php endif; ?>
<?php /**PATH C:\projects\ERP\InfixBiz V3.3.2\resources\views/modules/setting/menu.blade.php ENDPATH**/ ?>