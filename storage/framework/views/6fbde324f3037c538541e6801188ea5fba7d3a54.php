
<!DOCTYPE html>
<?php
    Illuminate\Support\Facades\Cache::remember('language', 3600 , function() {
        return Modules\Localization\Entities\Language::where('code', session()->get('locale', Config::get('app.locale')))->first();
    });
?>
<html <?php if(Illuminate\Support\Facades\Cache::get('language')->rtl == 1): ?> dir="rtl" class="rtl" <?php endif; ?> lang="<?php echo e(session()->get('locale', Config::get('app.locale'))); ?>">

<head>
    <script>
            const RTL = "1";
            const LANG = "<?php echo e(session()->get('locale', Config::get('app.locale'))); ?>";
    </script>

    <!-- Required meta tags -->
    <meta charset="utf-8"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <link rel="shortcut icon" href="<?php echo e(asset($setting->favicon)); ?>"/>
    <meta name="url" content="<?php echo e(url('/')); ?>">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>"/>
    <title><?php echo e($setting->site_title); ?> </title>
    <meta name="_token" content="<?php echo csrf_token(); ?>"/>
    <?php echo $__env->make('backEnd.partials.style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</head>
<?php
    if (empty($color_theme)) {
     $css = "background: url('".asset('/public/backEnd/img/body-bg.jpg')."')  no-repeat center; background-size: cover; ";
 } else {
     if (!empty($color_theme->background_type == 'image')) {
         $css = "background: url('" . url($color_theme->background_image) . "')  no-repeat center; background-size: cover; background-attachment: fixed; background-position: top; ";
     } else {
         $css = "background:" . $color_theme->background_color;
     }
 }

?>

<body class="admin"  style="<?php echo $css; ?> ">


<div class="main-wrapper" style=" min-height: 600px">
    <!-- Sidebar  -->.

    <?php if(!request()->is('pos/pos-order-products')): ?>
        <?php echo $__env->make('backEnd.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <div id="main-content" class="<?php echo e(Request::is('pos/pos-order-products') ? 'mini_main_content' : ''); ?>">
        <!-- Page Content  -->
        <!-- application baseUrlForJS  -->
        <input name="app_base_url" id="app_base_url" type="hidden" value="<?php echo e(url('/')); ?>">

<?php echo $__env->make('backEnd.partials.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\projects\ERP\InfixBiz V3.3.2\resources\views/backEnd/partials/header.blade.php ENDPATH**/ ?>