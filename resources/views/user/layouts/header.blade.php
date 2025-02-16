<header class="header navbar-area">
    <!-- Start Topbar -->
    <div class="topbar">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-4 col-12">
                    {{-- <div class="top-left">
                        <ul class="menu-top-link">
                            <li>
                                <div class="select-position">
                                    <select id="select4">
                                        <option value="0" selected>$ USD</option>
                                        <option value="1">€ EURO</option>
                                        <option value="2">$ CAD</option>
                                        <option value="3">₹ INR</option>
                                        <option value="4">¥ CNY</option>
                                        <option value="5">৳ BDT</option>
                                    </select>
                                </div>
                            </li>
                            <li>
                                <div class="select-position">
                                    <select id="select5">
                                        <option value="0" selected>English</option>
                                        <option value="1">Español</option>
                                        <option value="2">Filipino</option>
                                        <option value="3">Français</option>
                                        <option value="4">العربية</option>
                                        <option value="5">हिन्दी</option>
                                        <option value="6">বাংলা</option>
                                    </select>
                                </div>
                            </li>
                        </ul>
                    </div> --}}
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    {{-- <div class="top-middle">
                        <ul class="useful-links">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Contact Us</a></li>
                        </ul>
                    </div> --}}
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="top-end">
                        
                        @if(!Auth::check())
                        <ul class="user-login">
                            <li>
                                <a href="{{route('login')}}">Đăng Nhập</a>
                            </li>
                            <li>
                                <a href="{{route('register')}}">Đăng Ký</a>
                            </li>
                        </ul>
                        @else
                        <div class="user">
                            <i class="lni lni-user"></i>
                                 {{Auth::user()->name}}
                        </div>
                        <ul class="user-login">
                            <li>
                                <a href="">
                                    Cài đặt</a>
                            </li>
                            <li>
                                <a href="{{route('logout')}}">Đăng Xuất</a>
                            </li>
                        </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Topbar -->
    <!-- Start Header Middle -->
    <div class="header-middle">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-3 col-7">
                    <!-- Start Header Logo -->
                    <a class="navbar-brand" href="{{route('users.home')}}">
                        <img src="{{asset('/')}}images/logo/logo.svg" alt="Logo">
                    </a>
                    <!-- End Header Logo -->
                </div>
                <div class="col-lg-5 col-md-7 d-xs-none">
                    <!-- Start Main Menu Search -->
                    <div class="main-menu-search">
                        <!-- navbar search start -->
                        <form action="{{ route('users.search') }}" method="GET">
                        <div class="navbar-search search-style-5">
                            
                            <div class="search-select">  </div>
                            <div class="search-input">
                                <input 
                                    type="text" 
                                    name="search" 
                                    placeholder="Tìm kiếm sản phẩm..." 
                                    value="{{ request('search') }}" 
                                    class="form-control"
                                    
                                />
                            </div>
                            <div class="search-btn">
                                <button><i class="lni lni-search-alt"></i></button>
                            </div>
                       
                        </div>
                    </form>
                        <!-- navbar search Ends -->
                    </div>
                    <!-- End Main Menu Search -->
                </div>
                <div class="col-lg-4 col-md-2 col-5">
                    <div class="middle-right-area">
                        <div class="nav-hotline">
                            <i class="lni lni-phone"></i>
                            <h3>Liên Hệ: {{$setting->contact_phone}}
                                <span></span>
                            </h3>
                        </div>
                        <div class="navbar-cart">
                            <div class="cart-items">
                                <a href="javascript:void(0)" class="main-btn">
                                    <i class="lni lni-cart"></i>
                                    @if ($cart && $cart->cartDetails->count() > 0)
                                        <span class="total-items">{{ $cart->cartDetails->count() }}</span>
                                    @else
                                        <span class="total-items">0</span>
                                    @endif
                                </a>
                        
                                <!-- Shopping Item -->
                                <div class="shopping-item">
                                    <div class="dropdown-cart-header">
                                        @if ($cart && $cart->cartDetails->count() > 0)
                                            <span>{{ $cart->cartDetails->count() }} Số Lượng</span>
                                            <a href="{{ route('users.cart') }}">Giỏ Hàng</a>
                                        @else
                                            <span>Không có mặt hàng nào trong giỏ hàng</span>
                                        @endif
                                    </div>
                        
                                    @if ($cart && $cart->cartDetails->count() > 0)
                                        <ul class="shopping-list">
                                            @foreach ($cart->cartDetails as $cartDetail)
                                                <li>
                                                    <a href="javascript:void(0)" class="remove" title="Remove this item">
                                                        <i class="lni lni-close"></i>
                                                    </a>
                                                    <div class="cart-img-head">
                                                        <a class="cart-img" href="product-details.html">
                                                            <img src="{{ asset(optional($cartDetail->product->images->first())->image_url) }}" alt="#">
                                                        </a>
                                                    </div>
                                                    <div class="content">
                                                        <h4>
                                                            <a href="product-details.html">{{ $cartDetail->product->name }}</a>
                                                        </h4>
                                                        <p class="quantity">
                                                            {{ $cartDetail->quantity }} x 
                                                            <span class="amount">{{ number_format($cartDetail->product->price, 0, ',', '.') }} VNĐ</span>
                                                        </p>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                        <div class="bottom">
                                            <div class="total">
                                                <span>Tổng cộng</span>
                                                <span class="total-amount">
                                                    {{ number_format($cart->cartDetails->sum(fn($item) => $item->product->price * $item->quantity), 0, ',', '.') }} VNĐ
                                                </span>
                                            </div>
                                            <div class="button">
                                                <a href="{{ route('users.showCheckout') }}" class="btn animate">Thanh Toán</a>
                                            </div>
                                        </div>
                                    @else
                                        <p class="text-center">Giỏ hàng của bạn trống.</p>
                                    @endif
                                </div>
                                <!--/ End Shopping Item -->
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Middle -->
    <!-- Start Header Bottom -->
    <div class="container">
        <div class="row align-items-center">
            <!-- Categories and Navbar Section -->
            <div class="col-lg-8 col-md-6 col-12">
                <div class="nav-inner">
                    <!-- Start Mega Category Menu -->
                    <div class="mega-category-menu">
                        <span class="cat-button">
                            <i class="lni lni-menu"></i>Tất cả danh mục
                        </span>
                        <ul class="sub-category">
                            @foreach ($categories as $category)
                                <li>
                                    <a href="{{ route('users.categoryProducts', $category->id) }}">
                                        {{ $category->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- End Mega Category Menu -->
    
                    <!-- Start Navbar -->
                    <nav class="navbar navbar-expand-lg">
                        <button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                            <ul id="nav" class="navbar-nav ms-auto">
                                <li class="nav-item">
                                    <a href="{{route('users.home')}}" class="active">Trang Chủ</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('users.aboutPage')}}">Giới Thiệu</a>
                                </li>
                                <li class="nav-item">
                                    <a  href="{{route('users.contactPage')}}">Liên hệ</a>
                                </li>
                                <li class="nav-item">
                                    <a class="dd-menu collapsed" href="javascript:void(0)" data-bs-toggle="collapse"
                                        data-bs-target="#submenu-1-2" aria-expanded="false">
                                       Thanh Toán
                                    </a>
                                    <ul class="sub-menu collapse" id="submenu-1-2">
                                        <li class="nav-item">
                                            <a href="{{route('users.cart')}}">Giỏ hàng</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{route('users.showCheckout')}}">Thanh Toán</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{route('users.listOrderUser')}}">Đơn Hàng</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <!-- End Navbar -->
                </div>
            </div>
    
            <!-- Social Media Section -->
            <div class="col-lg-4 col-md-6 col-12">
                <div class="nav-social">
                    <h5 class="title ">Theo dõi chúng tôi:</h5>
                    <ul class="list-unstyled d-flex gap-3">
                        @foreach ($listSocial as $value)
                            <li>
                                <a href="{{ $value->url }}" target="_blank" rel="noopener noreferrer" 
                                    class="text-decoration-none" aria-label="Follow us on {{ $value->platform ?? 'Social Media' }}">
                                    {!! $value->icon !!}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <!-- End Header Bottom -->
</header>