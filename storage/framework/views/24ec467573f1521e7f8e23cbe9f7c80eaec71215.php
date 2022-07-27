<?php if(permissionCheck('project')): ?>
<?php if(count($user_favourite) > 0): ?>
<li>
    <a href="javascript:" class="has-arrow" aria-expanded="false">
        <div class="nav_icon_small">
            <span class="fa fa-users"></span>
        </div>
        <div class="nav_title">
            <span><?php echo e(trans('project::project.favourites')); ?></span>
        </div>
    </a>
    <ul>
        <?php $__currentLoopData = $user_favourite; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li>
            <a href="<?php echo e(route('project.show',$project->uuid)); ?>"> <span class="color_boxed mr_10" style="background: #<?php echo e(gv(my_project_configuration($project), 'color', '7F32FE')); ?>;"></span> <?php echo e(Str::limit($project->name, 20, '...')); ?></a>
        </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </ul>
</li>
<?php endif; ?>

<?php
    $nav = ['team.show', 'project.show'];
?>
<li class="<?php echo e(spn_nav_item_open($nav, 'mm-active')); ?>">
    <!-- Team  -->
    <a href="javascript:" class="has-arrow" aria-expanded="<?php echo e(spn_nav_item_open($nav, 'true')); ?>">
        <div class="nav_icon_small">
            <span class="fa fa-users"></span>
        </div>
        <div class="nav_title">
            <span><?php echo e(trans('project::project.project')); ?></span>
        </div>
    </a>
    <ul class="mm-collapse opcity_remove">
        <?php $__currentLoopData = $global_teams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $global_team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="position-relative ">
                <a href="<?php echo e(route('team.show', $global_team->id)); ?>" class="left_arrow_menu has-arrow "><?php echo e($global_team->name); ?></a>
                <div class="btn-group create_pro_btns">
                    <button type="button" class="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="ti-plus"></i>
                    </button>
                    <div class="dropdown-menu pm_dropdown_menu dropdown-menu-right">
                        <a href="<?php echo e(route('project.create', $global_team->id)); ?>" class="dropdown-item"><?php echo e(trans('project::project.create')); ?></a>
                    </div>
                </div>
                <div class="btn-group create_pro_btns main_sujj_more">
                    <button type="button" class="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="ti-more-alt"></i>
                    </button>
                    <div class="dropdown-menu pm_dropdown_menu dropdown-menu-right">
                        <a href="<?php echo e(route('user.team.remove', $global_team->id)); ?>" class="dropdown-item"><?php echo e(__('project::team.remove_me')); ?></a>
                    </div>
                </div>
                <ul class="mm-collapse <?php if((isset($model) and $model->getTable() == 'teams' and $model->id == $global_team->id) or  ( isset($model) and $model->getTable() == 'projects' and $model->team->id == $global_team->id)): ?> mm-show <?php endif; ?>">
                    <div class="team_memberList">

                        <!-- small_avater  -->

                        <?php $__currentLoopData = $global_team->allUsers(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="small_avater">
                                <img src="<?php echo e($user->ProfilePhotoUrl); ?>" alt="">
                                <div class="hover_img">
                                    <img src="<?php echo e($user->ProfilePhotoUrl); ?>" alt="">
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="">
                        <a class="btn-modal pointer" data-container="invite_modal"
                           data-href="<?php echo e(route('team.invite.create', $global_team->id)); ?>"><i class="ti-plus"></i> <?php echo e(trans('project::project.invite_people')); ?></a>
                    </div>

                    <?php $__currentLoopData = $global_team->projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <a href="<?php echo e(route('project.show', $project->uuid)); ?>" class="<?php echo e((isset($model) and $model->getTable() == 'projects' and $model->id == $project->id) ? 'active' : ''); ?>"> <span class="color_boxed mr_10" style="background: #<?php echo e(gv(my_project_configuration($project), 'color', '7F32FE')); ?>;"></span> <?php echo e(Str::limit($project->name, 20, '...')); ?></a>

                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </ul>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <li><a class="dropdown-item pl_32 btn-modal pointer" data-container="team_modal"
               data-href="<?php echo e(route('team.create')); ?>"><?php echo e(trans('project::team.create')); ?> </a></li>
    </ul>
</li>

<?php endif; ?>
<?php /**PATH C:\projects\ERP\InfixBiz V3.3.2\resources\views/modules/project/menu.blade.php ENDPATH**/ ?>