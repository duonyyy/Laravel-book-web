@extends('user.layouts.default')
  @section('title')
      Trang Chủ 
  @endsection



  @section('content')

    
<!-- Start Hero Area -->
<section class="hero-area">
<div class="container">
    <div class="row">
        <!-- Slider Section -->
        <div class="col-lg-8 col-12 custom-padding-right">
            <div class="slider-head">
                <!-- Hero Slider -->
                <div id="heroSlider" class="carousel slide shadow-sm rounded" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($listSlider as $index => $slider)
                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                            <img src="{{ asset($slider->image) }}" class="d-block w-100 rounded" style="height: 400px; object-fit: cover;" alt="Slider Image">
                        </div>
                        @endforeach
                    </div>
                    <!-- Carousel Controls -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#heroSlider" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#heroSlider" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    
        <!-- Banner Section -->
        <div class="col-lg-4 col-12">
            <div class="row g-3">
                <!-- Small Banner 1 -->
                <div class="col-12">
                    <div class="hero-small-banner shadow-sm rounded overflow-hidden position-relative" 
                        style="background-image: url('{{ asset('/') }}images/hero/slider-bg2.jpg'); background-size: cover; background-position: center;">
                        <div class="content p-3 text-white text-center bg-dark bg-opacity-50">
                            <h2 class="mb-2">
                                <span class="d-block text-uppercase small">Thiết Bị</span>
                                Camara Tốt
                            </h2>
                            <h3 class="fw-bold">259.99</h3>
                        </div>
                    </div>
                </div>
    
                <!-- Small Banner 2 -->
                <div class="col-12">
                    <div class="hero-small-banner style2 shadow-sm rounded overflow-hidden bg-light p-3">
                        <div class="content text-center">
                            <h2 class="fw-bold text-dark">Giảm giá hàng tuần!</h2>
                            <p class="text-muted">Tiết kiệm tới <span class="fw-bold text-danger">50% off</span> về tất cả các mặt hàng trong tuần này.</p>
                            <div class="button mt-3">
                                <a class="btn btn-primary btn-sm" href="#">Mua ngay</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
</section>
<!-- End Hero Area -->

<!-- Start Trending Product Area -->
<section class="trending-product section" style="margin-top: 12px;">
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="section-title">
                <h2>Sản phẩm</h2>
                <p>Chúng tôi cung cấp một bộ sưu tập đa dạng các sản phẩm chất lượng, từ những món đồ gia dụng thiết yếu đến các sản phẩm công nghệ tiên tiến. Mỗi sản phẩm được chọn lọc kỹ lưỡng, đảm bảo đáp ứng mọi nhu cầu và sở thích của khách hàng. Khám phá ngay hôm nay để tìm ra sản phẩm phù hợp nhất với bạn!</p>
            </div>
        </div>
    </div>
    
    <div class="row">
        @foreach ($products as $product)
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Product -->
                <div class="single-product">
                    <div class="product-image d-flex justify-content-center">
                        @if ($product->images->isNotEmpty())
                            <img src="{{ asset($product->images->first()->image_url) }}" 
                                 alt="{{ $product->name }}" 
                                 style="width: 200px; height: 200px; object-fit: cover;">
                        @endif
                        <div class="button">
                            <a href="{{ route('users.detailProduct', ['id' => $product->id]) }}" class="btn">
                                <i class="lni lni-cart"></i> Xem Thêm
                            </a>
                        </div>
                    </div>
                    <div class="product-info">
                        <span class="category">{{ $product->category->name ?? 'Uncategorized' }}</span>
                        <h4 class="title">
                            <a href="{{ route('users.detailProduct', ['id' => $product->id]) }}">
                                {{ $product->name }}
                            </a>
                        </h4>
                        <div class="price">
                            <span>{{ number_format($product->price) }}đ</span>
                        </div>
                    </div>
                </div>
                <!-- End Single Product -->
            </div>
        @endforeach
    </div>
    
    <div class="row mt-4">
        <div class="col-12">
            <!-- Pagination -->
            <div class="pagination left">
                <ul class="pagination-list d-flex justify-content-center">
                    <!-- Previous Button -->
                    @if ($products->onFirstPage())
                        <li class="disabled"><a href="javascript:void(0)"><i class="lni lni-chevron-left"></i></a></li>
                    @else
                        <li><a href="{{ $products->previousPageUrl() }}"><i class="lni lni-chevron-left"></i></a></li>
                    @endif
    
                    <!-- Page Numbers -->
                    @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                        @if ($page == $products->currentPage())
                            <li class="active"><a href="javascript:void(0)">{{ $page }}</a></li>
                        @else
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
    
                    <!-- Next Button -->
                    @if ($products->hasMorePages())
                        <li><a href="{{ $products->nextPageUrl() }}"><i class="lni lni-chevron-right"></i></a></li>
                    @else
                        <li class="disabled"><a href="javascript:void(0)"><i class="lni lni-chevron-right"></i></a></li>
                    @endif
                </ul>
            </div>
            <!--/ End Pagination -->
        </div>
    </div>
    
     <!-- Pagination Links -->
    {{-- <div class="d-flex justify-content-center mt-4">
        {{ $products->links('pagination::bootstrap-5') }}
    </div> --}}
</div>
</section>
<!-- End Trending Product Area -->

<!-- Start Call Action Area -->
<section class="call-action section">
    <div class="container">
        <div class="row ">
            <div class="col-lg-8 offset-lg-2 col-12">
                <div class="inner">
                    <div class="content">
                        <h2 class="wow fadeInUp" data-wow-delay=".4s">Hiện tại bạn đang sử dụng phiên bản miễn phí của website bán sách</h2>
                        <p class="wow fadeInUp" data-wow-delay=".6s">Hãy mua sách ngay để khám phá kho sách phong phú, đa dạng từ các thể loại như văn học, khoa học, kỹ năng sống và nhiều hơn nữa.</p>
                        <div class="button wow fadeInUp" data-wow-delay=".8s">
                            <a href="javascript:void(0)" class="btn">Mua Sách Ngay</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- End Call Action Area -->



<!-- Start Shipping Info -->
<section class="shipping-info">
    <div class="container">
        <ul>
            <!-- Vận Chuyển Miễn Phí -->
            <li>
                <div class="media-icon">
                    <i class="lni lni-delivery"></i>
                </div>
                <div class="media-body">
                    <h5>Vận Chuyển Miễn Phí</h5>
                    <span>Cho đơn hàng trên 100.000 VNĐ</span>
                </div>
            </li>
            <!-- Hỗ Trợ 24/7 -->
            <li>
                <div class="media-icon">
                    <i class="lni lni-support"></i>
                </div>
                <div class="media-body">
                    <h5>Hỗ Trợ 24/7</h5>
                    <span>Chát trực tiếp hoặc gọi điện.</span>
                </div>
            </li>
            <!-- Thanh Toán Trực Tuyến -->
            <li>
                <div class="media-icon">
                    <i class="lni lni-credit-cards"></i>
                </div>
                <div class="media-body">
                    <h5>Thanh Toán Trực Tuyến</h5>
                    <span>Dịch vụ thanh toán an toàn.</span>
                </div>
            </li>
            <!-- Đổi Trả Dễ Dàng -->
            <li>
                <div class="media-icon">
                    <i class="lni lni-reload"></i>
                </div>
                <div class="media-body">
                    <h5>Đổi Trả Dễ Dàng</h5>
                    <span>Mua sắm không lo lắng.</span>
                </div>
            </li>
        </ul>
    </div>
    
</section>
<!-- End Shipping Info -->
@endsection 