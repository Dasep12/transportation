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
                     <a href="#" class="waves-effect">
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
                             <a href="/drivers/services" key="t-wallet">Orden De Servicio</a>
                         </li>
                     </ul>
                 </li>


             </ul>
         </div>
         <!-- Sidebar -->
     </div>
 </div>
 <!-- Left Sidebar End -->