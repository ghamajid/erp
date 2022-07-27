
<?php
    $setting = app('general_setting');
?>
<?php echo $__env->make('backEnd.partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->yieldContent('mainContent'); ?>

<?php echo $__env->make('backEnd.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\projects\ERP\InfixBiz V3.3.2\resources\views/backEnd/master.blade.php ENDPATH**/ ?>