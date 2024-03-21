<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
        <div class="sidebar-brand-icon">
            <img src="{{ asset('SB-Admin-2') }}/img/sreeya-icon.png" style="max-width: 50px">
        </div>
        <div class="sidebar-brand-text mx-3">SFM</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item @yield('dashboard')">
        <a class="nav-link" href="/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Heading -->
    <div class="sidebar-heading my-2">
        Master
    </div>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Master Collapse Menu -->
    <li class="nav-item @yield('master-active')">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-solid fa-server"></i>
            <span>Master Data</span>
        </a>
        <div id="collapseUtilities" class="collapse @yield('master')" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Master Data :</h6>
                <a class="collapse-item @yield('master-area')" href="/master-area">Master Area</a>
                <a class="collapse-item @yield('master-freezer')" href="/master-freezer">Master Freezer</a>
                <a class="collapse-item @yield('master-outlet')" href="/master-outlet">Master Outlet</a>
                <a class="collapse-item @yield('master-vendor')" href="/master-vendor">Master Vendor</a>
            </div>
        </div>
    </li>

    <!-- Heading -->
    <div class="sidebar-heading my-2">
        Freezer
    </div>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Freezer Collapse Menu -->
    <li class="nav-item @yield('main-active')">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFreezer"
            aria-expanded="true" aria-controls="collapseFreezer">
            <i class="fas fa-solid fa-truck"></i>
            <span>Freezer Movement</span>
        </a>
        <div id="collapseFreezer" class="collapse @yield('main')" aria-labelledby="headingFreezer"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Freezer Movement :</h6>
                <a class="collapse-item @yield('mutasi')" href="/mutasi">Mutasi Freezer</a>
                {{-- <a class="collapse-item @yield('freezer-withdrawal')" href="/freezer-withdrawal">Freezer Withdrawal</a>
                <a class="collapse-item @yield('freezer-replace')" href="/freezer-replace">Freezer Replacement</a> --}}
            </div>
        </div>
    </li>

    <!-- Heading -->
    <div class="sidebar-heading my-2">
        E-Form
    </div>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Form Collapse Menu -->
    <li class="nav-item @yield('eform-active')">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEform"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-solid fa-file-invoice"></i>
            <span>E-form Freezer</span>
        </a>
        <div id="collapseEform" class="collapse @yield('eform')" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">E-form Freezer :</h6>
                <a class="collapse-item @yield('eform-permintaan')" href="/eform-permintaan">Permintaan Freezer</a>
                <a class="collapse-item @yield('eform-pengembalian')" href="/eform-pengembalian">Pengembalian Freezer</a>
                <a class="collapse-item @yield('eform-billing')" href="/eform-billing">Billing Vendor</a>
            </div>
        </div>
    </li>

    <!-- Heading -->
    <div class="sidebar-heading my-2">
        Report
    </div>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Last Position-->
    <li class="nav-item @yield('lastposition')">
        <a class="nav-link" href="/lastposition">
            <i class="fas fa-solid fa-crosshairs"></i>
            <span>Last Position</span></a>
    </li>
    
    <!-- Nav Item - Mutasi Freezer -->
    {{-- <li class="nav-item @yield('mutasi')">
        <a class="nav-link" href="/mutasi">
            <i class="fas fa-solid fa-retweet"></i>
            <span>Mutasi Freezer</span></a>
    </li> --}}
    
    <!-- Nav Item - History Freezer -->
    <li class="nav-item @yield('history')">
        <a class="nav-link" href="/history">
            <i class="fas fa-solid fa-history"></i>
            <span>History Freezer</span></a>
    </li>


    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline mt-4">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>