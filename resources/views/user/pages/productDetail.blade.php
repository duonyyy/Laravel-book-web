@extends('user.layouts.default')

@section('title')
    {{ $product->name }}
@endsection

@section('content')
    <!-- Bắt đầu Chi Tiết Sản Phẩm -->
    <section class="item-details section">
        <div class="container">
            <div class="top-area">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="product-images">
                            <!-- Thành phần Carousel -->
                            <div id="product-image-{{ $product->id }}" class="carousel slide" data-bs-ride="carousel">
                                <!-- Chỉ báo Carousel -->
                                <div class="carousel-indicators">
                                    @foreach($product->images as $index => $image)
                                        <button 
                                            type="button" 
                                            data-bs-target="#product-image-{{ $product->id }}" 
                                            data-bs-slide-to="{{ $index }}" 
                                            class="{{ $index == 0 ? 'active' : '' }}" 
                                            aria-label="Slide {{ $index + 1 }}">
                                        </button>
                                    @endforeach
                                </div>
                        
                                <!-- Nội dung Carousel -->
                                <div class="carousel-inner">
                                    @foreach($product->images as $index => $image)
                                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                            <img src="{{ asset($image->image_url) }}" 
                                                 class="d-block w-100" 
                                                 style="height: 600px; object-fit: cover;" 
                                                 alt="{{ $image->image_type == 'main' ? 'Hình chính của ' . $product->name : 'Hình phụ của ' . $product->name }}">
                                        </div>
                                    @endforeach
                                </div>
                        
                                <!-- Điều khiển Carousel -->
                                <button 
                                    class="carousel-control-prev" 
                                    type="button" 
                                    data-bs-target="#product-image-{{ $product->id }}" 
                                    data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Trước</span>
                                </button>
                                <button 
                                    class="carousel-control-next" 
                                    type="button" 
                                    data-bs-target="#product-image-{{ $product->id }}" 
                                    data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Tiếp theo</span>
                                </button>
                            </div>
                        
                            <!-- Thư viện hình thu nhỏ -->
                            <main id="gallery" class="mt-3">
                                <div class="row g-2">
                                    @foreach($product->images as $index => $image)
                                        <div class="col-3">
                                            <img src="{{ asset($image->image_url) }}" 
                                                 class="img-thumbnail" 
                                                 style="cursor: pointer; height: 100px; object-fit: cover;" 
                                                 data-bs-target="#product-image-{{ $product->id }}" 
                                                 data-bs-slide-to="{{ $index }}" 
                                                 alt="{{ $image->image_type == 'main' ? 'Hình thu nhỏ chính' : 'Hình thu nhỏ phụ' }}">
                                        </div>
                                    @endforeach
                                </div>
                            </main>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="product-info">
                            <h2 class="title">{{ $product->name }}</h2>
                            <p class="category">
                                <i class="lni lni-tag"></i> Danh mục:
                                <a href="javascript:void(0)">{{ $product->category->name }}</a>
                            </p>
                            <h3 class="price">{{ number_format($product->price) }}đ</h3>
                            <div class="row align-items-end">
                                <form action="{{ route('users.addToCart') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="productId" value="{{ $product->id }}">
                                    <div class="col-lg-4 col-md-4 col-12" style="margin-bottom:5px;">
                                        <div class="form-group quantity">
                                            <label for="quantity">Số lượng</label>
                                            <input type="number" name="quantity" class="form-control form-control-lg" min="1" value="1" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-12">
                                        <div class="button cart-button">
                                            <button class="btn" style="width: 100%;">Thêm vào giỏ hàng</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="product-details-info">
                <div class="single-block">
                    <h4>Chi tiết</h4>
                    <p class="card-text">{{ strip_tags($product->description) }}</p>
                </div>

                <div class="col-12">
                    <!-- Phần Bình luận -->
                    <div class="card mt-3 border-0">
                        <div class="card-body p-5">
                            <h4 class="mb-4 text-dark">Bình luận gần đây</h4>
                            <p class="text-muted mb-5">Phần bình luận mới nhất từ người dùng</p>
                
                            @forelse($product->comments->where('parent_id', null) as $comment)
                                <div class="mb-4 p-3 rounded bg-white shadow-sm">
                                    <div class="d-flex align-items-start mb-3">
                                        
                                        <div>
                                            <h6 class="fw-bold mb-1">{{ $comment->user->name ?? 'Ẩn danh' }}</h6>
                                            <small class="text-muted d-block mb-2">{{ $comment->created_at->format('d F, Y') }}</small>
                                        </div>
                                    </div>
                                    <p class="text-muted">{{ $comment->comment }}</p>
                                    <div class="d-flex justify-content-end">
                                        @if(auth()->id() === $comment->user_id)
                                            <form action="{{ route('users.deleteComment', $comment->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger btn-sm">
                                                    <i class="fas fa-trash-alt"></i> Xóa
                                                </button>
                                            </form>
                                        @endif
                                        <button class="btn btn-outline-primary btn-sm ms-2 reply-btn" data-comment-id="{{ $comment->id }}">
                                            <i class="fas fa-reply"></i> Trả lời
                                        </button>
                                    </div>
                
                                    <!-- Phần Trả lời -->
                                    @if($comment->replies->isNotEmpty())
                                        <div class="mt-3 ms-3 border-start ps-3">
                                            @foreach($comment->replies as $reply)
                                                <div class="mb-2 p-3 rounded bg-light shadow-sm">
                                                    <strong>{{ $reply->user->name ?? 'Ẩn danh' }}</strong>
                                                    <small class="text-muted">{{ $reply->created_at->format('d F, Y') }}</small>
                                                    <p>{{ $reply->comment }}</p>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            @empty
                                <p class="text-muted">Chưa có bình luận nào. Hãy là người đầu tiên bình luận!</p>
                            @endforelse
                
                            <!-- Form Thêm Bình luận -->
                            <h5 class="mb-4">Thêm bình luận</h5>
                            <form action="{{ route('users.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <div class="form-floating mb-3">
                                    <textarea class="form-control" name="comment" placeholder="Để lại bình luận ở đây" id="commentTextarea" style="height: 120px" required></textarea>
                                    <label for="commentTextarea">Bình luận của bạn</label>
                                </div>
                                <button type="submit" class="btn btn-primary">Gửi</button>
                            </form>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    <!-- Kết thúc Chi Tiết Sản Phẩm -->

    <!-- Mẫu Modal Bình luận -->
    {{-- <div id="replyFormTemplate" class="d-none">
    <form action="{{ route('users.store') }}" method="POST" class="mt-3">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <input type="hidden" name="parent_id" value=""> <!-- Trường này sẽ được đặt động -->
        <div class="form-floating mb-3">
            <textarea class="form-control" name="comment" placeholder="Viết câu trả lời của bạn ở đây" required></textarea>
            <label>Trả lời</label>
        </div>
        <button type="submit" class="btn btn-primary btn-sm">Gửi</button>
    </form>
</div> --}}

    <!-- Modal Đánh Giá -->
    {{-- <div class="modal fade review-modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Đánh giá sản phẩm</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('users.storeReview', $product->id) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="rating" class="form-label">Đánh giá</label>
                            <select class="form-select" name="rating" id="rating" required>
                                <option value="1">1 sao</option>
                                <option value="2">2 sao</option>
                                <option value="3">3 sao</option>
                                <option value="4">4 sao</option>
                                <option value="5">5 sao</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="review" class="form-label">Nhận xét</label>
                            <textarea class="form-control" id="review" name="review" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Gửi Đánh Giá</button>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
