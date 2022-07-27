<div class="main-title mb-20">
    <h3 class="mb-0"><?php echo e(__('setting.Email Template')); ?></h3>
</div>
<div class="row">
    <div class="col-12">
        <ul id="sms_setting" class="permission_list sms_list mb-50 template_checkbox">
            <?php
                $templates = \Modules\Setting\Model\EmailTemplate::where(['for' => 'email'])->get();
            ?>
            <?php $__currentLoopData = $templates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $template): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                    <label data-id="<?php echo e($template->type); ?>" class="primary_checkbox d-flex mr-12 ">
                        <input name="sms1" type="radio" <?php if($loop->index == 0): ?> checked="checked" <?php endif; ?>>
                        <span class="checkmark"></span>
                    </label>
                    <p><?php echo e(__('setting.'.$template->type)); ?></p>
                </li>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


        </ul>
        <?php $__currentLoopData = $templates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $template): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div id="<?php echo e($template->type); ?>" class="sms_ption" <?php echo $loop->index != 0 ? 'style="display:none;"' : ''; ?>>
            <form class="" action="<?php echo e(route('template_update')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <!-- content  -->
                <div class="row">
                    <div class="col-xl-12">
                        <div class="primary_input mb-25">
                            <label class="primary_input_label" for=""><?php echo e(__('setting.Subject')); ?></label>
                            <input type="text" name="subject" class="primary_input_field" value="<?php echo e($template->subject); ?>" placeholder="<?php echo e(__('setting.Subject')); ?>">
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="primary_input mb-25">
                            <label class="primary_input_label" for=""><?php echo e(__('setting.Quotation Template')); ?></label>
                            <textarea name="<?php echo e($template->type); ?>" class="summernote3" placeholder="" ><?php echo e($template->value); ?></textarea>
                        </div>
                    </div>

                    <div class="col-xl-12">
                        <div class="primary_input mb-25">
                            <label class="primary_input_label" for=""><?php echo e(__('setting.Available Variables')); ?></label>
                            <p> <?php echo e($template->available_variable); ?> </p>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="name" value="<?php echo e($template->type); ?>">
                <div class="submit_btn text-center mb-100 pt_15">
                    <button class="primary_btn_large" type="submit"> <i class="ti-check"></i> <?php echo e(__('common.Save')); ?></button>
                </div>
                <!-- content  -->
            </form>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>
</div>
<?php /**PATH C:\projects\ERP\InfixBiz V3.3.2\resources\views/modules/setting/page_components/email_template.blade.php ENDPATH**/ ?>