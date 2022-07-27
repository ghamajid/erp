<?php $__env->startSection('mainContent'); ?>
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="box_header common_table_header">
                <div class="main-title d-md-flex">
                    <h3 class="mb-0 mr-30 mb_xs_15px mb_sm_20px"><?php echo e(__('setting.Utilities')); ?></h3>

                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="row">
                <div class="col-md-4 col-lg-4 col-sm-4">
                    <a class="white-box single-summery d-block btn-ajax" href="<?php echo e(route('utilities', ['utilities' => 'optimize_clear'])); ?>" >
                        <div class="d-block mt-10 text-center ">
                            <h3><i class="ti-cloud font_30" ></i></h3>
                            <h1 class="gradient-color2 total_purchase"><?php echo e(__('setting.Clear Cache')); ?></h1>
                        </div>
                    </a>
                </div>

                <div class="col-md-4 col-lg-4 col-sm-4">
                    <a class="white-box single-summery d-block btn-ajax" href="<?php echo e(route('utilities', ['utilities' => 'clear_log'])); ?>" >
                        <div class="d-block mt-10 text-center ">
                            <h3><i class="ti-receipt font_30" ></i></h3>
                            <h1 class="gradient-color2 total_purchase"><?php echo e(__('setting.Clear Log')); ?></h1>
                        </div>
                    </a>
                </div>

                <div class="col-md-4 col-lg-4 col-sm-4">
                    <a class="white-box single-summery d-block btn-ajax" href="<?php echo e(route('utilities', ['utilities' => 'change_debug'])); ?>" >
                        <div class="d-block mt-10 text-center ">
                            <h3><i class="ti-blackboard font_30" ></i></h3>
                            <h1 class="gradient-color2 total_purchase"> <?php echo e(__((env('APP_DEBUG') ? "Disable" : "Enable" ).' App Debug')); ?></h1>
                        </div>
                    </a>
                </div>


            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).on('click', '.btn-ajax', function(e) {
            e.preventDefault();
            var loader = $(this).find('.demo_wait');
            $('.preloader').fadeIn('slow');
            $.ajax({
                url: $(this).attr('href'),
                dataType: 'json',
                success: function(result) {

                    toastr.success(result.message, trans('js.Success'));
                    if (result.goto){
                        setTimeout(function (){
                            window.location.href = result.goto
                        }, 200);
                    } else{
                        $('.preloader').fadeOut('slow');
                    }
                },
                error: function(data) {
                    ajax_error(data);
                    $('.preloader').fadeOut('slow');
                }
            });
        });
    </script>
    <?php $__env->stopPush(); ?>

<?php echo $__env->make('setting::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\projects\ERP\InfixBiz V3.3.2\resources\views/modules/setting/utilities/index.blade.php ENDPATH**/ ?>