@extends('user.layouts.default')

@section('title', 'Giới Thiệu')

@section('content')

<section id="contact-us" class="contact-us section p-5 bg-light">
    <!-- Toast thông báo -->
    @if (session('success'))
        <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
            <div class="toast align-items-center text-bg-success border-0 show" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        {{ session('success') }}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        </div>
    @endif

    <div class="text-center mb-4">
        <h2 class="mb-3">Liên hệ với chúng tôi</h2>
        <p>{{$about->footer}}</p>
    </div>

    <div class="row g-4">
        <!-- Contact Info -->
        <div class="col-lg-4 col-md-6">
            <div class="border p-4 rounded">
                <div class="mb-3">
                    <i class="lni lni-map fs-2 text-primary"></i>
                </div>
                <h5>Địa chỉ</h5>
                <p>{{$setting->contact_address}}</p>
            </div>
            <div class="border p-4 rounded mt-4">
                <div class="mb-3">
                    <i class="lni lni-phone fs-2 text-primary"></i>
                </div>
                <h5>Hãy gọi cho chúng tôi</h5>
                <p>
                    <a href="tel:+18005554400" class="text-decoration-none">{{$setting->contact_phone}}</a><br>
                    
                </p>
            </div>
            <div class="border p-4 rounded mt-4">
                <div class="mb-3">
                    <i class="lni lni-envelope fs-2 text-primary"></i>
                </div>
                <h5>Mail </h5>
                <p>
                    <a href="mailto:support@shopgrids.com" class="text-decoration-none">{{$setting->contact_email }}</a><br>
                   
                </p>
            </div>
        </div>

        <!-- Contact Form -->
        <div class="col-lg-8 col-md-6">
            <div class="border p-4 rounded">
                <h5 class="mb-4">Gửi Tin Nhắn</h5>
                <form method="post" action="{{ route('users.storeContact') }}">
                    @method('PATCH')
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <input name="name" type="text" class="form-control" placeholder="Họ và tên" value="{{ old('name') }}" required>
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
        
                        <div class="col-md-6">
                            <input name="email" type="email" class="form-control" placeholder="Email của bạn" value="{{ old('email') }}" required>
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
        
                        <div class="col-md-6">
                            <input name="phone" type="text" class="form-control" placeholder="Số điện thoại" value="{{ old('phone') }}" required>
                            @error('phone')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
        
                        <div class="col-12">
                            <textarea name="feedback" class="form-control" rows="5" placeholder="Nội dung tin nhắn" required>{{ old('feedback') }}</textarea>
                            @error('feedback')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
        
                        <div class="col-12 text-end">
                            <button type="submit" class="btn btn-primary">Gửi Tin Nhắn</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
    </div>
</section>
<script>
    document.addEventListener('DOMContentLoaded', () => {
    const toastEl = document.querySelector('.toast');
    if (toastEl) {
        setTimeout(() => {
            toastEl.classList.remove('show');
        }, 5000); // 5 giây
    }
});

</script>
@endsection
