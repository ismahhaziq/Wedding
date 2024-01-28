<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="{{ route('dashboards.index') }}">
            <img src="{{ asset('./img/logo-ct-dark.png') }}" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold">{{ Auth::user()->name }}</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'home' ? 'active' : '' }}" href="{{ route('dashboards.index') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item mt-3 d-flex align-items-center">
                <div class="ps-4">
                    <i class="fab fa-pagelines" style="color: #f4645f;"></i>
                </div>
                <h6 class="ms-2 text-uppercase text-xs font-weight-bolder opacity-6 mb-0">Pages</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ str_contains(request()->url(), 'user-management') == true ? 'active' : '' }}" href="{{ route('users.index') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-bullet-list-67 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">User Management</span>
                </a>
            </li>
            <li class="nav-item {{ Route::currentRouteName() == 'invoices.index' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('invoices.index') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-info-circle text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">User Invoice Detail</span>
                </a>
            </li>
            <li class="nav-item {{ Route::currentRouteName() == 'dates.index' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('dates.index') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-calendar text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Date Management</span>
                </a>
            </li>
            <li class="nav-item {{ Route::currentRouteName() == 'makeups.index' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('makeups.index') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-paint-brush text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Make Up Management</span>
                </a>
            </li>
            <li class="nav-item {{ Route::currentRouteName() == 'caterings.index' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('caterings.index') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-cutlery text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Catering Management</span>
                </a>
            </li>
            <li class="nav-item {{ Route::currentRouteName() == 'services.index' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('services.index') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-wrench text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Add-On Management</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
