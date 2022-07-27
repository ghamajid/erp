<?php $__env->startSection('mainContent'); ?>

     <section class="mb-40">
        <?php if(permissionCheck('widget')): ?>
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="main-title">
                        <h3 class="mb-0"><?php echo e(__('dashboard.Quick Summery')); ?></h3>
                    </div>
                </div>
                <div class="col-md-8 col-lg-8 col-sm-6">
                    <div class="float-lg-right float-none pos_tab_btn justify-content-end">
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link filtering" data-type="today"
                                   href="javascript:void(0)"><?php echo e(__('dashboard.Today')); ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link filtering" data-type="week"
                                   href="javascript:void(0)"><?php echo e(__('dashboard.This Week')); ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link filtering" data-type="month"
                                   href="javascript:void(0)"><?php echo e(__('dashboard.This Month')); ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link filtering" data-type="year"
                                   href="javascript:void(0)"><?php echo e(__('dashboard.This Financial Year')); ?></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php if(permissionCheck('widget.total_purchase')): ?>
                    <div class="col-md-3 col-lg-3 col-sm-3">
                        <div class="white-box single-summery">
                            <div class="d-block mt-10">
                                <h3><?php echo e(__('dashboard.Total Purchase')); ?></h3>
                                <img class="demo_wait" height="60px" style="display: none"
                                     src="<?php echo e(asset('backEnd/img/loader.gif')); ?>" alt="">
                                 <h1 class="gradient-color2 total_purchase"><?php echo e(single_price($purchase_payments->sum('payable_amount'))); ?></h1>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if(permissionCheck('widget.total_sale')): ?>
                    <div class="col-md-3 col-lg-3 col-sm-3">
                        <div class="white-box single-summery">
                            <div class="d-block mt-10">
                                <div>
                                    <h3><?php echo e(__('dashboard.Total Sale')); ?></h3>
                                </div>
                                <img class="demo_wait" height="60px" style="display: none"
                                     src="<?php echo e(asset('backEnd/img/loader.gif')); ?>" alt="">
                                <h1 class="gradient-color2 total_sale"><?php echo e(single_price($salesTotalAmount - $sale_payments->sum('return_amount'))); ?></h1>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if(permissionCheck('widget.expense')): ?>
                    <div class="col-md-3 col-lg-3 col-sm-3">
                        <div class="white-box single-summery">
                            <div class="d-block mt-10">
                                <div>
                                    <h3><?php echo e(__('dashboard.Expenses')); ?></h3>
                                </div>
                                <img class="demo_wait" height="60px" style="display: none"
                                     src="<?php echo e(asset('backEnd/img/loader.gif')); ?>" alt="">
                                <h1 class="gradient-color2 expenses"><?php echo e(single_price($expenses)); ?></h1>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if(permissionCheck('widget.purchase_due')): ?>
                    <div class="col-md-3 col-lg-3 col-sm-3">
                        <div class="white-box single-summery">
                            <div class="d-block mt-10">
                                <div>
                                    <h3><?php echo e(__('dashboard.Purchase due')); ?></h3>
                                </div>
                                <img class="demo_wait" height="60px" style="display: none"
                                     src="<?php echo e(asset('backEnd/img/loader.gif')); ?>" alt="">
                                <h1 class="gradient-color2 purchase_due"><?php echo e(single_price( $purchase_payments->sum('payable_amount') - $purchase_due->sum('amount'))); ?></h1>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if(permissionCheck('widget.invoice_due')): ?>
                    <div class="col-md-3 col-lg-3 col-sm-3">
                        <div class="white-box single-summery">
                            <div class="d-block mt-10">
                                <div>
                                    <h3><?php echo e(__('dashboard.Invoice due')); ?></h3>
                                </div>
                                <img class="demo_wait" height="60px" style="display: none"
                                     src="<?php echo e(asset('backEnd/img/loader.gif')); ?>" alt="">
                                <h1 class="gradient-color2 invoice_due"><?php echo e(single_price($salesTotalAmount - $sale_due->sum('amount') + $sale_due->sum('return_amount'))); ?></h1>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if(permissionCheck('widget.total_in_bank')): ?>
                    <div class="col-md-3 col-lg-3 col-sm-3">
                        <div class="white-box single-summery">
                            <div class="d-block mt-10">
                                <div>
                                    <h3><?php echo e(__('dashboard.Total In Bank')); ?></h3>
                                </div>
                                <img class="demo_wait" height="60px" style="display: none"
                                     src="<?php echo e(asset('backEnd/img/loader.gif')); ?>" alt="">
                                <h1 class="gradient-color2 total_bank"><?php echo e(single_price($bank)); ?></h1>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if(permissionCheck('widget.total_in_cash')): ?>
                    <div class="col-md-3 col-lg-3 col-sm-3">
                        <div class="white-box single-summery">
                            <div class="d-block mt-10">
                                <div>
                                    <h3><?php echo e(__('dashboard.Total In Cash')); ?></h3>
                                </div>
                                <img class="demo_wait" height="60px" style="display: none"
                                     src="<?php echo e(asset('backEnd/img/loader.gif')); ?>" alt="">
                                <h1 class="gradient-color2"><?php echo e(single_price($cash)); ?></h1>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if(permissionCheck('widget.net_profit')): ?>
                    <div class="col-md-3 col-lg-3 col-sm-3">
                        <div class="white-box single-summery">
                            <div class="d-block mt-10">
                                <div>
                                    <h3><?php echo e(__('dashboard.Net Profit')); ?></h3>
                                </div>
                                <img class="demo_wait" height="60px" style="display: none"
                                     src="<?php echo e(asset('backEnd/img/loader.gif')); ?>" alt="">
                                <h1 class="gradient-color2 total_income"><?php echo e(single_price($income)); ?></h1>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php endif; ?>
        <div class="row mt-30">
            <?php if(permissionCheck('sale_statistics')): ?>
                <div class="col-12">
                    <div class="white_box chart_box_1 mb_30">
                        <div class="box_header common_table_header">
                            <div class="main-title d-flex">
                                <h3 class="mb-0 mr-25"><?php echo e(__('dashboard.Sale Statistics')); ?></h3>
                            </div>
                            <div class="box_header_right">
                                <div class="float-lg-right float-none pos_tab_btn justify-content-end">
                                    <ul class="nav">
                                        <li class="nav-item">
                                            <a class="nav-link active monthly"
                                               href="javascript:void(0)"><?php echo e(__('dashboard.Monthly')); ?></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link yearly"
                                               href="javascript:void(0)"><?php echo e(__('dashboard.Yearly')); ?></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div id="monthly"><?php echo $monthly_sales->container(); ?></div>
                        <div id="yearly"><?php echo $yearly_sales->container(); ?></div>
                    </div>
                </div>
            <?php endif; ?>
            <?php if(permissionCheck('profit_statistics')): ?>
                <div class="col-12">
                    <div class="white_box chart_box_1 mb_30">
                        <div class="box_header common_table_header">
                            <div class="main-title d-flex">
                                <h3 class="mb-0 mr-25"><?php echo e(__('dashboard.Profit Statistics')); ?></h3>
                            </div>
                            <div class="box_header_right">
                                <div class="float-lg-right float-none pos_tab_btn justify-content-end">
                                    <ul class="nav">
                                        <li class="nav-item">
                                            <a class="nav-link active daily_profit"
                                               href="javascript:void(0)"><?php echo e(__('dashboard.Daily')); ?></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link weekly_profit"
                                               href="javascript:void(0)"><?php echo e(__('dashboard.Weekly')); ?></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link monthly_profit"
                                               href="javascript:void(0)"><?php echo e(__('dashboard.Monthly')); ?></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link yearly_profit"
                                               href="javascript:void(0)"><?php echo e(__('dashboard.Yearly')); ?></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div id="daily_profit"><?php echo $daily_profit->container(); ?></div>
                        <div id="weekly_profit"><?php echo $weekly_profit->container(); ?></div>
                        <div id="monthly_profit"><?php echo $monthly_profit->container(); ?></div>
                        <div id="yearly_profit"><?php echo $yearly_profit->container(); ?></div>
                    </div>
                </div>
            <?php endif; ?>
            <?php if(permissionCheck('recent_activity')): ?>
                <div class="col-xl-6">
                    <div class="white_box_30px mb_30">
                        <div class="box_header common_table_header ">
                            <div class="main-title d-md-flex">
                                <h3 class="mb-0 mr-30 mb_xs_15px mb_sm_20px"><?php echo e(__('dashboard.Recent Activity')); ?></h3>
                            </div>
                            <div class="box_header_right">
                                <div class="float-lg-right float-none pos_tab_btn justify-content-end">
                                    <ul class="nav">
                                        <li class="nav-item">
                                            <a class="nav-link active sale"
                                               href="javascript:void(0)"><?php echo e(__('sale.Sale')); ?></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link purchase"
                                               href="javascript:void(0)"><?php echo e(__('purchase.Purchase')); ?></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="QA_section3 QA_section_heading_custom th_padding_l0 sales_table">
                            <div class="QA_table">
                                <!-- table-responsive -->
                                <div class="table-responsive">
                                    <table class="table  pt-0 shadow_none pb-0 ">
                                        <thead>
                                            <tr>
                                            <th scope="col"><?php echo e(__('sale.Invoice No')); ?></th>
                                            <th scope="col"><?php echo e(__('sale.Date')); ?></th>
                                            <th scope="col"><?php echo e(__('showroom.Branch')); ?></th>
                                            <th scope="col"><?php echo e(__('sale.Amount')); ?></th>
                                            <th scope="col"><?php echo e(__('sale.Customer')); ?></th>
                                            <th scope="col"><?php echo e(__('common.Status')); ?></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $sales->take(10); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><a onclick="getDetails(<?php echo e($sale->id); ?>)"><?php echo e($sale->invoice_no); ?></a></td>
                                                <td class="nowrap"><?php echo e($sale->date); ?></td>
                                                <td><?php echo e($sale->saleable->name); ?></td>
                                                <td><?php echo e(single_price($sale->payable_amount)); ?></td>
                                                <td><?php echo e($sale->customer->name); ?></td>
                                                <?php if($sale->status == 0): ?>
                                                    <td><a href="javascript:void(0)"
                                                           class="badge_2"><?php echo e(__('sale.Unpaid')); ?></a></td>
                                                <?php elseif($sale->status == 1): ?>
                                                    <td><a href="javascript:void(0)" class="badge_1"><?php echo e(__('sale.Paid')); ?></a>
                                                    </td>
                                                <?php elseif($sale->status == 2): ?>
                                                    <td><a href="javascript:void(0)"
                                                           class="badge_2"><?php echo e(__('sale.Partial')); ?></a></td>
                                                <?php endif; ?>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <?php if(count($sales) > 10): ?>
                                <div class="row justify-content-center mt-10">
                                    <a href="<?php echo e(route('sale.index')); ?>"
                                       class="primary-btn mr-2 fix-gr-bg"><?php echo e(__('dashboard.See All')); ?></a>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="QA_section3 QA_section_heading_custom th_padding_l0 purchase_table">
                            <div class="QA_table">
                                <!-- table-responsive -->
                                <div class="table-responsive">
                                    <table class="table  pt-0 shadow_none pb-0 ">
                                        <thead>
                                            <tr>
                                            <th scope="col"><?php echo e(__('sale.Invoice No')); ?></th>
                                            <th scope="col"><?php echo e(__('sale.Date')); ?></th>
                                            <th scope="col"><?php echo e(__('showroom.Branch')); ?></th>
                                            <th scope="col"><?php echo e(__('sale.Amount')); ?></th>
                                            <th scope="col"><?php echo e(__('report.Supplier')); ?></th>
                                            <th scope="col"><?php echo e(__('common.Status')); ?></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $purchases->take(10); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $purchase): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><a href="#"><?php echo e($purchase->invoice_no); ?></a></td>
                                                <td class="nowrap"><?php echo e($purchase->date); ?></td>
                                                <td><?php echo e($purchase->purchasable->name); ?></td>
                                                <td><?php echo e(single_price($purchase->payable_amount)); ?></td>
                                                <td><?php echo e($purchase->supplier->name); ?></td>
                                                <?php if($purchase->is_paid == 0): ?>
                                                    <td><a href="javascript:void(0)"
                                                           class="badge_2"><?php echo e(__('sale.Unpaid')); ?></a></td>
                                                <?php elseif($purchase->is_paid == 2): ?>
                                                    <td><a href="javascript:void(0)" class="badge_1"><?php echo e(__('sale.Paid')); ?></a>
                                                    </td>
                                                <?php elseif($purchase->is_paid == 1): ?>
                                                    <td><a href="javascript:void(0)"
                                                           class="badge_2"><?php echo e(__('sale.Partial')); ?></a></td>
                                                <?php endif; ?>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <?php if(count($purchases) > 10): ?>
                                <div class="row justify-content-center mt-10">
                                    <a href="<?php echo e(route('purchase_order.index')); ?>"
                                       class="primary-btn mr-2 fix-gr-bg"><?php echo e(__('dashboard.See All')); ?></a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php if(permissionCheck('showroom_wise_product_qty')): ?>
                <div class="col-lg-6 col-xl-6">
                    <div class="white_box_30px mb_30">
                        <div class="box_header common_table_header mb-40 flex-wrap">
                            <div class="main-title d-md-flex">
                                <h3 class="mb-0 mr-30 mb_xs_15px mb_sm_20px"><?php echo e(__('dashboard.Branch Wise Product Quantity')); ?></h3>
                            </div>
                        </div>
                        <div><?php echo $product_quantity->container(); ?></div>
                    </div>
                </div>
            <?php endif; ?>
            <?php if(permissionCheck('payment_due_list')): ?>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="white_box_30px mb_30">
                        <div class="box_header common_table_header ">
                            <div class="main-title d-md-flex">
                                <h3 class="mb-0 mr-30 mb_xs_15px mb_sm_20px"><?php echo e(__('dashboard.Payment Due List')); ?></h3>
                            </div>
                        </div>
                        <div class="QA_section3 QA_section_heading_custom th_padding_l0 ">
                            <div class="QA_table">
                                <!-- table-responsive -->
                                <div class="table-responsive">
                                    <table class="table  pt-0 shadow_none pb-0 ">
                                        <thead>
                                            <tr>
                                            <th scope="col"><?php echo e(__('sale.Invoice No')); ?></th>
                                            <th scope="col"><?php echo e(__('sale.Date')); ?></th>
                                            <th scope="col"><?php echo e(__('showroom.Branch')); ?></th>
                                            <th scope="col"><?php echo e(__('sale.Payable Amount')); ?></th>
                                            <th scope="col"><?php echo e(__('sale.Customer')); ?></th>
                                            <th scope="col"><?php echo e(__('sale.Due')); ?></th>
                                        </tr>
                                        </thead>
                                       <tbody>
                                            <?php $__currentLoopData = $dues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><a onclick="payment_detail(<?php echo e($sale->id); ?>)"><?php echo e($sale->invoice_no); ?></a></td>
                                                <td class="nowrap"><?php echo e($sale->date); ?></td>
                                                <td><?php echo e($sale->saleable->name); ?></td>
                                                <td><?php echo e(single_price($sale->payable_amount)); ?></td>
                                                <td><?php echo e($sale->customer->name); ?></td>
                                                <td><?php echo e(single_price($sale->payable_amount - $sale->payments->sum('amount'))); ?></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                       </tbody>
                                    </table>
                                </div>
                            </div>
                            <?php if(count($dues) > 10): ?>
                                <div class="row justify-content-center mt-10">
                                    <a href="<?php echo e(route('sale.due.list')); ?>"
                                       class="primary-btn mr-2 fix-gr-bg"><?php echo e(__('dashboard.See All')); ?></a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php if(permissionCheck('stock_alert_list')): ?>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="white_box_30px mb_30">
                        <div class="box_header common_table_header ">
                            <div class="main-title d-md-flex">
                                <h3 class="mb-0 mr-30 mb_xs_15px mb_sm_20px"><?php echo e(__('dashboard.Stock Alert List')); ?></h3>
                            </div>
                        </div>
                        <div class="QA_section3 QA_section_heading_custom th_padding_l0 ">
                            <div class="QA_table">
                                <!-- table-responsive -->
                                <div class="table-responsive">
                                    <table class="table pt-0 shadow_none pb-0 ">
                                        <thead>
                                            <tr>
                                            <td scope="col"><?php echo e(__('common.Image')); ?></td>
                                            <td scope="col"><?php echo e(__('dashboard.Product Sku')); ?></td>
                                            <td scope="col"><?php echo e(__('showroom.Branch')); ?></td>
                                            <td scope="col"><?php echo e(__('dashboard.Stock')); ?></td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $stock_alerts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stock): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td>
                                                    <img src="<?php echo e(asset(@$stock->productSku->product->image_source ?? 'backEnd/img/no_image.png')); ?>"
                                                         width="50px" alt="<?php echo e(@$stock->productSku->product->product_name); ?>">
                                                </td>
                                                <td><?php echo e(@$stock->productSku->sku); ?></td>
                                                <td><?php echo e(@$stock->houseable->name); ?></td>
                                                <td><?php echo e($stock->stock); ?> <?php echo e(@$stock->productSku->product->unit_type->name); ?></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <?php if(count($stock_alerts) > 10): ?>
                                <div class="row justify-content-center mt-10">
                                    <a href="<?php echo e(route('purchase.suggest')); ?>"
                                       class="primary-btn mr-2 fix-gr-bg"><?php echo e(__('dashboard.See All')); ?></a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <div class="col-lg-<?php echo e(permissionCheck('to_do_list') ? 7 : 12); ?>">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="main-title">
                            <h3 class="mb-20"><?php echo e(__('dashboard.Calendar')); ?></h3>
                        </div>
                    </div>
                </div>
                <div class="white-box">
                    <div class='common-calendar'>
                    </div>
                </div>
            </div>
            <?php if(permissionCheck('to_do_list')): ?>
                <div class="col-<?php echo e(permissionCheck('to_do_list') ? 5 : 6); ?>">
                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-sm-6">
                            <div class="main-title">
                                <h3 class="mb-30"><?php echo app('translator')->get('todo.to_do_list'); ?></h3>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-6 text-right">
                            <a href="#" data-toggle="modal" class="primary-btn small fix-gr-bg"
                               data-target="#add_to_do"
                               title="Add To Do" data-modal-size="modal-md">
                                <span class="ti-plus pr-2"></span>
                                <?php echo app('translator')->get('event.Add'); ?>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="white-box school-table">
                                <div class="row to-do-list mb-20">
                                    <div class="col-md-12 d-flex justify-content-between">
                                        <button class="primary-btn small fix-gr-bg"
                                                id="toDoList"><?php echo app('translator')->get('todo.incomplete'); ?></button>
                                        <button class="primary-btn small tr-bg"
                                                id="toDoListsCompleted"><?php echo app('translator')->get('todo.completed'); ?></button>
                                    </div>
                                </div>

                                <input type="hidden" id="url" value="<?php echo e(url('/')); ?>">


                                <div class="toDoList">
                                    <?php if(count(@$toDos->where('status',0)) > 0): ?>

                                        <?php $__currentLoopData = $toDos->where('status',0); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $toDoList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="single-to-do d-flex justify-content-between toDoList"
                                                 id="to_do_list_div<?php echo e(@$toDoList->id); ?>">
                                                <div>
                                                    <input type="checkbox" id="midterm<?php echo e(@$toDoList->id); ?>"
                                                           class="common-checkbox complete_task" name="complete_task"
                                                           value="<?php echo e(@$toDoList->id); ?>">

                                                    <label for="midterm<?php echo e(@$toDoList->id); ?>">

                                                        <input type="hidden" id="id" value="<?php echo e(@$toDoList->id); ?>">
                                                        <input type="hidden" id="url" value="<?php echo e(url('/')); ?>">
                                                        <h5 class="d-inline"><?php echo e(@$toDoList->title); ?></h5>
                                                        <p class="ml-35">

                                                            <?php echo e($toDoList->date); ?>


                                                        </p>
                                                    </label>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                        <div class="single-to-do d-flex justify-content-between">
                                            <?php echo app('translator')->get('todo.no_do_lists_assigned_yet'); ?>
                                        </div>

                                    <?php endif; ?>
                                </div>


                                <div class="toDoListsCompleted">
                                    <?php if(count(@$toDos->where('status',1))>0): ?>

                                        <?php $__currentLoopData = $toDos->where('status',1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $toDoListsCompleted): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                            <div class="single-to-do d-flex justify-content-between"
                                                 id="to_do_list_div<?php echo e(@$toDoListsCompleted->id); ?>">
                                                <div>
                                                    <h5 class="d-inline"><?php echo e(@$toDoListsCompleted->title); ?></h5>
                                                    <p class="">

                                                        <?php echo e(@$toDoListsCompleted->date); ?>


                                                    </p>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                        <div class="single-to-do d-flex justify-content-between">
                                            <?php echo app('translator')->get('todo.no_do_lists_assigned_yet'); ?>
                                        </div>

                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            <?php endif; ?>

            <div class="modal fade admin-query" id="add_to_do">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title"><?php echo e(trans('todo.Add To Do')); ?></h4>
                            <button type="button" class="close" data-dismiss="modal">
                                <i class="ti-close"></i>
                            </button>
                        </div>

                        <div class="modal-body">
                            <div class="container-fluid">
                                <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'to_dos.store',
                                'method' => 'POST', 'enctype' => 'multipart/form-data', 'onsubmit' => 'return validateToDoForm()'])); ?>


                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="row mt-25">
                                            <div class="col-lg-12" id="sibling_class_div">
                                                <div class="primary_input mb-15">
                                                    <label class="primary_input_label"
                                                           for=""><?php echo e(__('common.Title')); ?>*</label>
                                                    <input type="text" class="primary_input_field"
                                                           placeholder="<?php echo e(__('common.Title')); ?>" name="title"
                                                           value="<?php echo e(old('title')); ?>">
                                                    <span class="text-danger"><?php echo e($errors->first('title')); ?></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mt-30">
                                            <div class="col-lg-12" id="">
                                                <label class="primary_input_label" for=""><?php echo e(__('sale.Date')); ?> *</label>
                                            <div class="primary_datepicker_input">
                                                <div class="no-gutters input-right-icon">
                                                    <div class="col">
                                                        <div class="">
                                                            <input placeholder="Date"
                                                                   class="primary_input_field primary-input date form-control"
                                                                   id="startDate" type="text" name="date"
                                                                   value="<?php echo e(date('m/d/Y')); ?>" autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <button class="" type="button">
                                                        <i class="ti-calendar" id="start-date-icon"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 text-center">
                                            <div class="mt-40 d-flex justify-content-between">
                                                <button type="button" class="primary-btn tr-bg"
                                                        data-dismiss="modal"><?php echo e(__('common.Cancel')); ?></button>
                                                <input class="primary-btn fix-gr-bg" type="submit" value="save">
                                            </div>
                                        </div>
                                    </div>
                                    <?php echo e(Form::close()); ?>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div id="fullCalModal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 id="modalTitle" class="modal-title"></h4>
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true"><i class="ti-close"></i></span>
                                <span class="sr-only">close</span></button>
                        </div>
                        <div class="modal-body text-center">
                            <img src="" alt="There are no image" id="image" height="150" width="auto" style="display: none">
                            <div id="modalBody"></div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <div id="getDetails">

    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('frontend/vendors/chartlist/Chart.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/js/active_chart.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/charts_loader.js')); ?>"></script>
    <?php if(permissionCheck('sale_statistics')): ?>
    <?php echo $monthly_sales->script(); ?>

    <?php echo $yearly_sales->script(); ?>

    <?php endif; ?>
    <?php if(permissionCheck('profit_statistics')): ?>
    <?php echo $daily_profit->script(); ?>

    <?php echo $weekly_profit->script(); ?>

    <?php echo $monthly_profit->script(); ?>

    <?php echo $yearly_profit->script(); ?>

    <?php endif; ?>
    <?php if(permissionCheck('showroom_wise_product_qty')): ?>
    <?php echo $product_quantity->script(); ?>

    <?php endif; ?>
    <script>

        function getDetails(el){
            $.post('<?php echo e(route('get_sale_details')); ?>', {_token:'<?php echo e(csrf_token()); ?>', id:el}, function(data){
                $('#getDetails').html(data);
                $('#sale_info_modal').modal('show');
            });
        }
        function payment_detail(el) {
            $.post('<?php echo e(route('sale.get_sale_payment_details')); ?>', {_token: '<?php echo e(csrf_token()); ?>', id: el}, function (data) {
                $('#getDetails').html(data);
                $('#payments').modal('show');
            });
        }

        $(document).ready(function(){
        	setTimeout(function () {
	            $('#yearly').fadeOut(500);
	            $('#weekly_profit').fadeOut(500);
	            $('#monthly_profit').fadeOut(500);
	            $('#yearly_profit').fadeOut(500);
	            $('.purchase_table').fadeOut(500);
	        }, 1000);
        });

        if ($('.common-calendar').length) {
            $('.common-calendar').fullCalendar({
                locale: LANG,
                rtl : RTL,
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                views: {
                    month: { columnHeaderFormat: 'ddd', displayEventEnd: true, eventLimit: 3 },
                    week: { columnHeaderFormat: 'ddd DD', titleRangeSeparator: ' \u2013 ' },
                    day: { columnHeaderFormat: 'dddd' },
                },
                eventClick: function (event, jsEvent, view) {
                    $('#modalTitle').html(event.title);
                    $('#modalBody').html(event.description);
                    if(event.url){
                        $('#image').show();
                        $('#image').attr('src', event.url);
                    } else{
                        $('#image').hide();
                    }

                    $('#fullCalModal').modal();
                    return false;
                },
                height: 650,
                events: <?php echo json_encode($calendar_events);?> ,
            });
        }

        $(document).on('click', '.monthly', function () {
            $(this).addClass('active');
            $('.yearly').removeClass('active');
            $("#yearly").fadeOut(500);
            $('#monthly').fadeIn(500);
        });
        $(document).on('click', '.yearly', function () {
            $(this).addClass('active');
            $('.monthly').removeClass('active');
            $('#yearly').fadeIn(500);
            $('#monthly').fadeOut(500);
        });
        $(document).on('click', '.daily_profit', function () {
            $(this).addClass('active');
            $('.monthly_profit').removeClass('active');
            $('.weekly_profit').removeClass('active');
            $('.yearly_profit').removeClass('active');

            $('#daily_profit').fadeIn(500);
            $('#weekly_profit').fadeOut(500);
            $('#monthly_profit').fadeOut(500);
            $('#yearly_profit').fadeOut(500);
        });
        $(document).on('click', '.weekly_profit', function () {
            $(this).addClass('active');
            $('.monthly_profit').removeClass('active');
            $('.daily_profit').removeClass('active');
            $('.yearly_profit').removeClass('active');

            $('#daily_profit').fadeOut(500);
            $('#weekly_profit').fadeIn(500);
            $('#monthly_profit').fadeOut(500);
            $('#yearly_profit').fadeOut(500);
        });
        $(document).on('click', '.monthly_profit', function () {
            $(this).addClass('active');
            $('.weekly_profit').removeClass('active');
            $('.daily_profit').removeClass('active');
            $('.yearly_profit').removeClass('active');
            $('#daily_profit').fadeOut(500);
            $('#weekly_profit').fadeOut(500);
            $('#monthly_profit').fadeIn(500);
            $('#yearly_profit').fadeOut(500);
        });
        $(document).on('click', '.yearly_profit', function () {
            $(this).addClass('active');
            $('.weekly_profit').removeClass('active');
            $('.daily_profit').removeClass('active');
            $('.monthly_profit').removeClass('active');
            $('#daily_profit').fadeOut(500);
            $('#weekly_profit').fadeOut(500);
            $('#monthly_profit').fadeOut(500);
            $('#yearly_profit').fadeIn(500);
        });
        $(document).on('click', '.sale', function () {
            $(this).addClass('active');
            $('.purchase').removeClass('active');
            $(".sales_table").fadeIn(500);
            $('.purchase_table').fadeOut(500);
        });
        $(document).on('click', '.purchase', function () {
            $(this).addClass('active');
            $('.sale').removeClass('active');
            $('.purchase_table').fadeIn(500);
            $('.sales_table').fadeOut(500);
        });

        $(document).on('click', '.filtering', function () {
            $('.filtering').removeClass('active');
            $(this).addClass('active');
            let type = $(this).data('type');
            $('.gradient-color2').hide();
            $('.demo_wait').show();
            $.ajax({
                method: "POST",
                url: "<?php echo e(url('dashboard-cards-info')); ?>" + "/" + type,
                success: function (data) {
                    $('.total_purchase').text(data.purchase_amount);
                    $('.total_sale').text(data.sale_amount);
                    $('.expenses').text(data.expense);
                    $('.purchase_due').text(data.purchase_due);
                    $('.invoice_due').text(data.sale_due);
                    $('.total_bank').text(data.bank);
                    $('.total_cash').text(data.cash);
                    $('.total_income').text(data.income);
                    $('.gradient-color2').show();
                    $('.demo_wait').hide();
                }
            })
        });
        $(".complete_task").on("click", function() {
        var url = $("#url").val();
        var id = $(this).val();
        var formData = {
            id: $(this).val(),
        };

        console.log(formData);
        // get section for student
        $.ajax({
            type: "GET",
            data: formData,
            dataType: "json",
            url: url + "/" + "complete-to-do",
            success: function(data) {
                console.log(data);

                setTimeout(function() {
                    toastr.success(
                        "Operation Success!",
                        "Success Alert", {
                            iconClass: "customer-info",
                        }, {
                            timeOut: 2000,
                        }
                    );
                }, 500);

                $("#to_do_list_div" + id + "").remove();

                $("#toDoListsCompleted").children("div").remove();
            },
            error: function(data) {
                console.log("Error:", data);
            },
        });
    });

    $(document).ready(function() {
        $(".toDoListsCompleted").hide();
    });

    $(document).ready(function() {
        $("#toDoList").on("click", function(e) {
            e.preventDefault();

            if ($(this).hasClass("tr-bg")) {
                $(this).removeClass("tr-bg");
                $(this).addClass("fix-gr-bg");
            }

            if ($("#toDoListsCompleted").hasClass("fix-gr-bg")) {
                $("#toDoListsCompleted").removeClass("fix-gr-bg");
                $("#toDoListsCompleted").addClass("tr-bg");
            }

            $(".toDoList").show();
            $(".toDoListsCompleted").hide();
        });
    });

    $(document).ready(function() {
        $("#toDoListsCompleted").on("click", function(e) {
            e.preventDefault();

            if ($(this).hasClass("tr-bg")) {
                $(this).removeClass("tr-bg");
                $(this).addClass("fix-gr-bg");
            }

            if ($("#toDoList").hasClass("fix-gr-bg")) {
                $("#toDoList").removeClass("fix-gr-bg");
                $("#toDoList").addClass("tr-bg");
            }

            $(".toDoList").hide();
            $(".toDoListsCompleted").show();

            var formData = {
                id: 0,
            };

            var url = $("#url").val();

            $.ajax({
                type: "GET",
                data: formData,
                dataType: "json",
                url: url + "/" + "get-to-do-list",
                success: function(data) {
                    $(".toDoListsCompleted").empty();

                    $.each(data, function(i, value) {
                        var appendRow = "";

                        appendRow +=
                            "<div class='single-to-do d-flex justify-content-between'>";
                        appendRow += "<div>";
                        appendRow += "<h5 class='d-inline'>" + value.title + "</h5>";
                        appendRow += "<p>" + value.date + "</p>";
                        appendRow += "</div>";
                        appendRow += "</div>";

                        $(".toDoListsCompleted").append(appendRow);
                    });
                },
                error: function(data) {
                    console.log("Error:", data);
                },
            });
        });
    });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\projects\ERP\InfixBiz V3.3.2\resources\views/home.blade.php ENDPATH**/ ?>