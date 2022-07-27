<div class="main-title mb-25">
    <h3 class="mb-0"><?php echo e(__('setting.Invoice Settings')); ?></h3>
</div>
<form action="<?php echo e(route('invoice_settings_update')); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <div class="">
        

        <div class="single_system_wrap">
            <div class="row">
               
                <div class="col-xl-12">
                    <div class="primary_input mb-25">
                        <label class="primary_input_label" for=""><?php echo e(__('setting.Remark Title')); ?></label>
                        <input class="primary_input_field" placeholder="<?php echo e(__('setting.Remark Title')); ?>" type="text" id="remarks_title"
                               name="remarks_title" value="<?php echo e($setting->remarks_title); ?>">
                    </div>
                </div>

                <div class="col-xl-12">
                    <div class="primary_input mb-25">
                        <label class="primary_input_label" for=""><?php echo e(__('setting.Remark Body')); ?></label>
                        <textarea class="primary_textarea" placeholder="<?php echo e(__('setting.Remark Body')); ?>"
                                  id="remarks_body" cols="30" rows="5"
                                  name="remarks_body"><?php echo e($setting->remarks_body); ?></textarea>
                    </div>
                </div>

                <div class="col-xl-12">
                    <div class="primary_input mb-25">
                        <label class="primary_input_label" for=""><?php echo e(__('setting.Terms & Condition')); ?></label>
                        <textarea class="primary_textarea" placeholder="<?php echo e(__('setting.Terms & Condition')); ?>"
                                  id="terms_conditions" cols="30" rows="10"
                                  name="terms_conditions"><?php echo e($setting->terms_conditions); ?></textarea>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <div class="submit_btn text-center mt-4">
        <button class="primary_btn_large" type="submit"><i class="ti-check"></i> <?php echo e(__('common.Save')); ?></button>
    </div>
</form>
<?php /**PATH C:\projects\ERP\InfixBiz V3.3.2\resources\views/modules/setting/page_components/invoice_settings.blade.php ENDPATH**/ ?>