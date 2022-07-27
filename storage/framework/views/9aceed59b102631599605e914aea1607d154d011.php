
<?php if(Illuminate\Support\Facades\Cache::get('language')->rtl == 1): ?>
    <link rel="stylesheet" href="<?php echo e(asset('backEnd/css/rtl/bootstrap.min.css')); ?>"/>
<?php else: ?>
    <link rel="stylesheet" href="<?php echo e(asset('backEnd/vendors/css/bootstrap.min.css')); ?>"/>
<?php endif; ?>

<style>
    :root {
    <?php $__currentLoopData = $color_theme->colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        --<?php echo e($color->name); ?>: <?php echo e($color->pivot->value); ?>;
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    }
</style>

<link rel="stylesheet" href="<?php echo e(asset('backEnd/vendors/css/jquery-ui.css')); ?>"/>

<link rel="stylesheet" href="<?php echo e(asset('backEnd/vendors/css/jquery.data-tables.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('backEnd/vendors/css/buttons.dataTables.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('backEnd/vendors/css/rowReorder.dataTables.min.css/')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('backEnd/vendors/css/responsive.dataTables.min.css')); ?>">

<link rel="stylesheet" href="<?php echo e(asset('backEnd/vendors/css/bootstrap-datepicker.min.css')); ?>"/>
<link rel="stylesheet" href="<?php echo e(asset('backEnd/vendors/css/bootstrap-datetimepicker.min.css')); ?>"/>
<link rel="stylesheet" href="<?php echo e(asset('backEnd/vendors/css/daterangepicker.css')); ?>">


<link rel="stylesheet" href="<?php echo e(asset('backEnd/vendors/css/themify-icons.css')); ?>"/>
<link rel="stylesheet" href="<?php echo e(asset('backEnd/vendors/css/flaticon.css')); ?>"/>
<link rel="stylesheet" href="<?php echo e(asset('backEnd/vendors/css/font-awesome.min.css')); ?>"/>
<link rel="stylesheet" href="<?php echo e(asset('frontend/vendors/font_awesome/css/all.min.css')); ?>" />

<link rel="stylesheet" href="<?php echo e(asset('frontend/vendors/text_editor/summernote-bs4.css')); ?>" />

<link rel="stylesheet" href="<?php echo e(asset('backEnd/vendors/css/magnific-popup.css')); ?>"/>

<link rel="stylesheet" href="<?php echo e(asset('backEnd/vendors/css/toastr.min.css')); ?>"/>

<link rel="stylesheet" href="<?php echo e(asset('backEnd/vendors/css/fastselect.min.css')); ?>"/>
<link rel="stylesheet" href="<?php echo e(asset('backEnd/vendors/js/select2/select2.css')); ?>"/>


<link rel="stylesheet" href="<?php echo e(asset('backEnd/vendors/css/fullcalendar.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('frontend/vendors/calender_js/core/main.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('frontend/vendors/calender_js/daygrid/main.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('frontend/vendors/calender_js/timegrid/main.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('frontend/vendors/calender_js/list/main.css/')); ?>">

  <link rel="stylesheet" href="<?php echo e(asset('css/parsley.css')); ?>" />
<!-- color picker  -->
<link rel="stylesheet" href="<?php echo e(asset('frontend/vendors/color_picker/colorpicker.min.css/')); ?>">


<!-- metis menu  -->
<link rel="stylesheet" href="<?php echo e(asset('frontend/css/metisMenu.css')); ?>">

<?php echo $__env->yieldPushContent('styles'); ?>


<?php if(Illuminate\Support\Facades\Cache::get('language')->rtl == 1): ?>
    <link rel="stylesheet" href="<?php echo e(asset('backEnd/css/rtl/style.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset('backEnd/css/rtl/infix.css')); ?>"/>
<?php else: ?>
    <link rel="stylesheet" href="<?php echo e(asset('backEnd/css/style.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset('backEnd/css/infix.css')); ?>"/>
<?php endif; ?>

<link rel="stylesheet" href="<?php echo e(asset('frontend/css/style.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('backEnd/vendors/css/nice-select.css')); ?>"/>

<?php if($setting->default_view == 'compact'): ?>
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/themes/default_compact.css')); ?>" />
<?php endif; ?>

<link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>" />


<?php echo $__env->yieldPushContent('css'); ?>
<?php /**PATH C:\projects\ERP\InfixBiz V3.3.2\resources\views/backEnd/partials/style.blade.php ENDPATH**/ ?>