<?php $__env->startSection('mainContent'); ?>
    <?php echo $__env->make("backEnd.partials.alertMessage", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>
    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="box_header">
                        <div class="main-title d-flex">
                            <h3 class="mb-0 mr-30"><?php echo e(__('setting.Background')); ?></h3>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <?php echo Form::open(['url' => route('guest-background'), 'method' => 'post', 'id' => 'updateLoginBG', 'files' =>true ]); ?>

                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="g_set" value="1">

                    <div class="General_system_wrap_area bg_grib d-flex">
                        <div class="single_system_wrap">
                            <div class="single_system_wrap_inner text-center">
                                <div class="logo ">
                                    <span><?php echo e(__('setting.Login Background Image')); ?></span>
                                </div>
                                <div class="logo_img ml-auto mr-auto">
                                    <img class="img-fluid h-100" src="<?php echo e(asset( $setting->login_bg )); ?>"
                                         alt="<?php echo e(asset( $setting->login_bg )); ?>" id="login_bg">
                                </div>
                                <div class="update_logo_btn">
                                    <button class="primary-btn small fix-gr-bg " type="button">
                                        <input placeholder="Upload Image" type="file" name="login_bg"
                                               onchange="imageChangeWithFile(this, '#login_bg' )">
                                        <?php echo e(__('setting.Upload Image')); ?>

                                    </button>
                                </div>

                            </div>
                        </div>


                        <div class="single_system_wrap">
                            <div class="single_system_wrap_inner text-center">
                                <div class="logo ">
                                    <span><?php echo e(__('setting.Error Page Background Image')); ?></span>
                                </div>
                                <div class="logo_img ml-auto mr-auto">
                                    <img class="img-fluid h-100" src="<?php echo e(asset( $setting->error_page_bg )); ?>"
                                         alt="<?php echo e(__('setting.Error Page Background Image')); ?>" id="error_page_bg">
                                </div>
                                <div class="update_logo_btn">
                                    <button class="primary-btn small fix-gr-bg " type="button">
                                        <input placeholder="Upload Image" type="file" name="error_page_bg"
                                               onchange="imageChangeWithFile(this, '#error_page_bg' )">
                                        <?php echo e(__('setting.Upload Image')); ?>

                                    </button>
                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="submit_btn text-center mt-4">
                        <button class="primary_btn_large submit" type="submit"><i
                                class="ti-check"></i><?php echo e(__('common.Save')); ?>

                        </button>

                        <button class="primary_btn_large submitting" type="submit" disabled style="display: none;"><i
                                class="ti-check"></i><?php echo e(__('common.Saving')); ?>

                        </button>

                    </div>
    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </section>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('setting::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\projects\ERP\InfixBiz V3.3.2\resources\views/modules/setting/bg.blade.php ENDPATH**/ ?>