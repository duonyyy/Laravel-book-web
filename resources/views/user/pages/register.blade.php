@extends('user.layouts.default')
@section('title')
    Đăng Ký
@endsection

@section('content')
    <!-- Bắt đầu khu vực Đăng Ký Tài Khoản -->
    <div class="account-login section py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8 col-12">
                    <div class="card shadow-lg border-0">
                        <div class="card-body p-5">
                            <div class="text-center mb-4">
                                <h3 class="mb-2">Chưa có tài khoản? Đăng ký ngay</h3>
                                <p class="text-muted">Chỉ mất chưa đến một phút để đăng ký và bạn có thể quản lý hoàn toàn các đơn hàng của mình.</p>
                            </div>
                            <form method="post" action="{{ route('postRegister') }}">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="reg-fn" class="form-label">Họ và Tên</label>
                                        <input 
                                            class="form-control @error('first_name') is-invalid @enderror" 
                                            type="text" 
                                            id="reg-fn" 
                                            name="name" 
                                            value="{{ old('first_name') }}" 
                                            required
                                        >
                                        @error('first_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label for="reg-email" class="form-label">Địa Chỉ Email</label>
                                        <input 
                                            class="form-control @error('email') is-invalid @enderror" 
                                            type="email" 
                                            id="reg-email" 
                                            name="email" 
                                            value="{{ old('email') }}" 
                                            required
                                        >
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label for="reg-pass" class="form-label">Mật Khẩu</label>
                                        <input 
                                            class="form-control @error('password') is-invalid @enderror" 
                                            type="password" 
                                            id="reg-pass" 
                                            name="password" 
                                            required
                                        >
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="reg-pass-confirm" class="form-label">Xác Nhận Mật Khẩu</label>
                                        <input 
                                            class="form-control" 
                                            type="password" 
                                            id="reg-pass-confirm" 
                                            name="password_confirmation" 
                                            required
                                        >
                                    </div>
                                    
                                <div class="mt-4">
                                    <button class="btn btn-primary w-100 py-2" type="submit">Đăng Ký</button>
                                </div>
                                <p class="text-center mt-3 mb-0">
                                    Đã có tài khoản? 
                                    <a href="{{ route('login') }}" class="text-primary text-decoration-none">Đăng Nhập Ngay</a>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Kết thúc khu vực Đăng Ký Tài Khoản -->
@endsection
