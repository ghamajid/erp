<?php $__env->startSection('page-title', app('general_setting')->site_title .' | Settings'); ?>
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
                    <div class="box_header">
                        <div class="main-title d-flex">
                            <h3 class="mb-0 mr-30"><?php echo e(__('setting.Settings')); ?></h3>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="">
                        <div class="row">
                            <div class="col-lg-4">
                                <!-- myTab  -->
                                <div class="white_box_30px mb_30">
                                    <ul class="nav custom_nav" id="myTab" role="tablist">

                                        <?php if(permissionCheck('update_activation_status')): ?>
                                            <li class="nav-item">
                                                <a class="nav-link <?php echo e(permissionCheck('update_activation_status') && !isset($company) &&  !session()->has('invoice') && !session()->has('sms_template') && !session()->has('email_template') && !session()->has('g_set') && !session()->has('smtp_set') && !session()->has('sms_set') && !session()->has('background') ? 'active ' : ''); ?>"
                                                   id="activation-tab" data-toggle="tab" href="#Activation" role="tab"
                                                   aria-controls="home"
                                                   aria-selected="true"><?php echo e(__('setting.Activation')); ?></a>
                                            </li>
                                        <?php endif; ?>


                                        <?php if(permissionCheck('general_settings.index')): ?>
                                            <li class="nav-item">
                                                <a class="nav-link <?php if(session()->has('g_set')): ?> active show <?php endif; ?>"
                                                   id="General-tab" data-toggle="tab" href="#General" role="tab"
                                                   aria-controls="home"
                                                   aria-selected="true"><?php echo e(__('setting.General')); ?></a>
                                            </li>

                                        <?php endif; ?>

                                        <?php if(permissionCheck('company_information_update')): ?>

                                            <li class="nav-item">
                                                <a class="nav-link <?php echo e(isset($company) ? 'active show' : ''); ?>"
                                                   id="Company_Information-tab" data-toggle="tab"
                                                   href="#Company_Information" role="tab"
                                                   aria-controls="Company_Information"
                                                   aria-selected="false"><?php echo e(__('setting.Company Information')); ?></a>
                                            </li>
                                        <?php endif; ?>

                                        <?php if(permissionCheck('invoice_settings_update')): ?>

                                            <li class="nav-item">
                                                <a class="nav-link <?php echo e(session()->has('invoice') ? 'active show' : ''); ?>"
                                                   id="invoice-tab" data-toggle="tab" href="#invoice" role="tab"
                                                   aria-controls="invoice"
                                                   aria-selected="false"><?php echo e(__('setting.Invoice Settings')); ?></a>
                                            </li>
                                        <?php endif; ?>

                                        <?php if(permissionCheck('smtp_gateway_credentials_update')): ?>
                                            <li class="nav-item">
                                                <a class="nav-link <?php if(session()->has('smtp_set')): ?> active show <?php endif; ?>"
                                                   id="SMTP-tab" data-toggle="tab" href="#SMTP" role="tab"
                                                   aria-controls="contact"
                                                   aria-selected="false"><?php echo e(__('setting.SMTP')); ?></a>
                                            </li>
                                        <?php endif; ?>

                                        <?php if(permissionCheck('sms_gateway_credentials_update')): ?>
                                            <li class="nav-item">
                                                <a class="nav-link <?php if(session()->has('sms_set')): ?> active show <?php endif; ?>"
                                                   id="SMS-tab" data-toggle="tab" href="#SMS" role="tab"
                                                   aria-controls="contact"
                                                   aria-selected="false"><?php echo e(__('setting.SMS')); ?></a>
                                            </li>
                                        <?php endif; ?>
                                        <?php if(permissionCheck('template_update')): ?>
                                            <li class="nav-item">
                                                <a class="nav-link <?php if(session()->has('email_template')): ?> active show <?php endif; ?>"
                                                   id="Template-tab" data-toggle="tab" href="#TEMPLATE" role="tab"
                                                   aria-controls="contact"
                                                   aria-selected="false"><?php echo e(__('setting.Email Template')); ?></a>
                                            </li>
                                        <?php endif; ?>

                                        <?php if(permissionCheck('sms_template.index')): ?>
                                            <li class="nav-item">
                                                <a class="nav-link <?php if(session()->has('sms_template')): ?> active show <?php endif; ?>"
                                                   id="SMSTemplate-tab" data-toggle="tab" href="#TEMPLATESMS" role="tab"
                                                   aria-controls="contact"
                                                   aria-selected="false"><?php echo e(__('setting.SMS Template')); ?></a>
                                            </li>
                                        <?php endif; ?>



                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <!-- tab-content  -->
                                <div class="tab-content " id="myTabContent">
                                <?php if(permissionCheck('update_activation_status')): ?>
                                    <!-- General -->
                                        <div
                                            class="tab-pane fade white_box_30px <?php echo e(isset($company) || session()->has('invoice')  || session()->has('sms_template') || session()->has('g_set') || session()->has('email_template') || session()->has('smtp_set') || session()->has('sms_set') || session()->has('background') ? '' : 'active show'); ?>"
                                            id="Activation" role="tabpanel" aria-labelledby="Activation-tab">
                                            <?php echo $__env->make('setting::page_components.activation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        </div>
                                        <!-- General -->
                                <?php endif; ?>
                                <?php if(permissionCheck('general_settings.index')): ?>
                                    <!-- General -->
                                        <div
                                            class="tab-pane fade white_box_30px <?php if(session()->has('g_set')): ?> active <?php endif; ?> show"
                                            id="General" role="tabpanel" aria-labelledby="General-tab">
                                            <?php echo $__env->make('setting::page_components.general_settings', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        </div>
                                <?php endif; ?>
                                <?php if(permissionCheck('company_information_update')): ?>
                                    <!-- Company_Information  -->
                                        <div
                                            class="tab-pane fade white_box_30px <?php echo e(isset($company) ? 'active show' : ''); ?>"
                                            id="Company_Information" role="tabpanel"
                                            aria-labelledby="Company_Information-tab">
                                            <?php echo $__env->make('setting::page_components.company_info_settings', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        </div>
                                <?php endif; ?>
                                <?php if(permissionCheck('invoice_settings_update')): ?>
                                    <!-- invoice  -->
                                        <div
                                            class="tab-pane fade white_box_30px <?php echo e(session()->has('invoice') ? 'active show' : ''); ?>"
                                            id="invoice" role="tabpanel" aria-labelledby="invoice-tab">
                                            <?php echo $__env->make('setting::page_components.invoice_settings', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        </div>
                                <?php endif; ?>


                                <?php if(permissionCheck('smtp_gateway_credentials_update')): ?>
                                    <!-- SMTP  -->
                                        <div
                                            class="tab-pane fade white_box_30px  <?php if(session()->has('smtp_set')): ?> active show <?php endif; ?>"
                                            id="SMTP" role="tabpanel" aria-labelledby="SMTP-tab">
                                            <?php echo $__env->make('setting::page_components.smtp_setting', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        </div>
                                <?php endif; ?>
                                <?php if(permissionCheck('sms_gateway_credentials_update')): ?>
                                    <!-- SMS  -->
                                        <div
                                            class="tab-pane fade white_box_30px <?php if(session()->has('sms_set')): ?> active show <?php endif; ?>"
                                            id="SMS" role="tabpanel" aria-labelledby="SMS-tab">
                                            <?php echo $__env->make('setting::page_components.sms_settings', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        </div>
                                <?php endif; ?>
                                <?php if(permissionCheck('template_update')): ?>
                                    <!-- email template -->
                                        <div
                                            class="tab-pane fade white_box_30px <?php if(session()->has('email_template')): ?> active show <?php endif; ?>"
                                            id="TEMPLATE" role="tabpanel" aria-labelledby="Template-tab">
                                            <?php echo $__env->make('setting::page_components.email_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        </div>
                                <?php endif; ?>
                                <?php if(permissionCheck('sms_template.index')): ?>
                                    <!-- SMS Template -->
                                        <div
                                            class="tab-pane fade white_box_30px <?php if(session()->has('sms_template')): ?> active show <?php endif; ?>"
                                            id="TEMPLATESMS" role="tabpanel" aria-labelledby="Template-tab">
                                            <?php echo $__env->make('setting::page_components.sms_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        </div>
                                        <!-- SMS Template -->
                                    <?php endif; ?>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script type="text/javascript">
        $(document).ready(function () {
            smtp_form();
        });

        function update_active_status(el) {
            if (el.checked) {
                var status = 1;
            } else {
                var status = 0;
            }
            $.post('<?php echo e(route('update_activation_status')); ?>', {
                _token: '<?php echo e(csrf_token()); ?>',
                id: el.value,
                status: status
            }, function (data) {
                if (data == 1) {
                    toastr.success(trans('js.Updated Successfully'), trans('js.Success'));
                } else {
                    toastr.warning(trans('js.Something went wrong'),  trans('js.Error'));
                }
            });
        }

        function smtp_form() {
            var mail_mailer = $('#mail_mailer').val();
            if (mail_mailer == 'smtp') {
                $('#sendmail').hide();
                $('#smtp').show();
            } else if (mail_mailer == 'sendmail') {
                $('#smtp').hide();
                $('#sendmail').show();
            }
        }


        function company_info_form_submit() {
            var company_name = $('#company_name').val();
            var email = $('#email').val();
            var phone = $('#phone').val();
            var vat_number = $('#vat_number').val();
            var address = $('#address').val();
            var country_name = $('#country_name').val();
            var zip_code = $('#zip_code').val();
            var company_info = $('#company_info').val();
            $.post('<?php echo e(route('company_information_update')); ?>', {
                _token: '<?php echo e(csrf_token()); ?>',
                phone: phone,
                company_name: company_name,
                email: email,
                vat_number: vat_number,
                address: address,
                country_name: country_name,
                zip_code: zip_code,
                company_info: company_info
            }, function (data) {
                if (data == 1) {
                    toastr.success(trans('js.Updated Successfully'), trans('js.Success'));
                } else {
                    toastr.warning(data.error, trans('js.Error'));
                }
            });
        }

        $(document).on('change', '#use_color', function(){
            if (this.checked){
                $('#dashboard_bg_color_section').show();
                $('#dashboard_bg_image_section').hide();
            } else{
                $('#dashboard_bg_image_section').show();
                $('#dashboard_bg_color_section').hide();
            }
        });

    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('setting::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\projects\ERP\InfixBiz V3.3.2\resources\views/modules/setting/index.blade.php ENDPATH**/ ?>