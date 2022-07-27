<?php $__env->startSection('mainContent'); ?>
    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-lg-12 mb_30 col-md-12">
                    <div class="box_header">
                        <div class="main-title d-md-flex">
                            <h3 class="mb-0"><?php echo e($language->name); ?> <?php echo e(__('common.Translation')); ?> </h3>
                        </div>
                    </div>
                    <div class="white-box">
                        <div class="row">
                            <div class="col-12">
                                <input type="hidden" name="id" id="id" value="<?php echo e($language->id); ?>">
                                <div class="primary_input mb_15">
                                    <label class="primary_input_label" for=""> <?php echo e(__('common.Choose File')); ?></label>
                                    <select name="file_name" id="file_name" class="primary_select mb-15"
                                            onchange="get_translate_file()">
                                        <option><?php echo e(__('setting.Select Translatable File')); ?></option>
                                        <?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                            <?php if(!(is_array($value))): ?>
                                                <?php
                                                    $file_name = basename($value, '.php')
                                                ?>
                                                <option value="<?php echo e($file_name); ?>"
                                                        <?php if($key == 0): ?> selected <?php endif; ?>><?php echo e($file_name); ?></option>

                                            <?php else: ?>
                                                <?php $__currentLoopData = $value; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php
                                                        $file_name = $key .'::'.basename($v, '.php')
                                                    ?>
                                                    <option value="<?php echo e($file_name); ?>"><?php echo e(ucwords($file_name)); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            <?php endif; ?>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12" id="translate_form">

                </div>
                <div class="row justify-content-center mt-30 demo_wait" style="display: none">
                    <img src="<?php echo e(asset('backEnd/img/demo_wait.gif')); ?>" alt="">
                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <script type="text/javascript">
        $('.select2').select2();
        $(document).ready(function () {
            $('.demo_wait').show();
            get_translate_file();
        });

        function get_translate_file() {
            var file_name = $('#file_name').val();
            var id = $('#id').val();
            $.post('<?php echo e(route('language.get_translate_file')); ?>', {
                _token: '<?php echo e(csrf_token()); ?>',
                file_name: file_name,
                id: id
            }, function (data) {
                $('#translate_form').html(data);
                $('.demo_wait').hide();
            });
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\projects\ERP\InfixBiz V3.3.2\resources\views/modules/localization/languages/translate_view.blade.php ENDPATH**/ ?>