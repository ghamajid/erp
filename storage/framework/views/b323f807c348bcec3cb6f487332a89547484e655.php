<?php
    $bg_image = 'backEnd/img/login-bg.png';
   if (app()->bound('general_setting')){
       $setting = app('general_setting');
       $bg_image = $setting->login_bg;
   }
?>


<?php $__env->startPush('css'); ?>


<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>


        <h3 class="sho_mb "><?php echo e(__('common.Login to your account')); ?></h3>

        <?php if(env('APP_SYNC')): ?>

            <?php
                $super_admin =  DB::table('users')->select('email')->where('role_id',1)->first();
                $admin =  DB::table('users')->select('email')->where('role_id',2)->first();
                $staff =  DB::table('users')->select('email')->where('role_id',3)->first();
                $supplier =  DB::table('users')->select('email')->where('role_id',4)->first();
                $customer =  DB::table('users')->select('email')->where('role_id',5)->first();
            ?>

            <div class="media-link">

                <?php if($super_admin): ?>
                    <form action="<?php echo e(route('login')); ?>" id="content_form1" class="customer-input" method="POST">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="email" value="<?php echo e($super_admin->email); ?>">
                        <input type="hidden" name="password" value="12345678">
                        <button type="submit" name="submit" class=" submit super_admin_btn">Super Admin</button>
                        <button type="button" class="super_admin_btn submitting" style="display:none" disabled><?php echo e(__('common.Logging in')); ?>...</button>
                    </form>

                <?php endif; ?>

                <?php if($admin): ?>
                    <form action="<?php echo e(route('login')); ?>" id="content_form2" class="customer-input" method="POST">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="email" value="<?php echo e($admin->email); ?>">
                        <input type="hidden" name="password" value="12345678">
                        <button type="submit" name="submit" class="super_admin_btn submit">Admin</button>
                        <button type="button" class="super_admin_btn submitting" style="display:none" disabled><?php echo e(__('common.Logging in')); ?>...</button>
                    </form>
                <?php endif; ?>

                <?php if($staff): ?>
                    <form action="<?php echo e(route('login')); ?>" id="content_form3" class="customer-input" method="POST">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="email" value="<?php echo e($staff->email); ?>">
                        <input type="hidden" name="password" value="12345678">
                        <button type="submit" name="submit" class="super_admin_btn submit">Staff</button>
                        <button type="button" class="super_admin_btn submitting" style="display:none" disabled><?php echo e(__('common.Logging in')); ?>...</button>
                    </form>
                <?php endif; ?>

                <?php if($supplier): ?>
                    <form action="<?php echo e(route('login')); ?>" id="content_form4" class="customer-input" method="POST">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="email" value="<?php echo e($supplier->email); ?>">
                        <input type="hidden" name="password" value="12345678">
                        <button type="submit" name="submit" class="super_admin_btn submit">Supplier</button>
                        <button type="button" class="super_admin_btn submitting" style="display:none" disabled><?php echo e(__('common.Logging in')); ?>...</button>
                    </form>
                <?php endif; ?>

                <?php if($customer): ?>
                    <form action="<?php echo e(route('login')); ?>" id="content_form5" class="customer-input" method="POST">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="email" value="<?php echo e($customer->email); ?>">
                        <input type="hidden" name="password" value="12345678">
                        <button type="submit" name="submit" class="super_admin_btn submit">Customer</button>
                        <button type="button" class="super_admin_btn submitting" style="display:none" disabled><?php echo e(__('common.Logging in')); ?>...</button>
                    </form>
                <?php endif; ?>
            </div>

        <?php endif; ?>


        <form  method="POST" action="<?php echo e(route('login')); ?>" id="content_form6" class="customer-input" >

            <?php echo csrf_field(); ?>

            <input required name="email" id="email" type="text" placeholder="<?php echo e(__('common.Enter Email address')); ?>" autofocus class="" autocomplete="current-password">

            <input required name="password" id="password" type="password" placeholder="<?php echo e(__('common.Password')); ?>" class="" value="">


            <div class="forgot-pass">
                <div class="check-remamber-field">
                    <div class="round">
                        <input type="checkbox" id="checkbox" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>/>
                        <label for="checkbox"></label>
                    </div>
                    <label class="remember-me"  for="checkbox">
                        <?php echo e(__('common.Remember Me')); ?>

                    </label>
                </div>
                <span>

					<?php if(Route::has('password.request')): ?>
                        <a href="<?php echo e(route('password.request')); ?>">
							<?php echo e(__('common.Forget Password')); ?>

						</a>
                    <?php endif; ?>
				</span>
            </div>

            <button type="submit" class="login-res-btn submit"><?php echo e(__('common.Login')); ?></button>
            <button type="button" class="login-res-btn submitting" style="display:none" disabled><?php echo e(__('common.Logging in')); ?>...</button>
        </form>

        <?php if(app('business_settings')->where('type', 'system_registration')->first()->status and app('general_setting')->first()->contact_login): ?>
            <div class="text-left">
                <span class=""> <?php echo e(__('common.dont_have_account')); ?></span>
                <a href="<?php echo e(route('register')); ?>"><?php echo e(__('common.Register')); ?></a>
            </div>
        <?php endif; ?>




<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>

    <script>
        $(document).ready(function () {
            _formValidation('content_form1');
            _formValidation('content_form2');
            _formValidation('content_form3');
            _formValidation('content_form4');
            _formValidation('content_form5');
            _formValidation('content_form6');
        });
    </script>

    <?php $__env->stopPush(); ?>

<?php echo $__env->make('auth.layouts.guest', ['title' => __('common.Login')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\projects\ERP\erp_github\resources\views/auth/login.blade.php ENDPATH**/ ?>