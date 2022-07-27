
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
                    <div class="box_header common_table_header">
                        <div class="main-title d-md-flex">
                            <h3 class="mb-0 mr-30 mb_xs_15px mb_sm_20px"><?php echo e(__('common.Language List')); ?></h3>
                            <?php if(permissionCheck('languages.store')): ?>
                                <ul class="d-flex">
                                    <li><a data-toggle="modal"class="primary-btn radius_30px mr-10 fix-gr-bg" href="#" onclick="open_add_laguage_modal()"><i class="ti-plus"></i><?php echo e(__('common.Add New')); ?> <?php echo e(__('common.Language')); ?></a></li>
                                </ul>
                            <?php endif; ?>
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
                                        <th scope="col"><?php echo e(__('common.ID')); ?></th>
                                        <th scope="col"><?php echo e(__('common.Name')); ?></th>
                                        <th scope="col"><?php echo e(__('setting.Code')); ?></th>
                                        <th scope="col"><?php echo e(__('setting.RTL')); ?></th>
                                        <th scope="col"><?php echo e(__('setting.Active')); ?></th>
                                        <th scope="col"><?php echo e(__('common.Action')); ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <th><?php echo e($key+1); ?></th>
                                            <td><?php echo e($language->name); ?></td>
                                            <td><?php echo e($language->code); ?></td>
                                            <td>
                                                <?php echo e($language->rtl ? 'Rtl' : 'Ltr'); ?>

                                            </td>
                                            <td>
                                                <label class="switch_toggle" for="active_checkbox<?php echo e($language->id); ?>">
                                                    <input type="checkbox" id="active_checkbox<?php echo e($language->id); ?>" <?php if($language->status == 1): ?> checked <?php endif; ?> value="<?php echo e($language->id); ?>" onchange="update_active_status(this)" <?php echo e(permissionCheck('languages.update_active_status') ? '' : 'disabled'); ?>>
                                                    <div class="slider round"></div>
                                                </label>
                                            </td>
                                            <td>
                                                <!-- shortby  -->
                                                <div class="dropdown CRM_dropdown">
                                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                                            id="dropdownMenu2" data-toggle="dropdown"
                                                            aria-haspopup="true"
                                                            aria-expanded="false">
                                                        <?php echo e(__('common.Select')); ?>

                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
                                                        <?php if(permissionCheck('languages.edit')): ?>
                                                            <a href="javascript:void(0)" class="dropdown-item edit_brand" onclick="edit_language_modal(<?php echo e($language->id); ?>)"><?php echo e(__('common.Edit')); ?></a>
                                                        <?php endif; ?>
                                                        <?php if(permissionCheck('language.translate_view')): ?>
                                                            <a href="<?php echo e(route('language.translate_view', $language->id)); ?>" class="dropdown-item edit_brand"><?php echo e(__('setting.Translation')); ?></a>
                                                        <?php endif; ?>
                                                        <?php if($language->id > 114 && permissionCheck('languages.destroy')): ?>
                                                            <a onclick="confirm_modal('<?php echo e(route('languages.destroy', $language->id)); ?>');" class="dropdown-item edit_brand"><?php echo e(__('common.Delete')); ?></a>
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
        </div>
    </section>
    <div id="edit_form">

    </div>
    <div id="add_laguage_modal">
        <div class="modal fade admin-query" id="language_add">
            <div class="modal-dialog modal_800px modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><?php echo e(__('common.Add New')); ?> <?php echo e(__('common.Language')); ?></h4>
                        <button type="button" class="close" data-dismiss="modal">
                            <i class="ti-close "></i>
                        </button>
                    </div>

                    <div class="modal-body">
                        <form action="<?php echo e(route('languages.store')); ?>" method="POST" id="language_addForm">
                            <?php echo csrf_field(); ?>
                            <div class="row">

                                <div class="col-xl-12">
                                    <div class="primary_input mb-25">
                                        <label class="primary_input_label" for=""><?php echo e(__('common.Name')); ?></label>
                                        <input name="name" class="primary_input_field name" placeholder="<?php echo e(__('common.Name')); ?>" type="text" required>
                                    </div>
                                </div>

                                <div class="col-xl-12">
                                    <div class="primary_input mb-25">
                                        <label class="primary_input_label" for=""><?php echo e(__('setting.Code')); ?></label>
                                        <input name="code" class="primary_input_field name" placeholder="<?php echo e(__('setting.Code')); ?>" type="text" required>
                                    </div>
                                </div>

                                <div class="col-xl-12">
                                    <div class="primary_input mb-25">
                                        <label class="primary_input_label" for=""><?php echo e(__('setting.Native Name')); ?></label>
                                        <input name="native" class="primary_input_field name" placeholder="<?php echo e(__('setting.Native Name')); ?>" type="text" required>
                                    </div>
                                </div>

                                <div class="col-lg-12 text-center">
                                    <div class="d-flex justify-content-center pt_20">
                                        <button type="submit" class="primary-btn semi_large2 fix-gr-bg" id="save_button_parent"><i class="ti-check"></i><?php echo e(__('common.Save')); ?></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
<?php echo $__env->make('backEnd.partials.delete_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <script type="text/javascript">
    $( document ).ready(function() {
        $('#add_laguage_modal').hide();
    });
        function open_add_laguage_modal(el){
            $('#add_laguage_modal').modal('show');
            $('#language_add').modal('show');
        }
        function edit_language_modal(el){
            $.post('<?php echo e(route('languages.edit')); ?>', {_token:'<?php echo e(csrf_token()); ?>', id:el}, function(data){
                $('#edit_form').html(data);
                $('#Item_Edit').modal('show');
            });
        }
        function update_rtl_status(el){
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('<?php echo e(route('languages.update_rtl_status')); ?>', {_token:'<?php echo e(csrf_token()); ?>', id:el.value, status:status}, function(data){
                if(data == 1){
                    toastr.success("Updated Successfully.","Success");
                }
                else{
                    toastr.error("Something went wrong","error");
                }
            });
        }
        function update_active_status(el){
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('<?php echo e(route('languages.update_active_status')); ?>', {_token:'<?php echo e(csrf_token()); ?>', id:el.value, status:status}, function(data){
                if(data.success){
                    $('#language_code').html(data.languages);
                    $('select').niceSelect('update');
                    toastr.success(data.success);
                }
                else{
                    toastr.error(data.error);
                }
            });
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\projects\ERP\InfixBiz V3.3.2\resources\views/modules/localization/languages/index.blade.php ENDPATH**/ ?>