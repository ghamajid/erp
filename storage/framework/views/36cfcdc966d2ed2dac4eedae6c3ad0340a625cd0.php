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
                            <h3 class="mb-0 mr-30 mb_xs_15px mb_sm_20px"><?php echo e(__('common.Model')); ?></h3>
                                <ul class="d-flex">
                                    <?php if(permissionCheck('model.store')): ?>
                                    <li><a data-toggle="modal" data-target="#Item_Details"
                                           class="primary-btn radius_30px mr-10 fix-gr-bg" href="#"><i
                                                class="ti-plus"></i><?php echo e(__('common.Add Model')); ?></a></li>
                                        <?php endif; ?>
                                        <?php if(permissionCheck('model.csv_upload.store')): ?>
                                    <li><a class="primary-btn radius_30px mr-10 fix-gr-bg"
                                           href="<?php echo e(route('model.csv_upload.create')); ?>"><i
                                                class="ti-export"></i><?php echo e(__('common.Upload Via CSV')); ?></a></li>
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
                                <div id="model_list">
                                    <?php echo $__env->make('product::model.model_list', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Add Modal Item_Details -->

                <div class="modal fade admin-query" id="Item_Details">
                    <div class="modal-dialog modal_800px modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title"><?php echo e(__('common.Add Model')); ?></h4>
                                <button type="button" class="close " data-dismiss="modal">
                                    <i class="ti-close "></i>
                                </button>
                            </div>

                            <div class="modal-body">
                                <form method="POST" id="modelTypeForm">
                                    <div class="row">

                                        <div class="col-xl-12">
                                            <div class="primary_input mb-25">
                                                <label class="primary_input_label" for=""><?php echo e(__('common.Name')); ?>

                                                    *</label>
                                                <input name="name" class="primary_input_field" placeholder="<?php echo e(__('product.Model Name')); ?>"
                                                       type="text" required>
                                                <span class="text-danger" id="name_error"></span>
                                            </div>
                                        </div>

                                        <div class="col-xl-12">
                                            <div class="primary_input mb-25">
                                                <label class="primary_input_label"
                                                       for=""><?php echo e(__('common.Description')); ?></label>
                                                <input name="description" class="primary_input_field"
                                                       placeholder="<?php echo e(__('product.Put Some Description')); ?>" type="text">
                                                <span class="text-danger" id="description_error"></span>
                                            </div>
                                        </div>

                                        <div class="col-xl-12">
                                            <div class="primary_input">
                                                <label class="primary_input_label" for=""><?php echo e(__('common.Status')); ?>

                                                    *</label>
                                                <ul id="theme_nav" class="permission_list sms_list ">
                                                    <li>
                                                        <label data-id="bg_option"
                                                               class="primary_checkbox d-flex mr-12">
                                                            <input name="status" value="1" class="active" type="radio"
                                                                   checked>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <p><?php echo e(__('common.Active')); ?></p>
                                                    </li>
                                                    <li>
                                                        <label data-id="color_option"
                                                               class="primary_checkbox d-flex mr-12">
                                                            <input name="status" value="0" class="de_active"
                                                                   type="radio">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <p><?php echo e(__('common.DeActive')); ?></p>
                                                    </li>
                                                </ul>
                                                <span class="text-danger" id="status_error"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 text-center">
                                            <div class="d-flex justify-content-center pt_20">
                                                <button type="submit" class="primary-btn semi_large2  fix-gr-bg"
                                                        id="save_button_parent"><i
                                                        class="ti-check"></i><?php echo e(__('common.Add Model')); ?>

                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal fade admin-query" id="Item_Edit">
                    <div class="modal-dialog modal_800px modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title"><?php echo e(__('common.Edit Model')); ?></h4>
                                <button type="button" class="close " data-dismiss="modal">
                                    <i class="ti-close "></i>
                                </button>
                            </div>

                            <div class="modal-body">
                                <form id="modelTypeEditForm">
                                    <div class="row">
                                        <input type="text" style="display: none;" class="edit_id">
                                        <div class="col-xl-12">
                                            <div class="primary_input mb-25">
                                                <label class="primary_input_label" for=""><?php echo e(__('common.Name')); ?>

                                                    *</label>
                                                <input name="name" class="primary_input_field name"
                                                       placeholder="<?php echo e(__('product.Model Name')); ?>"
                                                       type="text" required>
                                                <span class="text-danger" id="edit_name_error"></span>
                                            </div>
                                        </div>

                                        <div class="col-xl-12">
                                            <div class="primary_input mb-25">
                                                <label class="primary_input_label"
                                                       for=""><?php echo e(__('common.Description')); ?></label>
                                                <input name="description" class="primary_input_field description"
                                                       placeholder="<?php echo e(__('product.Put Some Description')); ?>" type="text">
                                                <span class="text-danger" id="edit_description_error"></span>
                                            </div>
                                        </div>

                                        <div class="col-xl-12">
                                            <div class="primary_input">
                                                <label class="primary_input_label" for=""><?php echo e(__('common.Status')); ?>

                                                    *</label>
                                                <ul id="theme_nav" class="permission_list sms_list ">
                                                    <li>
                                                        <label data-id="bg_option"
                                                               class="primary_checkbox d-flex mr-12">
                                                            <input name="status" value="1" class="active" type="radio">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <p><?php echo e(__('common.Active')); ?></p>
                                                    </li>
                                                    <li>
                                                        <label data-id="color_option"
                                                               class="primary_checkbox d-flex mr-12">
                                                            <input name="status" value="0" class="de_active"
                                                                   type="radio">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <p><?php echo e(__('common.DeActive')); ?></p>
                                                    </li>
                                                </ul>
                                                <span class="text-danger" id="edit_status_error"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 text-center">
                                            <div class="d-flex justify-content-center pt_20">
                                                <button type="submit" class="primary-btn semi_large2  fix-gr-bg"
                                                        id="update_save_button_parent"><i
                                                        class="ti-check"></i><?php echo e(__('common.Update')); ?>

                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <?php echo $__env->make('backEnd.partials.delete_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </section>
    <?php $__env->startPush('scripts'); ?>
        <script type="text/javascript">
            $(function () {
                "use strict";
                var baseUrl = $('#app_base_url').val();
                $(document).ready(function () {

                    $("#modelTypeForm").on("submit", function (event) {
                        event.preventDefault();
                        let formData = $(this).serializeArray();
                        $.each(formData, function (key, message) {
                            $("#" + formData[key].name + "_error").html("");
                        });
                        $.ajax({
                            url: "<?php echo e(route("model.store")); ?>",
                            data: formData,
                            type: "POST",
                            success: function (response) {
                                $("#Item_Details").modal("hide");
                                $("#modelTypeForm").trigger("reset");
                                modelList();
                                toastr.success(response.message, trans('js.Success'));
                            },
                            error: function (error) {
                                if (error) {
                                    $.each(error.responseJSON.errors, function (key, message) {
                                        $("#" + key + "_error").html(message[0]);
                                    });
                                }
                            }

                        });
                    });


                    $("#model_list").on("click", ".edit_model_type", function (event) {
                        let id = $(this).data("value");
                        $.ajax({
                            url: "<?php echo e(url('/')); ?>" + "/product/model/" + id + "/edit",
                            type: "GET",
                            success: function (response) {
                                $(".edit_id").val(response.id);
                                $(".name").val(response.name);
                                $(".description").val(response.description);
                                if (response.status === 1) {
                                    $(".active").attr("checked", true);
                                } else {
                                    $(".de_active").attr("checked", true);
                                }
                            },
                            error: function (error) {
                                console.log(error);
                            }
                        });
                    });


                    $(document).on("submit", "#modelTypeEditForm", function (event) {
                        event.preventDefault();
                        let id = $(".edit_id").val();
                        let formData = $(this).serializeArray();
                        $.each(formData, function (key, message) {
                            $("#edit_" + formData[key].name + "_error").html("");
                        });
                        $.ajax({
                            url: "<?php echo e(url('/')); ?>" + "/product/model/" + id,
                            data: formData,
                            type: "PUT",
                            dataType: "JSON",
                            success: function (response) {
                                $("#Item_Edit").modal("hide");
                                $("#modelTypeEditForm").trigger("reset");
                                $(".active").attr("checked", false);
                                $(".de_active").attr("checked", false);
                                modelList();
                                toastr.success(response.message, trans('js.Success'));
                            },
                            error: function (error) {
                                if (error) {
                                    $.each(error.responseJSON.errors, function (key, message) {
                                        $("#edit_" + key + "_error").html(message[0]);
                                    });
                                }
                            }
                        });
                    });


                    $("#myInput").on("keyup", function (event) {

                        var search_keyword = $(this).val();
                        if (event.keyCode === 13) {
                            $.ajax({
                                url: "<?php echo e(route("model.get_list")); ?>" + '?search_keyword=' + search_keyword,
                                type: "GET",
                                dataType: "HTML",
                                success: function (response) {
                                    $("#model_list").html(response);
                                    CRMTableThreeReactive()
                                },
                                error: function (error) {
                                    console.log(error);
                                }
                            });
                        }
                    });


                });
            });

            function modelList() {
                "use strict";
                $.ajax({
                    url: "<?php echo e(route("model.get_list")); ?>",
                    type: "GET",
                    dataType: "HTML",
                    success: function (response) {
                        $("#model_list").html(response);
                        CRMTableThreeReactive()
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
            }

        </script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\projects\ERP\InfixBiz V3.3.2\resources\views/modules/product/model/model.blade.php ENDPATH**/ ?>