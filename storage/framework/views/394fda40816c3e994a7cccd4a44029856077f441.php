<?php
    $city = ['setup.city.index', 'setup.city.edit', 'setup.city.show', 'setup.city.create'];
    $state = ['setup.state.index', 'setup.state.edit', 'setup.state.show', 'setup.state.create'];
    $country = ['setup.country.index', 'setup.country.edit', 'setup.country.show', 'setup.country.create'];

?>

<?php if(isset($include_from) and $include_from == 'setting'): ?>
    <?php if(permissionCheck('tax.index')): ?>
        <li>
            <a href="<?php echo e(route('tax.index')); ?>"
               class="<?php echo e(spn_active_link('tax.index', 'active')); ?>"><?php echo e(__('setup.Tax')); ?></a>
        </li>
    <?php endif; ?>
    <?php if(permissionCheck('setup.city.index')): ?>
        <li>
            <a href="<?php echo e(route('setup.city.index')); ?>" class="<?php echo e(spn_active_link($city, 'active')); ?>"><?php echo e(__('setting.City')); ?></a>
        </li>
    <?php endif; ?>

    <?php if(permissionCheck('setup.state.index')): ?>
        <li>
            <a href="<?php echo e(route('setup.state.index')); ?>" class="<?php echo e(spn_active_link($state, 'active')); ?>"><?php echo e(__('setting.State')); ?></a>
        </li>
    <?php endif; ?>

    <?php if(permissionCheck('setup.country.index')): ?>
        <li>
            <a href="<?php echo e(route('setup.country.index')); ?>" class="<?php echo e(spn_active_link($country, 'active')); ?>"><?php echo e(__('setting.Country')); ?></a>
        </li>
    <?php endif; ?>


    <?php if(permissionCheck('languages.index')): ?>
        <li>
            <a href="<?php echo e(route('languages.index')); ?>"
               class="<?php echo e(spn_active_link(['languages.index','language.translate_view'], 'active')); ?>"><?php echo e(__('common.Language')); ?></a>
        </li>
    <?php endif; ?>

    <?php if(permissionCheck('currencies.index')): ?>
        <li>
            <a href="<?php echo e(route('currencies.index')); ?>"
               class="<?php echo e(spn_active_link('currencies.index', 'active')); ?>"><?php echo e(__('common.Currency')); ?></a>
        </li>
    <?php endif; ?>


    <?php if(permissionCheck('introPrefix.index')): ?>
        <li>
            <a href="<?php echo e(route('introPrefix.index')); ?>"
               class="<?php echo e(spn_active_link('introPrefix.index', 'active')); ?>"><?php echo e(__('setup.Intro Prefix')); ?></a>
        </li>
    <?php endif; ?>
<?php else: ?>


    <?php if(permissionCheck('setup')): ?>
        <?php

            $setup = false;

            if(request()->is('setup/*'))
            {
                $setup = true;
            }

        ?>

        <li class="<?php echo e($setup ?'mm-active' : ''); ?>">
            <a href="javascript:" class="has-arrow" aria-expanded="false">
                <div class="nav_icon_small">
                    <span class="fas fa-wrench"></span>
                </div>
                <div class="nav_title">
                    <span>Setup</span>
                </div>
            </a>
            <ul>
                <?php if(permissionCheck('tax.index')): ?>
                    <li>
                        <a href="<?php echo e(route('tax.index')); ?>"><?php echo e(__('setup.Tax')); ?></a>
                    </li>
                <?php endif; ?>

                <?php if(permissionCheck('country.index')): ?>
                    <li>
                        <a href="<?php echo e(route('country.index')); ?>"><?php echo e(__('setup.Country')); ?></a>
                    </li>
                <?php endif; ?>

                <?php if(permissionCheck('languages.index')): ?>
                    <li>
                        <a href="<?php echo e(route('languages.index')); ?>" class="<?php echo e(spn_active_link(['languages.index', 'language.translate_view'])); ?>"><?php echo e(__('common.Language')); ?></a>
                    </li>
                <?php endif; ?>

                <?php if(permissionCheck('currencies.index')): ?>
                    <li>
                        <a href="<?php echo e(route('currencies.index')); ?>"><?php echo e(__('common.Currency')); ?></a>
                    </li>
                <?php endif; ?>


                <?php if(permissionCheck('introPrefix.index')): ?>
                    <li>
                        <a href="<?php echo e(route('introPrefix.index')); ?>"><?php echo e(__('setup.Intro Prefix')); ?></a>
                    </li>
                <?php endif; ?>

            </ul>
        </li>
    <?php endif; ?>
<?php endif; ?>
<?php /**PATH C:\projects\ERP\erp_github\resources\views/modules/setup/menu.blade.php ENDPATH**/ ?>