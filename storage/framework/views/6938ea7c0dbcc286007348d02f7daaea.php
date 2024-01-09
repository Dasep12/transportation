 <?php

    use App\Helpers\AuthHelper;
    ?>
 <!-- ========== Left Sidebar Start ========== -->
 <div class="vertical-menu">
     <div data-simplebar class="h-100">
         <!--- Sidemenu -->
         <div id="sidebar-menu">
             <!-- Left Menu Start -->
             <ul class="metismenu list-unstyled" id="side-menu">
                 <li class="menu-title" key="t-menu">Menu </li>
                 <li>
                     <a href="/dashboard" class="waves-effect <?= AuthHelper::isUriFirs() == 'dashboard' ? 'active' : '' ?>">
                         <!-- <span class="badge rounded-pill bg-danger float-end" key="t-hot">Hot</span> -->
                         <i class="bx bx-home-circle"></i>
                         <span key="t-dashboards">Dashboards</span>
                     </a>
                 </li>

                 <li class="menu-title" key="t-apps">Apps</li>


                 <li>
                     <a href="javascript: void(0);" class="has-arrow waves-effect">
                         <i class="bx bxs-layer"></i>
                         <span key="t-crypto">Transaportation </span>
                     </a>
                     <ul class="sub-menu" aria-expanded="false">
                         <li class="<?= AuthHelper::isUriFirs() == 'drivers' ? 'mm-active' : '' ?>">
                             <a href="/drivers" key="t-wallet">Drivers</a>
                         </li>
                         <li class="<?= AuthHelper::isUriFirs() == 'cars' ? 'mm-active' : '' ?>">
                             <a href="/cars" key="t-buy">Cars</a>
                         </li>
                         <li class="<?= AuthHelper::isUriFirs() == 'cars_category' ? 'mm-active' : '' ?>">
                             <a href="/cars_category" key="t-buy">Cars Category</a>
                         </li>
                         <li class="<?= AuthHelper::isUriFirs() == 'routes_travel' ? 'mm-active' : '' ?>">
                             <a href="/routes_travel" key="t-buy">Route Travel</a>
                         </li>
                         <li class="<?= AuthHelper::isUriFirs() == 'casetas_route' ? 'mm-active' : '' ?>">
                             <a href="/casetas_route" key="t-buy">Casetas Route</a>
                         </li>
                         <li class="<?= AuthHelper::isUriFirs() == 'costperservice' ? 'mm-active' : '' ?>">
                             <a href="/costperservice" key="t-lending">Cost Per Services</a>
                         </li>
                         <li class="<?= AuthHelper::isUriFirs() == 'quotes' ? 'mm-active' : '' ?>">
                             <a href="/quotes" key="t-orders">Quotes</a>
                         </li>
                         <li class="<?= AuthHelper::isUriFirs() == 'services' ? 'mm-active' : '' ?>">
                             <a href="/services" key="t-kyc">Orden de Servicio</a>
                         </li>
                     </ul>
                 </li>

                 <li>
                     <a href="javascript: void(0);" class="has-arrow waves-effect">
                         <i class="bx bxs-barcode"></i>
                         <span key="t-email">Gastos</span>
                     </a>
                     <ul class="sub-menu" aria-expanded="false">
                         <li class="<?= AuthHelper::isUriFirs() == 'prevedor' ? 'mm-active' : '' ?>"> <a href="/prevedor" class="<?= AuthHelper::isUriFirs() == 'prevedor' ? 'mm-active' : '' ?>" key="t-inbox">Preveedor</a></li>
                         <li class="<?= AuthHelper::isUriFirs() == 'empresas' ? 'mm-active' : '' ?>"><a href="/empresas" key="t-read-email">Empresas</a></li>
                         <li class="<?= AuthHelper::isUriFirs() == 'concepto' ? 'mm-active' : '' ?>"><a href="/concepto" key="t-read-email">Concepto de Pago</a></li>
                         <li class="<?= AuthHelper::isUriFirs() == 'ordendepago' ? 'mm-active' : '' ?>"><a href="ordendepago" key="t-read-email">Orden de Pago</a></li>
                         <li><a href="#" key="t-read-email">Reportes</a></li>

                     </ul>
                 </li>

                 <li>
                     <a href="javascript: void(0);" class="has-arrow waves-effect">
                         <i class="bx bx-user-pin"></i>
                         <span key="t-dashboards">User Management</span>
                     </a>
                     <ul class="sub-menu" aria-expanded="false">
                         <li><a href="/adminuser" key="t-tui-calendar">Administrators</a></li>
                         <li><a href="/costumers" key="t-full-calendar">Customers</a></li>
                     </ul>
                 </li>


                 <li class="menu-title" key="t-pages">Reporting</li>

                 <li>
                     <a href="javascript: void(0);" class="has-arrow waves-effect">
                         <i class="bx bxs-report"></i>
                         <span key="t-authentication">Reports</span>
                     </a>
                     <ul class="sub-menu" aria-expanded="false">
                         <li><a href="auth-login.html" key="t-login">Reporte de vehículo</a></li>
                     </ul>
                 </li>


                 <li class="menu-title" key="t-components">Components</li>
                 <li>
                     <a href="javascript: void(0);" class="waves-effect">
                         <!-- <span class="badge rounded-pill bg-danger float-end" key="t-hot">Hot</span> -->
                         <i class="bx bx-wrench"></i>
                         <span key="t-dashboards">Settings</span>
                     </a>
                 </li>

             </ul>
         </div>
         <!-- Sidebar -->
     </div>
 </div>
 <!-- Left Sidebar End --><?php /**PATH D:\Projects\wwwroot\Admin\resources\views/layouts/sidebar.blade.php ENDPATH**/ ?>