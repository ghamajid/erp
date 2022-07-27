<?php $__env->startSection('mainContent'); ?>
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="box_header common_table_header">
                <div class="main-title d-md-flex">
                    <h3 class="mb-0 mr-30 mb_xs_15px mb_sm_20px"><?php echo e(__('common.Customers')); ?> </h3>

                    <ul class="d-flex">
                        <?php if(permissionCheck('add_contact.store')): ?>
                            <li><a class="primary-btn radius_30px mr-10 fix-gr-bg"
                                   href="<?php echo e(route("add_contact.index")); ?>"><i
                                        class="ti-plus"></i><?php echo e(__('common.New Contact')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(permissionCheck('contact_csv_upload.store')): ?>
                            <li><a class="primary-btn radius_30px mr-10 fix-gr-bg"
                                   href="<?php echo e(route('contact_csv_upload.create')); ?>"><i
                                        class="ti-export"></i><?php echo e(__('common.Upload Via CSV')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>

                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="QA_section QA_section_heading_custom check_box_table">
                <div class="QA_table ">
                    <!-- table-responsive -->
                    <div class="">
                        <table class="table Crm_table_active3">
                            <thead>
                            <tr>
                                <th scope="col"><?php echo e(__('common.Sl')); ?></th>
                                <th scope="col"><?php echo e(__('common.Contact ID')); ?></th>
                                <th scope="col"><?php echo e(__('common.Customer Name')); ?></th>
                                <th scope="col"><?php echo e(__('common.Email')); ?></th>
                                <th scope="col"><?php echo e(__('common.Phone')); ?></th>
                                <th scope="col"><?php echo e(__('common.Pay Term')); ?></th>
                                <th scope="col"><?php echo e(__('common.Tax Number')); ?></th>
                                <th scope="col"><?php echo e(__('setting.Active')); ?></th>
                                <th scope="col"><?php echo e(__('common.Action')); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $customer_value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <th><?php echo e($key+1); ?></th>
                                    <td><?php echo e($customer_value->contact_id); ?></td>
                                    <td><?php echo e($customer_value->name); ?></td>
                                    <td><?php echo e($customer_value->email); ?></td>
                                    <td><?php echo e($customer_value->mobile); ?></td>
                                    <td><?php echo e($customer_value->pay_term??''); ?> <?php echo e($customer_value->pay_term_condition??''); ?> </td>
                                    <td><?php echo e($customer_value->tax_number); ?></td>
                                    <td>
                                        <label class="switch_toggle" for="active_checkbox<?php echo e($customer_value->id); ?>">
                                            <input type="checkbox" id="active_checkbox<?php echo e($customer_value->id); ?>"
                                                   <?php if($customer_value->is_active == 1): ?> checked
                                                   <?php endif; ?> value="<?php echo e($customer_value->id); ?>"
                                                   onchange="update_active_status(this)" <?php echo e(permissionCheck('languages.update_active_status') ? '' : 'disabled'); ?>>
                                            <div class="slider round"></div>
                                        </label>
                                    </td>
                                    <td>
                                        <!-- shortby  -->
                                        <div class="dropdown CRM_dropdown">
                                            <button class="btn btn-secondary dropdown-toggle" type="button"
                                                    id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                <?php echo e(__('common.Select')); ?>

                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right"
                                                 aria-labelledby="dropdownMenu2">
                                                <a href="<?php echo e(route('customer.view',$customer_value->id)); ?>"
                                                   class="dropdown-item"><?php echo e(__('common.View')); ?></a>
                                                <?php if(permissionCheck('add_contact.edit') && $customer_value->id > 1): ?>
                                                    <a href="<?php echo e(route('add_contact.edit',$customer_value->id)); ?>"
                                                       class="dropdown-item"><?php echo e(__('common.Edit')); ?></a>
                                                <?php endif; ?>

                                                <?php if(permissionCheck('add_contact.destroy') && $customer_value->id > 1): ?>

                                                    <a onclick="confirm_modal('<?php echo e(route('add_contact.delete',$customer_value->id)); ?>');"
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo $__env->make('backEnd.partials.delete_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div id="Customer_info">

    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush("scripts"); ?>
    <script type="text/javascript">
        function update_active_status(el) {
            "use strict";
            if (el.checked) {
                var status = 1;
            } else {
                var status = 0;
            }
            $.post('<?php echo e(route('contact.update_active_status')); ?>', {
                _token: '<?php echo e(csrf_token()); ?>',
                id: el.value,
                status: status
            }, function (data) {
                if (data == 1) {
                    toastr.success(trans('js.Updated Successfully'), trans('js.Success'));
                } else {
                    toastr.error(trans('js.Something is not right'));
                }
            });
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\projects\ERP\InfixBiz V3.3.2\resources\views/modules/contact/contact/customer.blade.php ENDPATH**/ ?>