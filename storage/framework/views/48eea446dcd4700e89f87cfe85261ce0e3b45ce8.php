<div class="modal fade admin-query" id="Item_Edit">
    <div class="modal-dialog modal_800px modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><?php echo e(__('setting.Edit Language Info')); ?></h4>
                <button type="button" class="close" data-dismiss="modal">
                    <i class="ti-close "></i>
                </button>
            </div>

            <div class="modal-body">
                <form action="<?php echo e(route('languages.update', $language->id)); ?>" method="POST" id="languageEditForm">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="row">

                        <div class="col-xl-12">
                            <div class="primary_input mb-25">
                                <label class="primary_input_label" for=""><?php echo e(__('common.Name')); ?></label>
                                <input name="name" class="primary_input_field name" value="<?php echo e($language->name); ?>" placeholder="Language Name" type="text" required>
                                <span class="text-danger"><?php echo e($errors->first("name")); ?></span>
                            </div>
                        </div>

                        <div class="col-xl-12">
                            <div class="primary_input mb-25">
                                <label class="primary_input_label" for=""><?php echo e(__('setting.Code')); ?></label>
                                <input name="code" class="primary_input_field name" value="<?php echo e($language->code); ?>" placeholder="Language Code" type="text" required>
                                <span class="text-danger"><?php echo e($errors->first("code")); ?></span>
                            </div>
                        </div>

                        <div class="col-xl-12">
                            <div class="primary_input mb-25">
                                <label class="primary_input_label" for=""><?php echo e(__('setting.Native Name')); ?></label>
                                <input name="native" class="primary_input_field name" value="<?php echo e($language->native); ?>" placeholder="Native Name" type="text" required>
                                <span class="text-danger"><?php echo e($errors->first("native")); ?></span>
                            </div>
                        </div>

                        <div class="col-lg-12 text-center">
                            <div class="d-flex justify-content-center pt_20">
                                <button type="submit" class="primary-btn semi_large2 fix-gr-bg" id="save_button_parent"><i class="ti-check"></i><?php echo e(__('common.Update')); ?>

                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\projects\ERP\InfixBiz V3.3.2\resources\views/modules/localization/languages/edit_modal.blade.php ENDPATH**/ ?>