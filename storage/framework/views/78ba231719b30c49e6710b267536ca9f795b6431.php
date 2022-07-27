<?php $__env->startSection('mainContent'); ?>
<div id="contact_settings">
    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="box_header">
                        <div class="main-title d-flex">
                            <h3 class="mb-0 mr-30"><?php echo e(__('common.Settings')); ?></h3>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="white_box_50px box_shadow_white">
                        <!-- Prefix  -->
                        <form action="<?php echo e(route('contact.settings')); ?>" method="POST"
                        enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-3 d-flex">
                                        <p class="text-uppercase fw-500 mb-10"><?php echo e(__('common.Login Permission')); ?> </p>
                                    </div>
                                    <div class="col-lg-9">

                                        <div class="radio-btn-flex ml-20">
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <div class="">
                                                        <input type="radio" name="contact_login" id="relationFather" value="1" class="common-radio relationButton" <?php echo e((app('general_setting')->first()->contact_login) ? 'checked' : ''); ?> >
                                                        <label for="relationFather"><?php echo e(__('common.Enable')); ?></label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="">
                                                        <input type="radio" name="contact_login" id="relationMother" value="0" <?php echo e((app('general_setting')->first()->contact_login) ? '' : 'checked'); ?> class="common-radio relationButton" >
                                                        <label for="relationMother"><?php echo e(__('common.Disable')); ?></label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 text-center">
                                                    <button class="primary-btn fix-gr-bg" id="_submit_btn_admission">
                                                        <span class="ti-check"></span>
                                                        <?php echo e(__('common.Save')); ?>

                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\projects\ERP\InfixBiz V3.3.2\resources\views/modules/contact/contact/settings.blade.php ENDPATH**/ ?>