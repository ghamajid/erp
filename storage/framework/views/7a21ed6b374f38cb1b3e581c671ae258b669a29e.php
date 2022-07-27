<?php
    Illuminate\Support\Facades\Cache::rememberForever('showrooms', function() {
       return \Modules\Inventory\Entities\ShowRoom::where('status', 1)->get();
    });
    Illuminate\Support\Facades\Cache::rememberForever('languages', function() {
       return \Modules\Localization\Entities\Language::where('status', 1)->get();
    });
    Illuminate\Support\Facades\Cache::rememberForever('date_format', function() {
       return \Modules\Setting\Model\DateFormat::where('status', 1)->get();
    });
?>
<div class="container-fluid no-gutters">
    <div class="row">
        <div class="col-lg-12 p-0">
            <div class="header_iner d-flex justify-content-between align-items-center">
                <?php if(!request()->is('pos/pos-order-products')): ?>
                    <div class="small_logo_crm d-lg-none">
                        <a href="<?php echo e(url('/login')); ?>">
                            <img src="<?php echo e(asset($setting->logo)); ?>" alt=""></a>
                    </div>
                    <div id="sidebarCollapse" class="sidebar_icon  d-lg-none">
                        <i class="ti-menu"></i>
                    </div>
                    <div class="collaspe_icon open_miniSide">
                        <i class="ti-menu"></i>
                    </div>
                <?php endif; ?>
                <div class="serach_field-area ml-40">
                    <?php if(!request()->is('pos/pos-order-products') and auth()->user()->role->type != 'normal_user'): ?>
                        <div class="search_inner search_menu_suggestion">
                            <form action="#">
                                <div class="search_field">
                                    <input type="text" class="search_menu" placeholder="<?php echo e(__('common.Search')); ?>">
                                </div>
                                <button><i class="ti-search"></i></button>
                            </form>
                            <div id="livesearch"></div>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="header_middle d-none d-md-block">
                    <div class="select_style d-flex">
                        <?php if(auth()->user()->role->type == "system_user"): ?>
                            <select name="#" class="nice-select nice_Select select_showroom bgLess mb-0 ">
                                <?php $__currentLoopData = Illuminate\Support\Facades\Cache::get('showrooms'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $showroom): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($showroom->id); ?>"
                                            <?php if($showroom->id == session()->get('showroom_id')): ?> selected <?php endif; ?>><?php echo e($showroom->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        <?php elseif(auth()->user()->role->type == "regular_user"): ?>
                            <select name="#" class="nice-select nice_Select select_showroom bgLess mb-0 ">
                                <?php if(showroomName() != null): ?>
                                    <option value="" selected><?php echo e(showroomName()); ?></option>
                                <?php else: ?>
                                    <option value="" selected><?php echo e(__('common.Login Again')); ?></option>
                                <?php endif; ?>
                            </select>
                        <?php endif; ?>
                        <?php if(permissionCheck('language.change')): ?>
                            <div class="border_1px"></div>
                            <?php
                                if(session()->has('locale')){
                                    $locale = session()->get('locale');
                                }
                                else{
                                    session()->put('locale', app('general_setting')->language_name);
                                    $locale = session()->get('locale');
                                }
                            ?>
                            <select name="code" id="language_code" class="nice_Select bgLess mb-0"
                                    onchange="change_Language()">
                                <?php $__currentLoopData = Illuminate\Support\Facades\Cache::get('languages'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($language->code); ?>"
                                            <?php if($locale == $language->code): ?> selected <?php endif; ?>><?php echo e($language->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php endif; ?>
                    </div>

                </div>
                <div class="header_middle d-none d-md-block">

                </div>
                <div class="header_right d-flex justify-content-between align-items-center">
                    <?php if(auth()->user()->role->type != "normal_user"): ?>
                        <div class="header_notification_warp d-flex align-items-center">
                            <ul>
                                <?php if(permissionCheck('cashbook.index')): ?>
                                <li>
                                    <a class="gredient_hover" href="<?php echo e(route('cashbook.index')); ?>">
                                        <i class="ti-agenda"></i>
                                    </a>
                                </li>
                                <?php endif; ?>
                                <li class="notification_warp_pop">
                                    <a class="popUP_clicker gredient_hover" href="#">
                                        <i class="ti-plus"></i>
                                    </a>
                                    <div class="menu_popUp_list_wrapper">
                                        <!-- popUp_single_wrap  -->
                                        <div class="popUp_single_wrap">
                                            <?php if(permissionCheck('sale.create')): ?>
                                                <div class="popup_single_item">
                                                    <div class="main-title2 mb_10">
                                                        <h4 class="mb_15"><?php echo e(__('sale.Sales')); ?></h4>
                                                    </div>
                                                    <ul>
                                                        <li><a href="<?php echo e(route('sale.create')); ?>"> <i
                                                                    class="ti-plus"></i> <?php echo e(__('sale.Add Sale')); ?></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            <?php endif; ?>

                                            <?php if(permissionCheck('add_contact.store')): ?>
                                                <div class="popup_single_item">
                                                    <div class="main-title2 mb_10">
                                                        <h4 class="mb_15"><?php echo e(__('contact.Contact')); ?></h4>
                                                    </div>
                                                    <ul>
                                                        <li><a href="<?php echo e(route('add_contact.store')); ?>"> <i
                                                                    class="ti-plus"></i><?php echo e(__('contact.Add Contact')); ?>

                                                            </a></li>
                                                    </ul>
                                                </div>
                                            <?php endif; ?>

                                            <?php if(permissionCheck('purchase_order.recieve.index')): ?>
                                                <div class="popup_single_item">
                                                    <div class="main-title2 mb_10">
                                                        <h4 class="mb_15"><?php echo e(__('product.Products')); ?></h4>
                                                    </div>
                                                    <ul>
                                                        <li><a href="<?php echo e(route('purchase_order.recieve.index')); ?>"> <i
                                                                    class="ti-plus"></i> <?php echo e(__('common.Recieve Product')); ?>

                                                            </a></li>
                                                    </ul>
                                                </div>
                                            <?php endif; ?>


                                        </div>
                                        <!-- popUp_single_wrap  -->
                                        <div class="popUp_single_wrap">
                                            <?php if(permissionCheck('purchase_order.create')): ?>
                                                <div class="popup_single_item">
                                                    <div class="main-title2 mb_10">
                                                        <h4 class="mb_15"><?php echo e(__('purchase.Purchase')); ?></h4>
                                                    </div>
                                                    <ul>
                                                        <li><a href="<?php echo e(route('purchase_order.create')); ?>"> <i
                                                                    class="ti-plus"></i> <?php echo e(__('purchase.Add Purchase')); ?>

                                                            </a></li>
                                                    </ul>
                                                </div>
                                            <?php endif; ?>

                                            <?php if(permissionCheck('transfer_showroom.create')): ?>
                                                <div class="popup_single_item">
                                                    <div class="main-title2 mb_10">
                                                        <h4 class="mb_15"><?php echo e(__('account.Money Transfer')); ?></h4>
                                                    </div>
                                                    <ul>
                                                        <li><a href="<?php echo e(route('transfer_showroom.create')); ?>"> <i
                                                                    class="ti-plus"></i><?php echo e(__('account.Add Money Transfer')); ?>

                                                            </a></li>
                                                    </ul>
                                                </div>
                                            <?php endif; ?>

                                            <?php if(permissionCheck('staffs.create')): ?>
                                                <div class="popup_single_item">
                                                    <div class="main-title2 mb_10">
                                                        <h4 class="mb_15"><?php echo e(__('common.Staff')); ?></h4>
                                                    </div>
                                                    <ul>
                                                        <li><a href="<?php echo e(route('staffs.create')); ?>"> <i
                                                                    class="ti-plus"></i> <?php echo e(__('common.Add Staff')); ?>

                                                            </a></li>
                                                    </ul>
                                                </div>
                                            <?php endif; ?>


                                        </div>
                                        <!-- popUp_single_wrap  -->
                                        <div class="popUp_single_wrap">


                                            <?php if(permissionCheck('introPrefix.create')): ?>
                                                <div class="popup_single_item">
                                                    <div class="main-title2 mb_10">
                                                        <h4 class="mb_15"><?php echo e(__('common.Intro Prefix')); ?></h4>
                                                    </div>
                                                    <ul>
                                                        <li><a href="<?php echo e(route('introPrefix.index')); ?>"> <i
                                                                    class="ti-plus"></i>
                                                                <?php echo e(__('common.Add Intro Prefix')); ?></a></li>
                                                    </ul>
                                                </div>
                                            <?php endif; ?>

                                            <?php if(permissionCheck('tax.create')): ?>
                                                <div class="popup_single_item">
                                                    <div class="main-title2 mb_10">
                                                        <h4 class="mb_15"><?php echo e(__('account.Tax')); ?></h4>
                                                    </div>
                                                    <ul>
                                                        <li><a href="<?php echo e(route('tax.index')); ?>"> <i
                                                                    class="ti-plus"></i> <?php echo e(__('account.Add Tax')); ?></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            <?php endif; ?>

                                        </div>
                                        <!-- popUp_single_wrap  -->
                                    </div>
                                </li>

                                <li class="scroll_notification_list">
                                    <a class="pulse theme_color bell_notification_clicker" href="#" >
                                        <!-- bell   -->
                                        <i class="fa fa-bell"></i>

                                        <!--/ bell   -->
                                        <span class="notification_count notification_count_text"><?php echo e(count($notifications)); ?>  </span>
                                        <span class="notification_count_pulse <?php echo e(count($notifications) > 0 ? 'pulse-ring' : ''); ?>"></span>
                                    </a>
                                    <!-- Menu_NOtification_Wrap  -->
                                    <div class="Menu_NOtification_Wrap">
                                        <div class="notification_Header">
                                            <h4><?php echo e(__('common.Notifications')); ?></h4>
                                        </div>
                                        <div class="Notification_body">

                                            <?php if(app('business_settings')->where('type','system_notification')->where('status',1)->first()): ?>
                                                <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                    <div class="single_notify d-flex align-items-center">

                                                        <div class="notify_content">
                                                            <a href="<?php echo e($notification->url); ?>"
                                                               onclick="notification_remove(<?php echo e($notification->id); ?>,'<?php echo e($notification->url); ?>')">
                                                                <h5><?php echo e($notification->type); ?> </h5></a>
                                                            <p ><?php echo e($notification->data); ?></p>
                                                        </div>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>

                                        </div>
                                        <div class="nofity_footer">
                                            <div class="submit_button text-center pt_20">
                                                <a href="<?php echo e(route('all_notifications')); ?>"
                                                   class="primary-btn radius_30px text_white  fix-gr-bg"><?php echo e(__('product.See More')); ?></a>
                                                <?php if(count($notifications)): ?>
                                                    <span class="primary-btn radius_30px text_white notification_icon fix-gr-bg"><?php echo e(__('common.Mark as seen')); ?></span>
                                                    <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/ Menu_NOtification_Wrap  -->
                                </li>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <div class="profile_info">
                        <img
                            src="<?php echo e(asset(Auth::user()->avatar != null ? Auth::user()->avatar : "public/img/profile.jpg")); ?>"
                            alt="#">
                        <div class="profile_info_iner">
                            <p><?php echo e(__('common.Welcome')); ?> <?php echo e(Auth::user()->role->name); ?>!</p>
                            <h5><?php echo e(Auth::user()->name); ?></h5>
                            <div class="profile_info_details">
                                <?php if(permissionCheck('company_information_update')): ?>
                                    <a href="<?php echo e(route('company_info')); ?>"><?php echo e(__('common.Company Info')); ?> <i
                                            class="ti-user"></i></a>
                                <?php endif; ?>
                                <?php if(Auth::user()->staff): ?>
                                    <a href="<?php echo e(route('profile_view')); ?>"><?php echo e(__('common.Profile')); ?> <i
                                            class="ti-settings"></i></a>

                                        <a href="<?php echo e(route('change_password')); ?>"><?php echo e(__('common.Change Password')); ?> <i
                                                class="ti-key"></i></a>
                                <?php elseif(Auth::user()->contact): ?>
                                    <a href="<?php echo e(route('contact.profile')); ?>"><?php echo e(__('common.Profile')); ?> <i
                                            class="ti-settings"></i></a>
                                <?php endif; ?>



                                <a href="<?php echo e(route('logout')); ?>"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <?php echo e(__('common.Logout')); ?>

                                    <i class="ti-shift-left"></i>
                                </a>
                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                    <?php echo csrf_field(); ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->startPush('scripts'); ?>
    <script type="text/javascript">
        function change_Language() {
            var code = $('#language_code').val();
            $.post('<?php echo e(route('language.change')); ?>', {_token: '<?php echo e(csrf_token()); ?>', code: code}, function (data) {

                if (data.success) {
                    window.location.reload(true);
                    toastr.success(data.success);
                } else {
                    toastr.error(data.error);
                }
            });
        }

        $(document).on('change', '.select_showroom', function () {
            let id = $(this).val();
            $.ajax({
                method: "POST",
                url: "<?php echo e(route('change.showroom')); ?>",
                data: {
                    id: id,
                    _token: "<?php echo e(csrf_token()); ?>",
                },
                success: function (result) {
                    window.location.reload(true);
                }
            })
        })

        $(document).on('keyup', '.search_menu', function () {
            let value = $(this).val();
            let _token = "<?php echo e(csrf_token()); ?>";
            $.ajax({
                method: "POST",
                url: "<?php echo e(route('menu.search')); ?>",
                data: {
                    value: value,
                    _token: _token,
                },
                success: function (result) {
                    $("#livesearch").show();
                    $("#livesearch").html(result);
                }
            })
        })

        $(document).on('click', '.notification_icon', function(){
            $('.notification_count_text').text('0').addClass('notification_count').removeClass('notification_count_pulse')
            $('.notification_count_pulse').removeClass('pulse-ring');
            $.ajax({
                url: "<?php echo e(route('mark_notifications')); ?>",
                method: "get",
                success: function (result) {
                }
            })
        });

        function notification_remove(id, url) {
            $.ajax({
                url: "<?php echo e(route('notification.update')); ?>",
                method: "POST",
                data: {
                    id: id,
                    _token: "<?php echo e(csrf_token()); ?>",
                },
                success: function (result) {
                }
            })
        }
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\projects\ERP\erp_github\resources\views/backEnd/partials/menu.blade.php ENDPATH**/ ?>