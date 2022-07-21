

<?php $__env->startSection('title', __('Server Error')); ?>
<?php $__env->startSection('code', '500'); ?>
<?php $__env->startSection('message', __('Server Error')); ?>

<?php $__env->startSection('content'); ?>
    <div class="max-w-sm m-8">
        <div class="text-black text-5xl md:text-15xl font-black">
            <img src="<?php echo e(asset('backEnd/img/500.png')); ?>" alt="" class="img img-fluid"></div>

        <div class="w-16 h-1 bg-purple-light my-3 md:my-6"></div>

        <p class="text-grey-darker text-2xl md:text-3xl font-light mb-8 leading-normal text-white" style="color: #fff; !important;">

            <?php echo e(__('Whoops, something went wrong on our servers.')); ?>

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

<?php echo $__env->make('errors::minimal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\projects\ERP\InfixBiz V3.3.2\resources\views/errors/500.blade.php ENDPATH**/ ?>