<?php echo csrf_field(); ?>
<div class="col-xl-12">
    <div class="primary_input mb-25">
        <?php echo e(Form::label('name', __('project::project.name') , ['class' => 'primary_input_label required'])); ?>

        <?php echo e(Form::text('name', null , ["class" => "primary_input_field", "placeholder" => __('project::project.name'), "required"])); ?>

    </div>
</div>

<div class="col-xl-12">
    <div class="primary_input mb-25">
        <?php echo e(Form::label('description', __('project::project.description') , ['class' => 'primary_input_label click_to_show_description'])); ?>

        <?php echo e(Form::textarea('description', null , ["class" => "primary_textarea sr-only ", "placeholder" => __('project::project.description')])); ?>

    </div>
</div>

<div class="col-xl-12">
    <div class="tagInput_field mb-25">
        <?php echo e(Form::label('members', __('project::project.member') , ['class' => 'primary_input_label'])); ?>

        <?php echo e(Form::text('members', null , ["class" => "primary_input_field tag-input", "placeholder" => __('project::project.member'), "data-role" => "tagsinput"])); ?>

        <div id="user-suggestion-list"></div>
    </div>
</div>

<div class="col-lg-12 text-center">
    <div class="d-flex justify-content-center pt_20">
        <button type="submit" class="primary-btn semi_large2 fix-gr-bg submit" id="save_button_parent"><i class="ti-check"></i><?php echo e(__('project::project.save')); ?>

        </button>

        <button type="button" class="primary-btn semi_large2 fix-gr-bg submitting" disabled style="display: none;">
            <span class="ti-lock mr-2"></span>
            <?php echo e(__('project::project.saving')); ?>

        </button>

    </div>
</div>
<?php /**PATH C:\projects\ERP\InfixBiz V3.3.2\resources\views/modules/project/team/form/create-edit.blade.php ENDPATH**/ ?>