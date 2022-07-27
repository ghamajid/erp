<table class="table Crm_table_active3">
    <thead>
    <tr>

        <th scope="col"><?php echo e(__('common.ID')); ?></th>
        <th scope="col"><?php echo e(__('common.Unit Type')); ?></th>
        <th scope="col"><?php echo e(__('common.Description')); ?></th>
        <th scope="col"><?php echo e(__('common.Status')); ?></th>
        <th scope="col"><?php echo e(__('common.Action')); ?></th>
    </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $unit_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$unit_type_value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <th><?php echo e($key+1); ?></th>
            <td><?php echo e($unit_type_value->name); ?></td>
            <td><?php echo e($unit_type_value->description); ?></td>
            <td>
                <?php if($unit_type_value->status == 1): ?>
                    <span class="badge_1"><?php echo e(__('common.Active')); ?></span>
                <?php else: ?>
                    <span class="badge_4"><?php echo e(__('common.DeActive')); ?></span>
                <?php endif; ?>
            </td>
            <td>
                <!-- shortby  -->
                <div class="dropdown CRM_dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button"
                            id="dropdownMenu<?php echo e($loop->iteration + 1); ?>" data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false">
                        <?php echo e(__('common.Select')); ?>

                    </button>
                    <div class="dropdown-menu dropdown-menu-right"
                         aria-labelledby="dropdownMenu<?php echo e($loop->iteration + 1); ?>">
                        <?php if(permissionCheck('unit_type.edit')): ?>
                            <a href="#" data-toggle="modal" data-target="#Item_Edit"
                               class="dropdown-item edit_unit_type"
                               data-value="<?php echo e($unit_type_value->id); ?>" type="button"><?php echo e(__('common.Edit')); ?></a>
                        <?php endif; ?>
                        <?php if(permissionCheck('unit_type.destroy') && @$unit_type_value->products->count() == 0): ?>

                            <a onclick="confirm_modal('<?php echo e(route('unit_type.delete',$unit_type_value->id)); ?>');"
                               class="dropdown-item "><?php echo e(__('common.Delete')); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
                <!-- shortby  -->
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </tbody>
</table>
<?php /**PATH C:\projects\ERP\InfixBiz V3.3.2\resources\views/modules/product/unit_type/unit_type_list.blade.php ENDPATH**/ ?>