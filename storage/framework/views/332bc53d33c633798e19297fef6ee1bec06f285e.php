<div class="white_box_30px" id="translate_modal">
    <form class="" action="<?php echo e(route('languages.key_value_store')); ?>" method="post">
        <?php echo csrf_field(); ?>
        <div class="">
            <input type="hidden" name="id" value="<?php echo e($language->id); ?>">
            <input type="hidden" name="translatable_file_name" value="<?php echo e($translatable_file_name); ?>">
            <div class="col-lg-12 mb-2">
                <div class="d-flex">
                    <button class="primary_btn_2"><i class="ti-check"></i><?php echo e(__("common.Save")); ?> </button>
                </div>
            </div>
        </div>
        <div class="common_QA_section QA_section_heading_custom th_padding_l0">
            <div class="QA_table ">
                <!-- table-responsive -->
                <div class="">
                    <table class="table Crm_table_active2 pt-0 shadow_none pt-0 pb-0">
                        <thead>
                        <tr>
                            <th scope="col"><?php echo e(__('common.ID')); ?></th>
                            <th scope="col"><?php echo e(__('setting.Key')); ?></th>
                            <th scope="col"><?php echo e(__('setting.Value')); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $i = 1
                        ?>
                        <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <tr>
                                <td><?php echo e($i); ?></td>
                                <td><?php echo e($key); ?></td>
                                <td>
                                    <?php if( is_array($value) ): ?>
                                        <table class="table pt-0 shadow_none pt-0 pb-0">
                                            <tbody>
                                            <?php $__currentLoopData = $value; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_key => $sub_value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td width="10%"><?php echo e($sub_key); ?></td>
                                                    <td>
                                                        <?php if( is_array($sub_value) ): ?>
                                                            <table class="table pt-0 shadow_none pt-0 pb-0">
                                                                <tbody>
                                                                <?php $__currentLoopData = $sub_value; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_sub_key => $sub_sub_value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <tr>
                                                                        <td><?php echo e($sub_sub_key); ?></td>
                                                                        <td>
                                                                            <div class="col-lg-12">
                                                                                <input type="text" class="form-control"
                                                                                       style="width:100%"
                                                                                       name="key[<?php echo e($key); ?>][<?php echo e($sub_key); ?>][<?php echo e($sub_sub_key); ?>]"
                                                                                       <?php if(isset($sub_sub_value)): ?>
                                                                                       value="<?php echo e($sub_sub_value); ?>"
                                                                                    <?php endif; ?>>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </tbody>
                                                            </table>
                                                        <?php else: ?>

                                                            <div class="col-lg-12">
                                                                <input type="text" class="form-control"
                                                                       style="width:100%"
                                                                       name="key[<?php echo e($key); ?>][<?php echo e($sub_key); ?>]"
                                                                       <?php if(isset($sub_value)): ?>
                                                                       value="<?php echo e($sub_value); ?>"
                                                                    <?php endif; ?>>
                                                            </div>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    <?php else: ?>
                                        <div class="col-lg-12">
                                            <input type="text" class="form-control" style="width:100%"
                                                   name="key[<?php echo e($key); ?>]" <?php if(isset($value)): ?>
                                                   value="<?php echo e($value); ?>"
                                                <?php endif; ?>>
                                        </div>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php
                                $i++
                            ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </form>
</div>
<?php /**PATH C:\projects\ERP\InfixBiz V3.3.2\resources\views/modules/localization/modals/translate_modal.blade.php ENDPATH**/ ?>