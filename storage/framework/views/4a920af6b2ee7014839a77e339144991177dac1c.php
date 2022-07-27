<!-- sidebar part here -->
<nav id="sidebar" class="sidebar">


    <div class="sidebar-header update_sidebar">
        <a class="large_logo" href="<?php echo e(url('/login')); ?>">
            <img src="<?php echo e(asset($setting->logo)); ?>" alt="">
        </a>
        <a class="mini_logo" href="<?php echo e(url('/login')); ?>">
             <img src="<?php echo e(asset($setting->logo)); ?>" alt="">
        </a>
        <a id="close_sidebar" class="d-lg-none">
            <i class="ti-close"></i>
        </a>
    </div>

    <ul id="sidebar_menu" class="metismenu">
        <?php if(auth()->user()->role->type != "normal_user"): ?>
            <li class="<?php echo e(request()->is('home') ? 'mm-active' :''); ?>  " >
                <a href="<?php echo e(route('home')); ?>" aria-expanded="false">
                    <div class="nav_icon_small">
                        <span class="fas fa-th"></span>
                    </div>
                    <div class="nav_title">
                        <span><?php echo e(__('common.Dashboard')); ?></span>
                    </div>
                </a>
            </li>
        <?php endif; ?>

        <?php echo $__env->make('project::menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('sale::menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('contact::menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('product::menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('inventory::menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('purchase::menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('quotation::menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('account::menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('backEnd.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('leave::menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('setting::menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('backup::menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('useractivitylog::menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    </ul>

</nav>
<!-- sidebar part end -->
<?php /**PATH C:\projects\ERP\erp_github\resources\views/backEnd/partials/sidebar.blade.php ENDPATH**/ ?>