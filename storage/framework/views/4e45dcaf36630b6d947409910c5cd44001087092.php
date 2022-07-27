<div class="main-title mb-25">
    <h3 class="mb-0"><?php echo e(__('setting.Activation')); ?></h3>
</div>

<div class="common_QA_section QA_section_heading_custom">
    <div class="QA_table ">
        <!-- table-responsive -->
        <div class="">
            <table class="table Crm_table_active2">
                <thead>
                    <tr>
                        <th scope="col"><?php echo e(__('common.Sl')); ?></th>
                        <th scope="col"><?php echo e(__('setting.Type')); ?></th>
                        <th scope="col" class=""><?php echo e(__('setting.Activate')); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $business_settings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $business_setting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($key+1); ?></td>
                            <td><?php echo e(strtoupper(str_replace("_"," ",$business_setting->type))); ?></td>
                            <td class="">
                                <label class="switch_toggle" for="checkbox<?php echo e($business_setting->id); ?>">
                                    <input type="checkbox" id="checkbox<?php echo e($business_setting->id); ?>" <?php if($business_setting->status == 1): ?> checked <?php endif; ?> value="<?php echo e($business_setting->id); ?>" onchange="update_active_status(this)">
                                    <div class="slider round"></div>
                                </label>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php /**PATH C:\projects\ERP\InfixBiz V3.3.2\resources\views/modules/setting/page_components/activation.blade.php ENDPATH**/ ?>