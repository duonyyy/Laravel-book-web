<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true"
data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}"
data-kt-drawer-overlay="true" data-kt-drawer-width="225px" data-kt-drawer-direction="start"
data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
<div class="app-sidebar-logo px-6" id="kt_app_sidebar_logo">
    <a href="{{route('admin.dashboard')}}">
        <div class="d-inline-block p-3 bg-light  rounded">
            <img 
                alt="Logo" 
                src="{{ asset('/') }}images/logo/logo.svg" 
                class="h-25px app-sidebar-logo-default" />
        </div>
    </a>
    <div id="kt_app_sidebar_toggle"
        class="app-sidebar-toggle btn btn-icon btn-shadow btn-sm btn-color-muted btn-active-color-primary h-30px w-30px position-absolute top-50 start-100 translate-middle rotate"
        data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
        data-kt-toggle-name="app-sidebar-minimize">
        <i class="ki-duotone ki-black-left-line fs-3 rotate-180">
            <span class="path1"></span>
            <span class="path2"></span>
        </i>
    </div>
</div>

<div class="app-sidebar-menu overflow-hidden flex-column-fluid">
    <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper">
        <div id="kt_app_sidebar_menu_scroll" class="scroll-y my-5 mx-3" data-kt-scroll="true"
            data-kt-scroll-activate="true" data-kt-scroll-height="auto"
            data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
            data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px"
            data-kt-scroll-save-state="true">
            <div class="menu menu-column menu-rounded menu-sub-indention fw-semibold fs-6"
                id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false">

                <div class="menu-item show">
                    <a class="menu-link text-decoration-none text-decoration-none" href="{{ route('admin.dashboard')}}">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-element-11 fs-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                                <span class="path4"></span>
                            </i>
                        </span>
                        <span class="menu-title">Dashboards</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link text-decoration-none"  href="{{ route('admin.users.listUsers')}}">
                        <span class="menu-icon">
                            <i class="fa-light fa-user"></i>
                        </span>
                        <span class="menu-title">Quản lý người dùng</span>
                    </a>
                </div>

                <div class="menu-item">
                    <a class="menu-link text-decoration-none"  href="{{ route('admin.orders.listOrders')}}">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-element-11 fs-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                                <span class="path4"></span>
                            </i>
                        </span>
                        <span class="menu-title">Quản lý Đơn Hàng</span>
                    </a>
                </div>

                <div class="menu-item">
                    <a class="menu-link text-decoration-none"  href="{{ route('admin.email.listSubscribers')}}">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-element-11 fs-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                                <span class="path4"></span>
                            </i>
                        </span>
                        <span class="menu-title">Subscribers</span>
                    </a>
                </div>

                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <span class="menu-link text-decoration-none">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-address-book fs-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                            </i>
                        </span>
                        <span class="menu-title">Quản lý Danh Mục</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link text-decoration-none" href="{{ route('admin.categories.listCategories')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Danh Sách Danh Mục</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link text-decoration-none" href="{{ route('admin.categories.addCategory')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Thêm Danh Mục</span>
                            </a>
                        </div>
                     
                        
                    </div>
                </div>
              
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <span class="menu-link text-decoration-none">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-address-book fs-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                            </i>
                        </span>
                        <span class="menu-title">Quản lý sản phẩm </span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link text-decoration-none"  href="{{ route('admin.products.listProducts')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Danh sách sản phẩm</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link text-decoration-none"  href="{{ route('admin.products.addProduct')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Thêm sản phẩm</span>
                            </a>
                        </div>
                       
                    </div>
                </div>  
              
              
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <span class="menu-link text-decoration-none">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-address-book fs-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                            </i>
                        </span>
                        <span class="menu-title">Manager </span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link text-decoration-none"  href="{{ route('admin.managers.getSetting')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Setting</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link text-decoration-none"  href="{{ route('admin.sliders.listSliders')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Slider</span>
                            </a>
                        </div>

                        <div class="menu-item">
                            <a class="menu-link text-decoration-none"  href="{{ route('admin.socials.listSocial')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title"> Social</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link text-decoration-none"  href="{{ route('admin.managers.getTerm')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Term</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link text-decoration-none"  href="{{ route('admin.managers.getContact')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Contact</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link text-decoration-none"  href="{{ route('admin.managers.getAbout')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">About</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link text-decoration-none"  href="{{ route('admin.managers.viewFeedBack')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">FeedBack</span>
                            </a>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
    </div>
</div>

<div class="app-sidebar-footer flex-column-auto pt-2 pb-6 px-6" id="kt_app_sidebar_footer">
    <a href="#"
        class="btn btn-flex flex-center btn-custom btn-primary overflow-hidden text-nowrap px-0 h-40px w-100"
        data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss-="click"
        title="Phần mềm báo cáo bộ giáo dục">
        <span class="btn-label">Báo cáo Doanh Thu</span>
        <i class="ki-duotone ki-document btn-icon fs-2 m-0">
            <span class="path1"></span>
            <span class="path2"></span>
        </i>
    </a>
</div>
</div>