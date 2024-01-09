<?php

use App\Helpers\MenuHelper;
?>

<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="index" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="<?php echo e(URL::asset ('public/build/images/logo.svg')); ?>" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="<?php echo e(URL::asset ('public/build/images/logo-dark.png')); ?>" alt="" height="17">
                    </span>
                </a>

                <a href="index" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="<?php echo e(URL::asset ('public/build/images/logo-light.svg')); ?>" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="<?php echo e(URL::asset ('public/admin/img/logo/logo-mundochiapas.png')); ?>" alt="" height="50">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 d-lg-none header-item waves-effect waves-light" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                <i class="fa fa-fw fa-bars"></i>
            </button>

            <!-- App Search-->
            <form class="app-search d-none d-lg-block">
                <div class="position-relative">
                    <input type="text" class="form-control" placeholder="<?php echo app('translator')->get('translation.Search'); ?>">
                    <span class="bx bx-search-alt"></span>
                </div>
            </form>

        </div>

        <div class="d-flex">

            <div class="dropdown d-inline-block d-lg-none ml-2">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="mdi mdi-magnify"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-search-dropdown">

                    <form class="p-3">
                        <div class="form-group m-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="<?php echo app('translator')->get('translation.Search'); ?>" aria-label="Search input">

                                <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>s
                            </div>
                        </div>
                    </form>
                </div>
            </div>



            <div class="dropdown d-none d-lg-inline-block ml-1">
                <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                    <i class="bx bx-fullscreen"></i>
                </button>
            </div>


            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="<?php echo e(asset('public/images/user.png ')); ?>" alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ms-1" key="t-henry"><?php echo e(Session('username')); ?></span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="/logout"><i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span key="t-logout"><?php echo app('translator')->get('translation.Logout'); ?></span></a>
                </div>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                    <i class="bx bx-cog bx-spin"></i>
                </button>
            </div>

        </div>
    </div>
</header>

<div class="topnav">
    <div class="container-fluid">
        <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

            <div class="collapse navbar-collapse" id="topnav-menu-content">
                <ul class="navbar-nav">

                    <li class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle arrow-none" href="/dashboard" id="topnav-dashboard" role="button">
                            <i class="bx bx-home-circle me-2"></i><span key="t-dashboards"><?php echo app('translator')->get('translation.Dashboards'); ?></span>
                        </a>
                    </li>

                    <li class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-uielement" role="button">
                            <i class="bx bxs-layer"></i>
                            <span key="t-ui-elements">Transaportation</span>
                            <div class="arrow-down"></div>
                        </a>

                        <div class="dropdown-menu mega-dropdown-menu px-2 " aria-labelledby="topnav-uielement">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div>
                                        <a href="/drivers" class="dropdown-item" key="t-alerts">Drivers</a>
                                        <a href="/cars" class="dropdown-item" key="t-alerts">Cars</a>
                                        <a href="/solicitud" class="dropdown-item" key="t-alerts">Solicitud</a>
                                        <a href="/cars_category" class="dropdown-item" key="t-alerts">Cars Category</a>
                                        <a href="/casetas_route" class="dropdown-item" key="t-alerts">Casetas</a>
                                        <a href="/routes_travel" class="dropdown-item" key="t-alerts">Route Travel</a>
                                        <a href="/costperservice" class="dropdown-item" key="t-alerts">Cost Per Services</a>
                                        <a href="/quotes" class="dropdown-item" key="t-alerts">Quotes</a>
                                        <a href="/services" class="dropdown-item" key="t-alerts">Orden de Servicio</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </li>

                    <?php if(MenuHelper::isAccess() == true): ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-pages" role="button">
                            <i class="bx bxs-barcode"></i><span key="t-apps"> Gastos</span>
                            <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-pages">

                            <a href="/prevedor" class="dropdown-item" key="t-chat">Preveedor</a>
                            <a href="/empresas" class="dropdown-item" key="t-file-manager">Empresas</a>
                            <?php if(MenuHelper::isAccess() == true): ?>
                            <a href="/concepto" class="dropdown-item" key="t-file-manager">Concepto de Pago</a>
                            <?php endif; ?>
                            <a href="/ordendepago" class="dropdown-item" key="t-file-manager">Orden de Pago</a>

                            <?php if(MenuHelper::isAccess() == true): ?>
                            <a href="/reportes" class="dropdown-item" key="t-file-manager">Reportes</a>
                            <?php endif; ?>
                    </li>
                    <?php endif; ?>

                    <?php if(MenuHelper::isAccess() == true): ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-components" role="button">
                            <i class="bx bx-user-pin"></i> <span key="t-components">User Management</span>
                            <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-components">
                            <a href="/adminuser" class="dropdown-item" key="t-file-manager">Administrators</a>
                            <a href="/costumers" class="dropdown-item" key="t-file-manager">Customers</a>
                        </div>
                    </li>
                    <?php endif; ?>

                    <?php if(MenuHelper::isAccess() == true): ?>
                    <li class="nav-item dropdown ">
                        <!-- <a class="nav-link dropdown-toggle arrow-none" href="/reportcar" id="topnav-dashboard" role="button">
                            <i class="bx bx-file  me-2"></i><span key="t-dashboards">Report Car</span>
                        </a> -->

                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-components" role="button">
                            <i class="bx bx-file"></i> <span key="t-components">Report</span>
                            <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-components">
                            <a href="/reportcar" class="dropdown-item" key="t-file-manager">Report Car</a>
                            <a href="/salesreport" class="dropdown-item" key="t-file-manager">Sales Report</a>
                        </div>
                    </li>
                    <?php endif; ?>

                    <?php if(MenuHelper::isAccess() == true): ?>
                    <li class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle arrow-none" href="/settings" id="topnav-dashboard" role="button">
                            <i class="bx bx-cog me-2"></i><span key="t-dashboards">Settings</span>
                        </a>
                    </li>
                    <?php endif; ?>



                </ul>
            </div>
        </nav>
    </div>
</div><?php /**PATH D:\Projects\wwwroot\Admin\resources\views/layouts/horizontal.blade.php ENDPATH**/ ?>