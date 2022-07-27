

<?php $__env->startSection('title', __('Not Found')); ?>
<?php $__env->startSection('code', '404'); ?>
<?php $__env->startSection('message', __('Not Found')); ?>

<?php $__env->startSection('content'); ?>
    <div class="max-w-sm m-8">
        <div class="text-black text-5xl md:text-15xl font-black">
            <img src="<?php echo e(asset('backEnd/img/404.png')); ?>" alt="" class="img img-fluid"></div>

        <div class="w-16 h-1 bg-purple-light my-3 md:my-6"></div>

        <p class="text-grey-darker text-2xl md:text-3xl font-light mb-8 leading-normal text-white" style="color: #fff; !important;">

            <?php echo e($exception->getMessage() ?: 'Sorry, the page you are looking for could not be found.'); ?>


        </p>

        <a href="<?php echo e(url('/')); ?>">
            <button
                class="primary-btn fix-gr-bg">
                Go Home
            </button>
        </a>
        <a href="<?php echo e(URL::previous()); ?>">
            <button
                class="primary-btn fix-gr-bg tr-bg">
                Go Back
            </button>
        </a>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('errors::minimal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\projects\ERP\erp_github\resources\views/errors/404.blade.php ENDPATH**/ ?>