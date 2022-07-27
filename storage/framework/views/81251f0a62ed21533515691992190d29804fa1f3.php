<?php $__env->startSection('mainContent'); ?>
    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">
            <div class="col-12">
                <div class="box_header">
                    <div class="main-title d-flex">
                        <h3 class="mb-0 mr-30"><?php echo e(__("account.Cashbook")); ?></h3>
                    </div>
                </div>
            </div>
            <div class="white_box_50px p-5 mb-20">
                <div class="row justify-content-center">
                    <div class="col-md-6 mb-3">
                        <div class="white_box_50px box_shadow_white p-5">
                            <form class="" action="index.html" method="post">
                                <div class="primary_input mb-15">
                                    <label class="primary_input_label" for=""> <?php echo e(__('account.Opening Balance')); ?> </label>
                                    <input class="primary_input_field" name="narration" type="text" value="<?php echo e(single_price($total_transactions->where('type', 'Cr')->sum('amount') - $total_transactions->where('type', 'Dr')->sum('amount'))); ?>" readonly>
                                    <span class="text-danger"><?php echo e($errors->first('narration')); ?></span>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="white_box_50px box_shadow_white p-5">
                            <form class="" action="<?php echo e(route('cashbook.index')); ?>" method="GET">
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="primary_input mb-15">
                                            <label class="primary_input_label" for=""><?php echo e(__('account.Select Date')); ?></label>
                                            <div class="primary_datepicker_input">
                                                <div class="no-gutters input-right-icon">
                                                    <div class="col">
                                                        <div class="">
                                                            <?php if(isset($date)): ?>
                                                                <input placeholder="<?php echo e(__('common.Date')); ?>" class="primary_input_field primary-input date form-control" id="fromDate" type="text" name="date" value="<?php echo e(date('m/d/Y', strtotime($date))); ?>" autocomplete="off">
                                                            <?php else: ?>
                                                                <input placeholder="<?php echo e(__('common.Date')); ?>" class="primary_input_field primary-input date form-control" id="fromDate" type="text" name="date" value="" autocomplete="off">
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                    <button class="" type="button">
                                                        <i class="ti-calendar" id="start-date-icon"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <button class="primary_btn_2 mt-30" type="submit" width="100%"><?php echo e(__('attendance.Search')); ?></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="white_box_50px p-5">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="box_header common_table_header">
                            <div class="main-title d-md-flex">
                                <h3 class="mb-0 mr-30 mb_xs_15px mb_sm_20px"><?php echo e(__('account.Debit / Expense')); ?></h3>
                            </div>
                        </div>
                        <div class="QA_section QA_section_heading_custom check_box_table">
                            <div class="QA_table">
                                <div class="">
                                    <table class="table Crm_table_active2">
                                        <thead>
                                        <tr>
                                            <th scope="col"><?php echo e(__('account.Account Name')); ?></th>
                                            <th scope="col"><?php echo e(__('account.Narration')); ?></th>
                                            <th scope="col"><?php echo e(__('account.Amount')); ?></th>
                                        </tr>
                                        </thead>
                                        <?php if(isset($debit_transactions)): ?>
                                            <tbody>
                                                <?php $__currentLoopData = $debit_transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $debit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <th><?php echo e($debit->account->name); ?></th>
                                                        <td><?php echo e($debit->voucherable->narration); ?></td>
                                                        <td><?php echo e(single_price($debit->amount)); ?></td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <tfoot>
                                                    <td><?php echo e(__('common.Total')); ?></td>
                                                    <td></td>
                                                    <td><?php echo e(single_price($debit_transactions->sum('amount'))); ?></td>
                                                </tfoot>
                                            </tbody>
                                        <?php endif; ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="box_header common_table_header">
                            <div class="main-title d-md-flex">
                                <h3 class="mb-0 mr-30 mb_xs_15px mb_sm_20px"><?php echo e(__('account.Credit / Income')); ?></h3>
                            </div>
                        </div>
                        <div class="QA_section QA_section_heading_custom check_box_table">
                            <div class="QA_table">
                                <div class="">
                                    <table class="table Crm_table_active2">
                                        <thead>
                                        <tr>
                                            <th scope="col"><?php echo e(__('account.Account Name')); ?></th>
                                            <th scope="col"><?php echo e(__('account.Narration')); ?></th>
                                            <th scope="col"><?php echo e(__('account.Amount')); ?></th>
                                        </tr>
                                        </thead>
                                        <?php if(isset($credit_transactions)): ?>
                                            <tbody>
                                                <?php $__currentLoopData = $credit_transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $credit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <th><?php echo e($credit->account->name); ?></th>
                                                        <td><?php echo e($credit->voucherable->narration); ?></td>
                                                        <td><?php echo e(single_price($credit->amount)); ?></td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <tfoot>
                                                    <td><?php echo e(__('common.Total')); ?></td>
                                                    <td></td>
                                                    <td><?php echo e(single_price($credit_transactions->sum('amount'))); ?></td>
                                                </tfoot>
                                            </tbody>
                                        <?php endif; ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
                $till_now_balance = $total_transactions->where('type', 'Cr')->sum('amount') - $total_transactions->where('type', 'Dr')->sum('amount');
                $today_balance_in_hand = $credit_transactions->sum('amount') - $debit_transactions->sum('amount');
            ?>
            <div class="row justify-content-center">
                <div class="col-lg-12 mt-20">
                    <div class="QA_section QA_section_heading_custom check_box_table">
                        <div class="QA_table">
                            <div class="">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td><?php echo e(__('account.Opening Balance')); ?></td>
                                            <td class="text-right"><?php echo e(single_price($till_now_balance)); ?></td>
                                        </tr>
                                        <tr>
                                            <td><?php echo e(__('account.Today Total Income')); ?></td>
                                            <td class="text-right"><?php echo e(single_price($credit_transactions->sum('amount'))); ?></td>
                                        </tr>
                                        <tr>
                                            <td><?php echo e(__('account.Today Total Expense')); ?></td>
                                            <td class="text-right"><?php echo e(single_price($debit_transactions->sum('amount'))); ?></td>
                                        </tr>
                                        <tr>
                                            <td><?php echo e(__('account.Today Balance\Cash in Hand')); ?></td>
                                            <td class="text-right"><?php echo e(single_price($today_balance_in_hand)); ?></td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td><?php echo e(__('common.Today Closing Balance')); ?></td>
                                            <td class="text-right"><?php echo e(single_price($till_now_balance + $today_balance_in_hand)); ?></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\projects\ERP\InfixBiz V3.3.2\resources\views/modules/account/cashbook/index.blade.php ENDPATH**/ ?>