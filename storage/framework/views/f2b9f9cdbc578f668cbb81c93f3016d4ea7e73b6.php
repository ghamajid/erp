<?php $__env->startSection('mainContent'); ?>
    <section class="admin-visitor-area up_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row">
                <?php if(permissionCheck('backup.import')): ?>
                    <div class="col-lg-3">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="main-title">
                                    <h3 class="mb-30">
                                        <?php echo app('translator')->get('common.Upload SQL File'); ?>
                                    </h3>
                                </div>
                                <div class="mt-40 pt-30">
                                    <form method="POST" action="<?php echo e(route('backup.import')); ?>"
                                          enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>
                                        <div class="white-box">
                                            <div class="add-visitor">
                                                <div class="row  mt-25">
                                                    <div class="col-lg-12">

                                                        <div class="primary_input mb-15">
                                                            <div class="primary_file_uploader">
                                                                <input class="primary-input" type="text"
                                                                       id="placeholderFileOneName"
                                                                       placeholder="<?php echo e(__('common.Browse File')); ?>"
                                                                       readonly="">
                                                                <button class="" type="button">
                                                                    <label class="primary-btn small fix-gr-bg"
                                                                           for="document_file_1"><?php echo e(__("common.Browse")); ?> </label>
                                                                    <input type="file" class="d-none" name="db_file"
                                                                           id="document_file_1">
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mt-40">
                                                    <div class="col-lg-12 text-center">
                                                        <button class="primary-btn fix-gr-bg" data-toggle="tooltip"
                                                                title="">
                                                            <span class="ti-check"></span>
                                                            <?php echo e(__('common.Update')); ?>

                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 ">
                        <?php else: ?>
                            <div class="col-lg-12 ">
                                <?php endif; ?>


                                <div class="row">
                                    <div class="col-lg-12 no-gutters">

                                        <div class="box_header common_table_header">
                                            <div class="main-title d-md-flex">
                                                <h3 class="mb-0 mr-30 mb_xs_15px mb_sm_20px"><?php echo app('translator')->get('common.Database Backup List'); ?></h3>
                                                <?php if(permissionCheck('backup.store')): ?>
                                                    <ul class="pull-right">
                                                        <li><a class="primary-btn radius_30px mr-10 fix-gr-bg"
                                                               href="<?php echo e(route('backup.create')); ?>"><i
                                                                    class="ti-plus"></i><?php echo e(__('common.Generate New Backup')); ?>

                                                            </a></li>
                                                    </ul>
                                                <?php endif; ?>

                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <div class="row mt-10">
                                    <div class="col-lg-12 mt-10">

                                        <div class="QA_section QA_section_heading_custom check_box_table">
                                            <div class="QA_table ">
                                                <!-- table-responsive -->
                                                <div class="mt-30">
                                                    <table class="table Crm_table_active3">
                                                        <thead>
                                                        <?php echo $__env->make('backEnd.partials.alertMessagePageLevelAll', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                        <tr>
                                                            <th width="30%"><?php echo app('translator')->get('common.sl'); ?></th>
                                                            <th width="30%"><?php echo app('translator')->get('common.date'); ?></th>
                                                            <th width="40%"><?php echo app('translator')->get('common.file_name'); ?></th>
                                                            <th width="40%"><?php echo app('translator')->get('common.download'); ?></th>
                                                            <th width="40%"><?php echo app('translator')->get('common.action'); ?></th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>

                                                        <?php $__currentLoopData = $allBackup; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <tr>
                                                                <td><?php echo e(++$key); ?></td>
                                                                <td><?php echo e($value); ?></td>
                                                                <?php
                                                                    $file_name = str_replace(' ', '_', strtolower(app('general_setting')->site_title)). '_'. $value .'.sql'
                                                                ?>
                                                                <td><?php echo e($file_name); ?></td>
                                                                <td class="text-center">
                                                                    <?php if(!env('APP_SYNC')): ?>
                                                                        <?php if(permissionCheck('backup.download')): ?>
                                                                            <a href="<?php echo e(asset('database-backup/'.$value.'/'.$value.'-dump.sql')); ?>"
                                                                               download="<?php echo e($file_name); ?>"><i
                                                                                    class="fa fa-download"></i></a>
                                                                        <?php endif; ?>
                                                                    <?php else: ?>


                                                                        <span style="cursor: pointer;"
                                                                              data-toggle="tooltip"
                                                                              title="Restricted in demo mode"><i
                                                                                class="fa fa-download"></i></span>


                                                                    <?php endif; ?>

                                                                </td>

                                                                <td>
                                                                    <?php if(permissionCheck('backup.delete')): ?>

                                                                        <a href="<?php echo e(route('backup.delete', $value)); ?>"
                                                                           class="dropdown-item"
                                                                           type="button"><?php echo app('translator')->get('common.Delete'); ?></a>

                                                                    <?php endif; ?>
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
                    </div>
            </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\projects\ERP\InfixBiz V3.3.2\resources\views/modules/backup/backup/index.blade.php ENDPATH**/ ?>