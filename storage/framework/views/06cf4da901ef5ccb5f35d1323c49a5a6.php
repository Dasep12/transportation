<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Login | Admin </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo e(asset('public/build/images/favicon.ico')); ?>">

    <!-- Bootstrap Css -->
    <link href="<?php echo e(asset('public/build/css/bootstrap.min.css')); ?>" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?php echo e(asset('public/build/css/icons.min.css')); ?>" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?php echo e(asset('public/build/css/app.min.css')); ?>" id="app-style" rel="stylesheet" type="text/css" />
    <!-- App js -->
    <script src="<?php echo e(asset('public/build/js/plugin.js')); ?>"></script>

</head>

<body>
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-primary-subtle">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-primary p-4">
                                        <h5 class="text-primary">Welcome Back !</h5>
                                        <p>Sign in to continue to Admin Panel.</p>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="public/build/images/profile-img.png" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="auth-logo">
                                <a href="#" class="auth-logo-light">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light">
                                            <img src="public/build/images/logo-light.svg" alt="" class="rounded-circle" height="34">
                                        </span>
                                    </div>
                                </a>

                                <a href="#" class="auth-logo-dark">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light">
                                            <img src="public/build/images/mx.png" alt="" class="rounded-circle" height="34">
                                        </span>
                                    </div>
                                </a>
                            </div>
                            <div class="p-2">
                                <?php if($msg = Session::get('error')): ?>
                                <div class="mt-3 alert alert-danger">
                                    <h5><?php echo e($msg); ?></h5>
                                </div>
                                <?php else: ?>

                                <?php endif; ?>
                                <form method="post" action="auth" class="form-horizontal" action="dashboard">
                                    <?php echo csrf_field(); ?>
                                    <input hidden type="text" name="orden" value="<?php echo e($orden); ?>" id="">
                                    <input hidden type="text" name="idOrden" value="<?php echo e($idOrden); ?>" id="">
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input value="<?php echo e(old('username')); ?>" type="text" name="username" class="form-control" id="username" placeholder="Enter username">
                                        <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <div class="input-group auth-pass-inputgroup">
                                            <input value="<?php echo e(old('password')); ?>" type="password" name="password" class="form-control" placeholder="Enter password" aria-label="Password" aria-describedby="password-addon">
                                            <button class="btn btn-light " type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                        </div>
                                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <!-- 
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="remember-check">
                                        <label class="form-check-label" for="remember-check">
                                            Remember me
                                        </label>
                                    </div> -->

                                    <div class="mt-3 d-grid">
                                        <button class="btn btn-primary waves-effect waves-light" type="submit">Log In</button>
                                    </div>



                                    <div class="mt-4 text-center">
                                        <a href="#" class="text-muted"><i class="mdi mdi-lock me-1"></i> Forgot your password?</a>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                    <div class="mt-5 text-center">


                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- end account-pages -->

    <!-- JAVASCRIPT -->
    <script src="<?php echo e(asset('public/build/libs/jquery/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/build/libs/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/build/libs/metismenu/metisMenu.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/build/libs/simplebar/simplebar.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/build/libs/node-waves/waves.min.js')); ?>"></script>

    <!-- App js -->
    <script src="public/build/js/app.js"></script>
</body>

</html><?php /**PATH D:\Projects\wwwroot\Admin\resources\views/auth/login.blade.php ENDPATH**/ ?>