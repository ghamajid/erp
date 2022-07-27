<!-- information_form  -->
<div class="main-title mb-25">
    <h3 class="mb-0"><?php echo e(__('setting.Company Information')); ?></h3>
</div>
<form action="#" method="post" id="company_info_form">
    <div class="row">
        <div class="col-xl-6">
            <div class="primary_input mb-25">
                <label class="primary_input_label" for=""><?php echo e(__('setting.Company Name')); ?></label>
                <input class="primary_input_field" placeholder="Infix CRM" type="text" id="company_name" name="company_name" value="<?php echo e($setting->company_name); ?>">
            </div>
        </div>

        <div class="col-xl-6">
            <div class="primary_input mb-25">
                <label class="primary_input_label" for=""><?php echo e(__('common.Email')); ?></label>
                <input class="primary_input_field" placeholder="demo@infix.com" type="email" id="email" name="email" value="<?php echo e($setting->email); ?>">
            </div>
        </div>

        <div class="col-xl-6">
            <div class="primary_input mb-25">
                <label class="primary_input_label" for=""><?php echo e(__('retailer.Phone')); ?></label>
                <input class="primary_input_field" placeholder="-" type="text" id="phone" name="phone" value="<?php echo e($setting->phone); ?>">
            </div>
        </div>


        <div class="col-xl-6">
            <div class="primary_input mb-25">
                <label class="primary_input_label" for=""><?php echo e(__('setting.VAT Number')); ?></label>
                <input class="primary_input_field" placeholder="-" type="text" id="vat_number" name="vat_number" value="<?php echo e($setting->vat_number); ?>">
            </div>
        </div>

        <div class="col-md-12">
            <div class="primary_input mb-25">
                <label class="primary_input_label" for=""><?php echo e(__('setting.Address')); ?></label>
                <input class="primary_input_field" placeholder="-" type="text" id="address" name="address" value="<?php echo e($setting->address); ?>">
            </div>
        </div>

        <div class="col-xl-6">
            <div class="primary_input mb-25">
                <label class="primary_input_label" for=""><?php echo e(__('setting.Country')); ?></label>
                <input class="primary_input_field" placeholder="-" type="text" id="country_name" name="country_name" value="<?php echo e($setting->country_name); ?>">
            </div>
        </div>

        <div class="col-xl-6">
            <div class="primary_input mb-25">
                <label class="primary_input_label" for=""><?php echo e(__('setting.Zip Code')); ?></label>
                <input class="primary_input_field" placeholder="-" type="text" id="zip_code" name="zip_code" value="<?php echo e($setting->zip_code); ?>">
            </div>
        </div>

        <div class="col-xl-12">
            <div class="primary_input mb-25">
                <label class="primary_input_label" for=""><?php echo e(__('setting.Company Information')); ?></label>
            <textarea class="primary_textarea" placeholder="Company Info" id="company_info" cols="30" rows="10" name="company_info"><?php echo e($setting->company_info); ?></textarea>
            </div>
        </div>
    </div>
</form>
<div class="col-12 mb-10 pt_15">
    <div class="submit_btn text-center">
        <button class="primary_btn_large" onclick="company_info_form_submit()"> <i class="ti-check"></i> <?php echo e(__('common.Save')); ?></button>
    </div>
</div>
<!--/ information_form  -->
<?php /**PATH C:\projects\ERP\InfixBiz V3.3.2\resources\views/modules/setting/page_components/company_info_settings.blade.php ENDPATH**/ ?>