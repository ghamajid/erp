<?php $__env->startSection('mainContent'); ?>
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="box_header common_table_header">
                <div class="main-title d-md-flex">
                    <h3 class="mb-0 mr-30 mb_xs_15px mb_sm_20px"><?php echo e(__('setting.Theme Customization')); ?></h3>
                    <?php if(permissionCheck('themes.create')): ?>
                        <ul class="d-flex">
                            <li><a class="primary-btn radius_30px mr-10 fix-gr-bg"
                                   href="<?php echo e(route('themes.create')); ?>"><i
                                        class="ti-plus"></i><?php echo e(__('setting.Add New Theme')); ?></a>
                            </li>
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
                                <th scope="col"><?php echo e(__('common.Title')); ?></th>
                                <th scope="col"><?php echo e(__('common.Type')); ?></th>
                                <th scope="col"><?php echo e(__('setting.Colors')); ?></th>
                                <th scope="col"><?php echo e(__('setting.Background')); ?></th>
                                <th scope="col"><?php echo e(__('common.Status')); ?></th>
                                <th scope="col"><?php echo e(__('common.Action')); ?></th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php $__currentLoopData = $themes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $theme): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <tr>
                                    <td><?php echo e($theme->title); ?></td>
                                    <td><?php echo e(__('setting.'.$theme->color_mode)); ?></td>
                                    <td>
                                        <div class="row">
                                            <?php $__currentLoopData = $theme->colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                <div class="col-4">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="color_theme_list">
                                                            <span><?php echo e(__('setting.'.$color->name)); ?> </span>


                                                                    <span class="color_preview">:  <span class="bg-color"
                                                                                style="background: <?php echo e(@$color->pivot->value); ?>"></span><?php echo e(@$color->pivot->value); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>

                                    </td>
                                    <td>
                                        <?php if(@$theme->background_type == 'image'): ?>
                                            <div class="bg_img_previw" style="background-image : url(<?php echo e(asset($theme->background_image)); ?>)">

                                            </div>
                                        <?php else: ?>
                                            <div
                                                style="width: 100px; height: 50px; background-color:<?php echo e(@$theme->background_color); ?> "></div>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if(@$theme->is_default==1): ?>
                                            <span class="primary-btn small fix-gr-bg "> <?php echo app('translator')->get('common.Active'); ?> </span>
                                        <?php else: ?>
                                            <?php if(env('APP_SYNC')): ?>
                                                <span class="d-inline-block" tabindex="0" data-toggle="tooltip"
                                                      title="Disabled For Demo ">
                                                            <a class="primary-btn small tr-bg text-nowrap"
                                                               href="#"> <?php echo app('translator')->get('common.Make Default'); ?></a>
                                                </span>

                                            <?php else: ?>
                                                <?php if(permissionCheck('themes.default')): ?>
                                                    <a class="primary-btn small tr-bg text-nowrap"
                                                       href="<?php echo e(route('themes.default',@$theme->id)); ?>"> <?php echo app('translator')->get('common.Make Default'); ?> </a>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </td>
                                    <td>

                                        <div class="dropdown CRM_dropdown">
                                            <button class="btn btn-secondary dropdown-toggle" type="button"
                                                    id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false"> <?php echo e(__('common.select')); ?>

                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right"
                                                 aria-labelledby="dropdownMenu2">
                                                <?php if($theme->id != 1): ?>
                                                    <?php if(permissionCheck('themes.edit')): ?>
                                                        <a class="dropdown-item"
                                                           href="<?php echo e(route('themes.edit', $theme->id)); ?>"><?php echo app('translator')->get('common.Edit'); ?></a>
                                                    <?php endif; ?>
                                                <?php endif; ?>

                                                <?php if(permissionCheck('themes.copy')): ?>
                                                    <a class="dropdown-item"
                                                       type="button"
                                                       href="<?php echo e(route('themes.copy', $theme->id)); ?>"><?php echo app('translator')->get('setting.Clone Theme'); ?></a>
                                                <?php endif; ?>
                                                <?php if($theme->id != 1): ?>
                                                    <?php if(permissionCheck('themes.destroy')): ?>
                                                        <a class="dropdown-item"
                                                           type="button" data-toggle="modal"
                                                           data-target="#deletebackground_settingModal<?php echo e(@$theme->id); ?>"
                                                           href="#"><?php echo app('translator')->get('common.Delete'); ?></a>
                                                    <?php endif; ?>
                                                <?php endif; ?>

                                            </div>
                                        </div>

                                    </td>

                                    <div class="modal fade admin-query"
                                         id="deletebackground_settingModal<?php echo e(@$theme->id); ?>">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title"><?php echo app('translator')->get('common.Delete'); ?></h4>
                                                    <button type="button" class="close" data-dismiss="modal"> <i class="ti-close"></i>
                                                    </button>
                                                </div>

                                                <div class="modal-body">
                                                    <div class="text-center">
                                                        <h4><?php echo app('translator')->get('common.Are you sure to delete ?'); ?></h4>
                                                    </div>

                                                    <div class="mt-40 d-flex justify-content-between">
                                                        <button type="button" class="primary-btn tr-bg"
                                                                data-dismiss="modal"><?php echo app('translator')->get('common.Cancel'); ?>
                                                        </button>

                                                        <?php echo Form::open(['route' => ['themes.destroy', $theme->id], 'method' => 'delete']); ?>

                                                        <button type="submit"  class="primary-btn fix-gr-bg"><?php echo app('translator')->get('common.Delete'); ?></button>
                                                        <?php echo Form::close(); ?>



                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('setting::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\projects\ERP\InfixBiz V3.3.2\resources\views/modules/setting/themes/index.blade.php ENDPATH**/ ?>