<?php $__env->startSection('mainContent'); ?>
    <?php if(session()->has('message-success')): ?>
        <div class="alert alert-success mb-25" role="alert">
            <?php echo e(session()->get('message-success')); ?>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php elseif(session()->has('message-danger')): ?>
        <div class="alert alert-danger">
            <?php echo e(session()->get('message-danger')); ?>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <div id="add_product">
        <section class="admin-visitor-area up_st_admin_visitor">
            <div class="container-fluid p-0">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="box_header">
                            <div class="main-title d-flex">
                                <h3 class="mb-0 mr-30"><?php echo e(__('common.Add Contact')); ?></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="white_box_50px box_shadow_white">
                            <!-- Prefix  -->
                            <form action="<?php echo e(route("add_contact.store")); ?>" method="POST" enctype="multipart/form-data" id="content_form">
                                <?php echo csrf_field(); ?>
                                <div class="row form">
                                    <div class="col-lg-4">
                                        <div class="primary_input mb-15">
                                            <label class="primary_input_label" for=""><?php echo e(__('common.Contact Type')); ?> *</label>
                                            <select class="primary_select mb-15 contact_type" name="contact_type">
                                                <option <?php echo e(old('contact_type', $contact_type) == 'Supplier' ? 'selected' : ''); ?> value="Supplier"><?php echo e(__('contact.Supplier')); ?></option>
                                                <option <?php echo e(old('contact_type', $contact_type) == 'Customer' ? 'selected' : ''); ?> value="Customer"><?php echo e(__('contact.Customer')); ?></option>
                                            </select>
                                            <span class="text-danger"><?php echo e($errors->first('contact_type')); ?></span>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="primary_input mb-15">
                                            <label class="primary_input_label" for=""> <?php echo e(__("common.Name")); ?> *</label>
                                            <input class="primary_input_field" name="name" placeholder="<?php echo e(__('contact.Name')); ?>" type="text" value="<?php echo e(old('name')); ?>" required>
                                            <span class="text-danger"><?php echo e($errors->first('name')); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="primary_input mb-15">
                                            <label class="primary_input_label" for=""><?php echo e(__('contact.Profile Picture')); ?></label>
                                            <div class="primary_file_uploader">
                                                <input class="primary-input" type="text" id="placeholderFileOneName" placeholder="<?php echo e(__('common.Browse file')); ?>" readonly>
                                                <button class="" type="button">
                                                    <label class="primary-btn small fix-gr-bg"
                                                           for="document_file_1"><?php echo e(__("common.Browse")); ?> </label>
                                                    <input type="file" class="d-none" name="file" id="document_file_1">
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="primary_input mb-15">
                                            <label class="primary_input_label"
                                                   for=""><?php echo e(__('common.Business Name')); ?></label>
                                            <input type="text" name="business_name" class="primary_input_field"
                                                   value="<?php echo e(old('business_name')); ?>">
                                            <span class="text-danger"><?php echo e($errors->first('business_name')); ?></span>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">

                                        <div class="primary_input mb-15">
                                            <label class="primary_input_label" for=""><?php echo e(__('common.Tax Number')); ?></label>
                                            <input type="text" name="tax_number" class="primary_input_field"
                                                   value="<?php echo e(old('tax_number')); ?>">
                                            <span class="text-danger"><?php echo e($errors->first('tax_number')); ?></span>
                                        </div>

                                    </div>
                                    <div class="col-lg-4">
                                        <div class="primary_input mb-15">
                                            <label class="primary_input_label" for=""><?php echo e(__('common.Opening Balance')); ?></label>
                                            <input type="text" name="opening_balance" class="primary_input_field"
                                                   value="<?php echo e(old('opening_balance') ?? 0); ?>">
                                            <span class="text-danger"><?php echo e($errors->first('opening_balance')); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="primary_input mb-15">
                                            <label class="primary_input_label" for=""><?php echo e(__('common.Pay Term')); ?> </label>
                                            <input type="text" name="pay_term" class="primary_input_field"
                                                   value="<?php echo e(old('pay_term')); ?>">
                                            <span class="text-danger"><?php echo e($errors->first('pay_term')); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="primary_input mb-15">
                                            <label class="primary_input_label" for=""><?php echo e(__('common.Pay Term Condition')); ?></label>
                                            <select class="primary_select mb-15" id="sub_category_list" name="pay_term_condition">
                                                <option value="Months">Months</option>
                                                <option value="Days">Days</option>
                                            </select>
                                            <span class="text-danger"><?php echo e($errors->first('pay_term_condition')); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 customer_type_section">
                                        <div class="primary_input mb-15">
                                            <label class="primary_input_label" for=""><?php echo e(__('common.Credit Limit')); ?></label>

                                            <input type="text" name="credit_limit" class="primary_input_field" value="<?php echo e(old('credit_limit')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 customer_type_section d-none">
                                        <div class="primary_input mb-15">
                                            <label class="primary_input_label" for=""><?php echo e(__('common.Customer Group')); ?></label>
                                            <select class="primary_select mb-15"
                                                    name="customer_group">
                                                <option><?php echo e(__('contact.None')); ?></option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="primary_input mb-15">
                                            <label class="primary_input_label" id="email_label"
                                                   for=""><?php echo e(__('common.Email')); ?> <?php if(app('general_setting')->contact_login): ?> * <?php endif; ?></label>
                                            <input type="text" name="email" class="primary_input_field"
                                                   value="<?php echo e(old('email')); ?>" <?php if(app('general_setting')->contact_login): ?> required <?php endif; ?>>
                                            <span class="text-danger"><?php echo e($errors->first('email')); ?></span>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">

                                        <div class="primary_input mb-15">
                                            <label class="primary_input_label"
                                                   for=""><?php echo e(__('common.Mobile')); ?> </label>
                                            <input type="text" name="mobile" class="primary_input_field"
                                                   value="<?php echo e(old('mobile')); ?>" >
                                            <span class="text-danger"><?php echo e($errors->first('mobile')); ?></span>
                                        </div>

                                    </div>

                                    <div class="col-lg-4">

                                        <div class="primary_input mb-15">
                                            <label class="primary_input_label"
                                                   for=""><?php echo e(__('common.Alternate Contact No')); ?></label>
                                            <input type="text" name="alternate_contact_no" class="primary_input_field"
                                                   value="<?php echo e(old('alternate_contact_no')); ?>">

                                        </div>

                                    </div>
                                    <?php if(app('general_setting')->first()->contact_login): ?>

                                        <div class="col-lg-4">

                                            <div class="primary_input mb-15">
                                                <label class="primary_input_label"
                                                       for="password"><?php echo e(__('common.Password')); ?> (<?php echo e(trans('Minimum 8 Letter')); ?>) *</label>
                                                <input type="text" id="password" name="password" required class="primary_input_field"
                                                       value="<?php echo e(old('password')); ?>">
                                                <span class="text-danger"><?php echo e($errors->first('password')); ?></span>

                                            </div>

                                        </div>
                                    <?php endif; ?>

                                    <div class="col-lg-4">

                                        <div class="primary_input mb-15">
                                            <label class="primary_input_label" for=""><?php echo e(__('contact.Country')); ?></label>
                                            <select class="primary_select mb-25" name="country_id" id="country_id">
                                                <option disabled selected><?php echo e(__('contact.Select Country')); ?></option>
                                                <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($country->id); ?>"><?php echo e($country->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>

                                    </div>

                                    <div class="col-lg-4">

                                        <div class="primary_input mb-15">
                                            <label class="primary_input_label" for="state_id"><?php echo e(__('contact.State')); ?></label>
                                            <select class="primary_select mb-25" name="state_id" id="state_id">
                                                <option disabled selected><?php echo e(__('setting.Select State')); ?></option>
                                            </select>
                                            <span class="text-danger"><?php echo e($errors->first('state_id')); ?></span>
                                        </div>

                                    </div>

                                    <div class="col-lg-4">

                                        <div class="primary_input mb-15">
                                            <label class="primary_input_label" for="city_id"><?php echo e(__('contact.City')); ?></label>
                                            <select class="primary_select mb-25" name="city_id" id="city_id">
                                                <option disabled selected><?php echo e(__('setting.Select City')); ?></option>
                                            </select>
                                            <span class="text-danger"><?php echo e($errors->first('city_id')); ?></span>
                                        </div>

                                    </div>

                                    <div class="col-lg-12">
                                        <div class="primary_input mb-15">
                                            <label class="primary_input_label" for=""> <?php echo e(__('common.Address')); ?></label>
                                            <input class="primary_input_field" name="address" placeholder="<?php echo e(__('common.Address')); ?>" type="text" value="<?php echo e(old('address')); ?>">
                                            <span class="text-danger"><?php echo e($errors->first('address')); ?></span>
                                        </div>
                                    </div>

                                    <div class="col-xl-12">
                                        <div class="primary_input mb-40">
                                            <label class="primary_input_label" for=""> <?php echo e(__('common.Note')); ?> </label>
                                            <textarea class="summernote" name="note"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="submit_btn text-center ">
                                        <button class="primary-btn semi_large2 fix-gr-bg" type="submit"><i
                                                class="ti-check"></i><?php echo e(__('common.Add Contact')); ?>

                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush("scripts"); ?>
    <script type="text/javascript">
        (function ($){
            "use strict";
            $(document).ready(function () {
                _componentAjaxChildLoad('#content_form', '#country_id', '#state_id', 'state')
                _componentAjaxChildLoad('#content_form', '#state_id', '#city_id', 'city')
                change_customer_to_supplier($(".contact_type").val())
                $(".contact_type").on('change', function () {
                    let type = $(this).val();
                    change_customer_to_supplier(type)
                });

                function change_customer_to_supplier(type){
                    if (type === "Customer") {
                        $(".customer_type_section").show();
                    } else {
                        $(".customer_type_section").hide();
                    }
                }

            });
        })(jQuery);
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\projects\ERP\InfixBiz V3.3.2\resources\views/modules/contact/contact/add_contact.blade.php ENDPATH**/ ?>