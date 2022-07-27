<table class="table Crm_table_active3">
    <thead>
    <tr>

        <th scope="col"><?php echo e(__('common.ID')); ?></th>
        <th scope="col"><?php echo e(__('common.Name')); ?></th>
        <th scope="col"><?php echo e(__('common.Description')); ?></th>
        <th scope="col"><?php echo e(__('common.Status')); ?></th>
        <th scope="col"><?php echo e(__('common.Action')); ?></th>
    </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$models_value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>

            <th><?php echo e($key+1); ?></th>
            <td><?php echo e($models_value->name); ?></td>
            <td><?php echo e($models_value->description); ?></td>
            <td>
                <?php if($models_value->status == 1): ?>
                    <span class="badge_1"><?php echo e(__('common.Active')); ?></span>
                <?php else: ?>
                    <span class="badge_4"><?php echo e(__('common.DeActive')); ?></span>
                <?php endif; ?>
            </td>
            <td>
                <div class="dropdown CRM_dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button"
                            id="dropdownMenu<?php echo e($loop->iteration + 1); ?>" data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false">
                        <?php echo e(__('common.Select')); ?>

                    </button>
                    <div class="dropdown-menu dropdown-menu-right"
                         aria-labelledby="dropdownMenu<?php echo e($loop->iteration + 1); ?>">
                        <?php if(permissionCheck('model.edit')): ?>
                            <a href="#" data-toggle="modal" data-target="#Item_Edit"
                               class="dropdown-item edit_model_type"
                               data-value="<?php echo e($models_value->id); ?>" type="button"><?php echo e(__('common.Edit')); ?></a>
                        <?php endif; ?>

                        <?php if(permissionCheck('model.destroy') && @$models_value->products->count() == 0): ?>
                            <a onclick="confirm_modal('<?php echo e(route('model.delete',$models_value->id)); ?>');" class="dropdown-item "><?php echo e(__('common.Delete')); ?></a>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </tbody>
</table>
<?php /**PATH C:\projects\ERP\InfixBiz V3.3.2\resources\views/modules/product/model/model_list.blade.php ENDPATH**/ ?>