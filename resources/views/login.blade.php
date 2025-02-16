@extends('user.layouts.default')

@section('title', 'Đăng Nhập')

@section('content')

<div class="account-login section py-5">
    <div class="container">
        <!-- Hiển thị thông báo thành công -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Hiển thị lỗi -->
        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Form đăng nhập -->
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 col-12">
                <div class="card shadow-lg border-0">
                    <div class="card-body p-5">
                        <div class="text-center mb-4">
                            <h3 class="mb-2">Đăng Nhập Ngay</h3>
                            <p class="text-muted">Đăng nhập bằng tài khoản mạng xã hội hoặc địa chỉ email của bạn.</p>
                        </div>

                        <!-- Đăng nhập qua mạng xã hội -->
                        <div class="mb-4">
                            <div class="d-flex justify-content-between gap-2">
                                <a class="btn btn-outline-primary w-100 d-flex align-items-center justify-content-center" href="#">
                                    <i class="lni lni-facebook-filled me-2"></i> Facebook
                                </a>
                                <a class="btn btn-outline-info w-100 d-flex align-items-center justify-content-center" href="#">
                                    <i class="lni lni-twitter-original me-2"></i> Twitter
                                </a>
                                <a class="btn btn-outline-danger w-100 d-flex align-items-center justify-content-center" href="#">
                                    <i class="lni lni-google me-2"></i> Google
                                </a>
                            </div>
                        </div>

                        <!-- Dòng phân cách -->
                        <div class="text-center my-3">
                            <span class="text-muted">Hoặc đăng nhập bằng email của bạn</span>
                        </div>

                        <!-- Form Đăng Nhập -->
                        <form method="post" action="{{ route('postlogin') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Tên Người Dùng</label>
                                <input 
                                    type="text" 
                                    class="form-control @error('name') is-invalid @enderror" 
                                    name="name" 
                                    id="name" 
                                    value="{{ old('name') }}" 
                                    required
                                >
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Mật khẩu</label>
                                <input 
                                    type="password" 
                                    class="form-control @error('password') is-invalid @enderror" 
                                    name="password" 
                                    id="password" 
                                    required
                                >
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div class="form-check">
                                    <input 
                                        type="checkbox" 
                                        class="form-check-input" 
                                        id="remember" 
                                        name="remember"
                                    >
                                    <label class="form-check-label" for="remember">Nhớ tôi</label>
                                </div>
                                <a class="text-decoration-none small" href="#">Quên mật khẩu?</a>
                            </div>

                            <button type="submit" class="btn btn-primary w-100 py-2">Đăng Nhập</button>
                        </form>

                        <!-- Liên kết đăng ký -->
                        <p class="text-center mt-4 mb-0 text-muted">
                            Chưa có tài khoản? 
                            <a href="{{ route('register') }}" class="text-primary text-decoration-none">Đăng ký tại đây</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
