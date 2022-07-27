<?php

    $hr = false;
    $attendance = false;
    $events = false;
    $location = false;

    if(request()->is('hr/*'))
    {
        $hr = true;
    }
    if(request()->is('attendance/*'))
    {
        $attendance = true;
    }
    if(request()->is('events') || request()->is('events/*'))
    {
        $events = true;
    }
    if(request()->is('location/*'))
    {
        $location = true;
    }

?>

<?php if(permissionCheck('location')): ?>
    <li class="<?php echo e($location ?'mm-active' : ''); ?>">
        <a href="javascript:;" class="has-arrow" aria-expanded="false">
            <div class="nav_icon_small">
                <span class="fas fa-location-arrow"></span>
            </div>
            <div class="nav_title">
                <span><?php echo e(__('inventory.Location')); ?></span>
            </div>
        </a>
        <ul class="<?php echo e(request()->is('inventory/showroom') || request()->is('inventory/warehouse') || request()->is('inventory/showroom/*') || request()->is('inventory/warehouse/*') ? 'mm-collapse mm-show' : ''); ?>">
            <?php if(permissionCheck('showroom.index')): ?>
                <li>
                    <a href="<?php echo e(route('showroom.index')); ?>"
                       class="<?php echo e(spn_active_link(['showroom.index', 'showroom.show'])); ?>"><?php echo e(__('inventory.Branch')); ?></a>
                </li>
            <?php endif; ?>
            <?php if(permissionCheck('warehouse.index')): ?>
                <li>
                    <a href="<?php echo e(route('warehouse.index')); ?>"
                       class="<?php echo e(spn_active_link(['warehouse.index', 'warehouse.show'])); ?>"><?php echo e(__('inventory.Warehouse')); ?></a>
                </li>
            <?php endif; ?>
        </ul>
    </li>
<?php endif; ?>
<?php if(permissionCheck('human_resource')): ?>
    <li class="<?php echo e($hr || $attendance|| $events ?'mm-active' : ''); ?>">
        <a href="javascript:;" class="has-arrow" aria-expanded="true">
            <div class="nav_icon_small">
                <span class="fas fa-users"></span>
            </div>
            <div class="nav_title">
                <span><?php echo e(__('common.Human Resource')); ?></span>
            </div>
        </a>
        <ul>
            <?php if(permissionCheck('staffs.index')): ?>
                <li>
                    <a href="<?php echo e(route('staffs.index')); ?>"
                       class="<?php echo e(request()->is('hr/staffs') || request()->is('hr/staffs/*') ? 'active' : ''); ?>"><?php echo e(__('common.Staff')); ?></a>
                </li>
            <?php endif; ?>
            <?php if(permissionCheck('permission.roles.index')): ?>
                <li>
                    <a href="<?php echo e(route('permission.roles.index')); ?>"
                       class="<?php echo e(request()->is('hr/role-permission/*') ? 'active' : '/*'); ?>"><?php echo e(__('role.Role')); ?></a>
                </li>
            <?php endif; ?>
            <?php if(permissionCheck('departments.index')): ?>
                <li>
                    <a href="<?php echo e(route('departments.index')); ?>"
                       class="<?php echo e(request()->is('hr/departments') ? 'active' : ''); ?>"><?php echo e(__('department.Department')); ?></a>
                </li>
            <?php endif; ?>
            <?php if(permissionCheck('attendances.index')): ?>
                <li>
                    <a href="<?php echo e(route('attendances.index')); ?>"
                       class="<?php echo e(request()->is('attendance/hr/attendance') ? 'active' : ''); ?>"><?php echo e(__('attendance.Attendance')); ?></a>
                </li>
            <?php endif; ?>
            <?php if(permissionCheck('attendance_report.index')): ?>
                <li>
                    <a href="<?php echo e(route('attendance_report.index')); ?>"
                       class="<?php echo e(request()->is('attendance/hr/attendance/*') ? 'active' : ''); ?>"><?php echo e(__('attendance.Attendance Report')); ?></a>
                </li>
            <?php endif; ?>
            <?php if(permissionCheck('events')): ?>
                <li>
                    <a href="<?php echo e(route('events.index')); ?>"
                       class="<?php echo e(request()->is('events') || request()->is('events/*') ? 'active' : ''); ?>"><?php echo e(__('event.Event')); ?></a>
                </li>
            <?php endif; ?>

            <?php if(permissionCheck('payroll.index')): ?>
                <li>
                    <a href="<?php echo e(route('payroll.index')); ?>"
                       class="<?php echo e(spn_active_link(['staff_search_for_payroll', 'payroll.index'])); ?>"><?php echo e(__('payroll.Payroll')); ?></a>
                </li>
            <?php endif; ?>
            <?php if(permissionCheck('payroll_reports.index')): ?>
                <li>
                    <a href="<?php echo e(route('payroll_reports.index')); ?>"
                       class="<?php echo e(spn_active_link(['payroll_reports.index', 'payroll_reports.search'])); ?>"><?php echo e(__('payroll.Payroll Reports')); ?></a>
                </li>
            <?php endif; ?>
            <?php if(permissionCheck('apply_loans')): ?>
                <li>
                    <a href="<?php echo e(route('apply_loans.index')); ?>"
                       class="<?php echo e(request()->is('hr/apply-loans') ? 'active' : ''); ?>"><?php echo e(__('common.Loan Apply')); ?></a>
                </li>
            <?php endif; ?>
            <?php if(permissionCheck('apply_loans.history')): ?>
                <li>
                    <a href="<?php echo e(route('apply_loans.history')); ?>"
                       class="<?php echo e(request()->is('hr/apply-loans/history') ? 'active' : ''); ?>"><?php echo e(__('setup.Loan History')); ?></a>
                </li>
            <?php endif; ?>
            <?php if(permissionCheck('apply_loans.loan_approval_index')): ?>
                <li>
                    <a href="<?php echo e(route('apply_loans.loan_approval_index')); ?>"
                       class="<?php echo e(request()->is('hr/loan-approval') ? 'active' : ''); ?>"><?php echo e(__('common.Loan Approval')); ?></a>
                </li>
            <?php endif; ?>
        </ul>
    </li>
<?php endif; ?>
<?php /**PATH C:\projects\ERP\InfixBiz V3.3.2\resources\views/backEnd/menu.blade.php ENDPATH**/ ?>