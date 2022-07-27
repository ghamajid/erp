<div class="main-title mb-25">
    <h3 class="mb-0"><?php echo e(__('setting.General')); ?></h3>
</div>
<form action="<?php echo e(route('company_information_update')); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <input type="hidden" name="g_set" value="1">
    <div class="General_system_wrap_area">
        <div class="single_system_wrap">
            <div class="single_system_wrap_inner text-center">
                <div class="logo">
                    <span><?php echo e(__('setting.System Logo')); ?></span>
                </div>
                <div class="logo_img">
                    <img src="<?php echo e(asset(app('general_setting')->logo)); ?>" alt="">
                </div>
                <div class="update_logo_btn">
                    <button class="primary-btn small fix-gr-bg " type="button">
                        <input placeholder="Upload Logo" type="file" name="site_logo" id="site_logo" type="button">
                        <?php echo e(__('setting.Upload Logo')); ?>

                    </button>
                </div>
                <a href="<?php echo e(route('setting.remove', 'logo')); ?>" class="remove_logo"><?php echo e(__('setting.Remove')); ?></a>
            </div>
            <div class="single_system_wrap_inner text-center">
                <div class="logo">
                    <span><?php echo e(__('setting.Fav Icon')); ?></span>
                </div>

                <div class="logo_img">
                    <img src="<?php echo e(asset(app('general_setting')->favicon)); ?>" alt="">
                </div>

                <div class="update_logo_btn">
                    <button class="primary-btn small fix-gr-bg" type="button">
                        <input placeholder="Upload Logo" type="file" name="favicon_logo" id="favicon_logo">
                        <?php echo e(__('setting.Upload Fav Icon')); ?>

                    </button>
                </div>
                <a href="<?php echo e(route('setting.remove', 'favicon')); ?>" class="remove_logo"><?php echo e(__('setting.Remove')); ?></a>
            </div>
        </div>

        <div class="single_system_wrap">
            <div class="row">
                <div class="col-xl-12">
                    <div class="primary_input mb-25">
                        <label class="primary_input_label" for=""><?php echo e(__('setting.System Title')); ?></label>
                        <input class="primary_input_field" placeholder="Infix CRM" type="text" id="site_title"
                               name="site_title" value="<?php echo e($setting->site_title); ?>">
                    </div>
                </div>

                <div class="col-xl-12">
                    <div class="primary_input mb-25">
                        <label class="primary_input_label" for=""><?php echo e(__('setting.File Supported')); ?>

                            (<?php echo e(__('setting.Include Comma with each word')); ?>)</label>
                        <div class="tagInput_field">
                            <input class="sr-only" type="text" id="file_supported" name="file_supported"
                                   value="<?php echo e($setting->file_supported); ?>" data-role="tagsinput" class="sr-only">
                        </div>
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="primary_input mb-25">
                        <label class="primary_input_label" for=""><?php echo e(__('setting.System Default Language')); ?></label>
                        <select class="primary_select mb-25" name="language_id" id="language_id">
                            <?php $__currentLoopData = \Modules\Localization\Entities\Language::where('status',1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($language->id); ?>"
                                        <?php if(app('general_setting')->language->code == $language->code): ?> selected <?php endif; ?>><?php echo e($language->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="primary_input mb-25">
                        <label class="primary_input_label" for=""><?php echo e(__('setting.Date Format')); ?></label>
                        <select class="primary_select mb-25" name="date_format_id" id="date_format_id">
                            <?php $__currentLoopData = Illuminate\Support\Facades\Cache::get('date_format'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $dateFormat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($dateFormat->id); ?>"
                                        <?php if(app('general_setting')->dateFormat->id == $dateFormat->id): ?> selected <?php endif; ?>><?php echo e($dateFormat->normal_view); ?>


                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="primary_input mb-25">
                        <label class="primary_input_label" for=""><?php echo e(__('setting.System Default Currency')); ?></label>
                        <select class="primary_select mb-25" name="currency_id" id="currency">
                            <?php $__currentLoopData = \Modules\Setting\Model\Currency::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($currency->id); ?>"
                                        <?php if($setting->currency == $currency->id): ?> selected <?php endif; ?>><?php echo e($currency->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="primary_input mb-25">
                        <label class="primary_input_label" for=""><?php echo e(__('setting.Time Zone')); ?></label>
                        <select class="primary_select mb-25" name="time_zone_id" id="time_zone_id">
                            <?php $__currentLoopData = \Modules\Setting\Model\TimeZone::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $timeZone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($timeZone->id); ?>"
                                        <?php if($setting->time_zone_id == $timeZone->id): ?> selected <?php endif; ?>><?php echo e($timeZone->time_zone); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="primary_inpu mb-25">
                        <label class="primary_input_label" for=""><?php echo e(__('setting.Currency Symbol')); ?></label>
                        <input class="primary_input_field" placeholder="-" type="text" id="currency_symbol"
                               name="currency_symbol" value="<?php echo e($setting->currency_symbol); ?>" readonly>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="primary_input mb-25">
                        <label class="primary_input_label" for=""><?php echo e(__('setting.Currency Code')); ?></label>
                        <input class="primary_input_field" placeholder="-" type="text" id="currency_code"
                               name="currency_code" value="<?php echo e($setting->currency_code); ?>" readonly>
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="primary_input mb-25">
                        <label class="primary_input_label" for=""><?php echo e(__('setting.Preloader')); ?></label>
                        <input class="primary_input_field" placeholder="-" type="text" id="preloader" name="preloader"
                               value="<?php echo e($setting->preloader); ?>">
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="primary_input mb-25">
                        <label class="primary_input_label" for=""><?php echo e(__('setting.Default Payment')); ?></label>
                        <select class="primary_select mb-25" name="payment_gateway" id="time_zone_id">
                            <option value="1"
                                    <?php if($setting->payment_gateway == 1): ?> selected <?php endif; ?>><?php echo e(__('sale.Cash')); ?></option>
                            <option value="2"
                                    <?php if($setting->payment_gateway == 2): ?> selected <?php endif; ?>><?php echo e(__('sale.Bank')); ?></option>
                        </select>
                    </div>
                </div>

                <div class="col-xl-12">
                    <div class="primary_input mb-25">
                        <label class="primary_input_label" for=""><?php echo e(__('setting.Copywrite Text')); ?></label>
                        <input class="primary_input_field" placeholder="-" type="text" id="copyright_text"
                               name="copyright_text" value="<?php echo e($setting->copyright_text); ?>">
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="submit_btn text-center mt-4">
        <button class="primary_btn_large" type="submit"><i class="ti-check"></i> <?php echo e(__('common.Save')); ?></button>
    </div>
</form>
<?php /**PATH C:\projects\ERP\InfixBiz V3.3.2\resources\views/modules/setting/page_components/general_settings.blade.php ENDPATH**/ ?>