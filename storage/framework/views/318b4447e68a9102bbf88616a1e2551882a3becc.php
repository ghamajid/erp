<?php

    $account = false;
    $transfer = false;

    if(request()->is('account/*'))
    {
        $account = true;
    }
    if(request()->is('transfer/*'))
    {
        $transfer = true;
    }

?>
<?php if(permissionCheck('accounts')): ?>
    <li class="<?php echo e($account ?'mm-active' : ''); ?>">
        <a href="javascript:" class="has-arrow" aria-expanded="false">
            <div class="nav_icon_small">
                <span class="fa fa-bar-chart"></span>
            </div>
            <div class="nav_title">
                <span><?php echo e(__('account.Accounts')); ?></span>
            </div>
        </a>
        <ul>
            <?php if(permissionCheck('expenses.create')): ?>
                <li>
                    <a href="<?php echo e(route('expenses.create')); ?>"
                       class="<?php echo e(spn_active_link(['expenses.create'])); ?>"><?php echo e(__('inventory.Add Expense')); ?></a>
                </li>
            <?php endif; ?>
            <?php if(permissionCheck('expenses.index')): ?>
                <li>
                    <a href="<?php echo e(route('expenses.index')); ?>"
                       class="<?php echo e(spn_active_link(['expenses.index'])); ?>"><?php echo e(__('inventory.Expense Lists')); ?></a>
                </li>
            <?php endif; ?>

            <?php if(permissionCheck('income.create')): ?>
                <li>
                    <a href="<?php echo e(route('income.create')); ?>"
                       class="<?php echo e(spn_active_link(['income.create'])); ?>"><?php echo e(__('inventory.Add Income')); ?></a>
                </li>
            <?php endif; ?>
            <?php if(permissionCheck('income.index')): ?>
                <li>
                    <a href="<?php echo e(route('income.index')); ?>"
                       class="<?php echo e(spn_active_link(['income.index'])); ?>"><?php echo e(__('inventory.Income Lists')); ?></a>
                </li>
            <?php endif; ?>

            <?php if(permissionCheck('bank_accounts.index')): ?>
                <li>
                    <a href="<?php echo e(route('bank_accounts.index')); ?>"
                       class="<?php echo e(spn_active_link(['bank_accounts.index'])); ?>"><?php echo e(__('account.Bank Accounts')); ?></a>
                </li>
            <?php endif; ?>

            <?php if(permissionCheck('openning_balance.create')): ?>
                <li>
                    <a href="<?php echo e(route('openning_balance.create')); ?>"
                       class="<?php echo e(spn_active_link(['openning_balance.index'])); ?>"><?php echo e(__('account.Opening Balance')); ?></a>
                </li>
            <?php endif; ?>
            <?php if(permissionCheck('char_accounts.index')): ?>
                <li>
                    <a href="<?php echo e(route('char_accounts.index')); ?>"
                       class="<?php echo e(spn_active_link(['char_accounts.index'])); ?>"><?php echo e(__('account.Chart Of Accounts')); ?></a>
                </li>
            <?php endif; ?>

            <li class="<?php echo e(spn_nav_item_open(['transaction.index', 'statement.index', 'profit.index', 'account.balance.index', 'income_by_customer', 'expense_by_supplier', 'sale_tax'], 'mm-active')); ?>">
                <a href="javascript:" class="has-arrow" aria-expanded="false">
                    <div class="nav_title">
                        <span><?php echo e(__('account.Report')); ?></span>
                    </div>
                </a>
                <ul class="<?php echo e(request()->is('report/sales-report') || request()->is('report/sales-report/*') ? 'mm-collapse mm-show' : ''); ?>">


                    <?php if(permissionCheck('transaction.index')): ?>
                        <li>
                            <a href="<?php echo e(route('transaction.index')); ?>"
                               class="<?php echo e(spn_active_link(['transaction.index'])); ?>"><?php echo e(__('account.Transactions')); ?></a>
                        </li>
                    <?php endif; ?>

                    <?php if(permissionCheck('statement.index')): ?>
                        <li>
                            <a href="<?php echo e(route('statement.index')); ?>"
                               class="<?php echo e(spn_active_link(['statement.index'])); ?>"><?php echo e(__('account.Statement')); ?></a>
                        </li>
                    <?php endif; ?>

                    <?php if(permissionCheck('profit.index')): ?>
                        <li>
                            <a href="<?php echo e(route('profit.index')); ?>"
                               class="<?php echo e(spn_active_link(['profit.index'])); ?>"><?php echo e(__('report.Profit & Loss')); ?></a>
                        </li>
                    <?php endif; ?>

                    <?php if(permissionCheck('account.balance.index')): ?>
                        <li>
                            <a href="<?php echo e(route('account.balance.index')); ?>"
                               class="<?php echo e(spn_active_link(['account.balance.index'])); ?>"><?php echo e(__('account.Account Balance')); ?></a>
                        </li>
                    <?php endif; ?>

                    <?php if(permissionCheck('income_by_customer')): ?>
                        <li>
                            <a href="<?php echo e(route('income_by_customer')); ?>"
                               class="<?php echo e(spn_active_link(['income_by_customer'])); ?>"><?php echo e(__('account.Income By Customer')); ?></a>
                        </li>
                    <?php endif; ?>


                    <?php if(permissionCheck('expense_by_supplier')): ?>
                        <li>
                            <a href="<?php echo e(route('expense_by_supplier')); ?>"
                               class="<?php echo e(spn_active_link(['expense_by_supplier'])); ?>"><?php echo e(__('account.Expense By Supplier')); ?></a>
                        </li>
                    <?php endif; ?>

                    <?php if(permissionCheck('sale_tax')): ?>
                        <li>
                            <a href="<?php echo e(route('sale_tax')); ?>"
                               class="<?php echo e(spn_active_link(['sale_tax'])); ?>"><?php echo e(__('account.Sales Tax')); ?></a>
                        </li>
                    <?php endif; ?>


                </ul>
            </li>

        </ul>
    </li>
<?php endif; ?>

<?php if(permissionCheck('transfer_showroom.index')): ?>
    <li class="<?php echo e($transfer ?'mm-active' : ''); ?>">
        <a href="javascript:" class="has-arrow" aria-expanded="false">
            <div class="nav_icon_small">
                <span class="fa fa-bar-chart"></span>
            </div>
            <div class="nav_title">
                <span><?php echo e(__('account.Transfer')); ?></span>
            </div>
        </a>
        <ul>
            <?php if(permissionCheck('transfer_showroom.store')): ?>
                <li>
                    <a href="<?php echo e(route('transfer_showroom.create')); ?>" class="<?php echo e(spn_active_link(['transfer_showroom.create'])); ?>"><?php echo e(__('account.Make A Transfer')); ?></a>
                </li>
            <?php endif; ?>
            <?php if(permissionCheck('transfer_showroom.index')): ?>
                <li>
                    <a href="<?php echo e(route('transfer_showroom.index')); ?>" class="<?php echo e(spn_active_link(['transfer_showroom.index'])); ?>"><?php echo e(__('account.Transfered Lists')); ?></a>
                </li>
            <?php endif; ?>
        </ul>
    </li>
<?php endif; ?>
<?php /**PATH C:\projects\ERP\erp_github\resources\views/modules/account/menu.blade.php ENDPATH**/ ?>