<div id="kt_app_header" class="app-header" data-kt-sticky="true"
data-kt-sticky-activate="{default: true, lg: true}" data-kt-sticky-name="app-header-minimize"
data-kt-sticky-offset="{default: '200px', lg: '0'}" data-kt-sticky-animation="false">
<div class="app-container container-fluid d-flex align-items-stretch justify-content-between"
    id="kt_app_header_container">
    <div class="d-flex align-items-center d-lg-none ms-n3 me-1 me-md-2" title="Show sidebar menu">
        <div class="btn btn-icon btn-active-color-primary w-35px h-35px"
            id="kt_app_sidebar_mobile_toggle">
            <i class="ki-duotone ki-abstract-14 fs-2 fs-md-1">
                <span class="path1"></span>
                <span class="path2"></span>
            </i>
        </div>
    </div>
    <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
        <a href="index.html" class="d-lg-none">
            <img alt="Logo" src="{{ asset('assets/media/logos/default-small.svg')}}" class="h-30px" />
        </a>
    </div>

    <!-- Main Header -->
    <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1"
        id="kt_app_header_wrapper">
        <div class="app-header-menu app-header-mobile-drawer align-items-stretch" data-kt-drawer="true"
            data-kt-drawer-name="app-header-menu" data-kt-drawer-activate="{default: true, lg: false}"
            data-kt-drawer-overlay="true" data-kt-drawer-width="250px" data-kt-drawer-direction="end"
            data-kt-drawer-toggle="#kt_app_header_menu_toggle" data-kt-swapper="true"
            data-kt-swapper-mode="{default: 'append', lg: 'prepend'}"
            data-kt-swapper-parent="{default: '#kt_app_body', lg: '#kt_app_header_wrapper'}">
            <div class="menu menu-rounded menu-column menu-lg-row my-5 my-lg-0 align-items-stretch fw-semibold px-2 px-lg-0"
                id="kt_app_header_menu" data-kt-menu="true">
                <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                    data-kt-menu-placement="bottom-start"
                    class="menu-item here show menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
                    <span class="menu-link">
                        <span class="menu-title">Dashboards</span>
                        <span class="menu-arrow d-lg-none"></span>
                    </span>
                </div>
                <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                    data-kt-menu-placement="bottom-start"
                    class="menu-item menu-lg-down-accordion menu-sub-lg-down-indention me-0 me-lg-2">
                    <span class="menu-link">
                        <span class="menu-title">Quản lý</span>
                        <span class="menu-arrow d-lg-none"></span>
                    </span>
                    <div
                        class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown px-lg-2 py-lg-4 w-lg-250px">
                        <div data-kt-menu-trigger="{default:'click', lg: 'hover'}"
                            data-kt-menu-placement="right-start"
                            class="menu-item menu-lg-down-accordion">
                            <span class="menu-link">
                                <span class="menu-icon">
                                    <i class="ki-duotone ki-bank fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </span>
                                <span class="menu-title">Quản lý đơn vị</span>
                            </span>
                        </div>
                        <div data-kt-menu-trigger="{default:'click', lg: 'hover'}"
                            data-kt-menu-placement="right-start"
                            class="menu-item menu-lg-down-accordion">
                            <span class="menu-link">
                                <span class="menu-icon">
                                    <i class="ki-duotone ki-address-book fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                                <span class="menu-title">Quản lý nhân sự</span>
                            </span>
                        </div>
                        <div data-kt-menu-trigger="{default:'click', lg: 'hover'}"
                            data-kt-menu-placement="right-start"
                            class="menu-item menu-lg-down-accordion">
                            <span class="menu-link">
                                <span class="menu-icon">
                                    <i class="ki-duotone ki-element-7 fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </span>
                                <span class="menu-title">Quản lý bộ tiêu chuẩn</span>
                            </span>
                        </div>
                        <div data-kt-menu-trigger="{default:'click', lg: 'hover'}"
                            data-kt-menu-placement="right-start"
                            class="menu-item menu-lg-down-accordion">
                            <span class="menu-link">
                                <span class="menu-icon">
                                    <i class="ki-duotone ki-abstract-28 fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </span>
                                <span class="menu-title">Phân quyền</span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="app-navbar flex-shrink-0">
            
           

            <div class="app-navbar-item ms-1 ms-md-4" id="kt_header_user_menu_toggle">
                <div class="cursor-pointer symbol symbol-35px"
                    data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent"
                    data-kt-menu-placement="bottom-end">
                    <img src="{{asset(Auth::user()->image)}}" class="rounded-3" alt="user" />
                </div>
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px"
                    data-kt-menu="true">
                    <div class="menu-item px-3">
                        <div class="menu-content d-flex align-items-center px-3">
                            <div class="d-flex flex-column">
                                <div class="fw-bold d-flex align-items-center fs-5">
                                    {{Auth::user()->name}}
                                </div>
                                <a href="#"
                                    class="fw-semibold text-muted text-hover-primary fs-7"> {{Auth::user()->email}}</a>
                            </div>
                        </div>
                    </div>
                    <div class="separator my-2"></div>
                    <div class="menu-item px-5">
                        <a href="#" class="menu-link text-decoration-none">
                            <!-- Icon for My Profile -->
                            <i class="bi bi-person-circle me-2"></i> My Profile
                        </a>
                    </div>
                    
                    <div class="menu-item px-5">
                        <a href="{{ route('logout') }}" class="menu-link text-decoration-none">
                            <!-- Icon for Sign Out -->
                            <i class="bi bi-box-arrow-right me-2"></i> Sign Out
                        </a>
                    </div>
                    
                </div>
            </div>
            <div class="app-navbar-item d-lg-none ms-2 me-n2" title="Show header menu">
                <div class="btn btn-flex btn-icon btn-active-color-primary w-30px h-30px"
                    id="kt_app_header_menu_toggle">
                    <i class="ki-duotone ki-element-4 fs-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </div>
            </div>
        </div>
    </div>
    <!-- End:Main Header -->
</div>
</div>