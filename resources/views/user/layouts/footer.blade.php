<footer class="footer">
    <!-- Start Footer Top -->
    <div class="footer-top">
        <div class="container">
            <div class="inner-content">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-12">
                        <div class="footer-logo">
                            <a href="index.html">
                                <img src="{{asset('/')}}images/logo/white-logo.svg" alt="#">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-8 col-12">
                        <div class="footer-newsletter">
                            <h4 class="title">
                                Đăng ký nhận bản tin của chúng tôi
                                <span>Nhận tất cả các thông tin mới nhất, Bán hàng và Ưu đãi.</span>
                            </h4>
                            <div class="newsletter-form-head">
                                <form action="{{ route('users.storeSubscriber') }}" method="POST" class="newsletter-form">
                                    @csrf <!-- Token bảo mật Laravel -->
                                    @method('POST')
                                    <!-- Input Email -->
                                    <input name="email" placeholder="Nhập Mail..." type="email" required class="form-control">
                            
                                    <!-- Hiển thị lỗi nếu có -->
                                    @if ($errors->has('email'))
                                        <div class="error-message" style="color: red; font-size: 14px;">
                                            {{ $errors->first('email') }}
                                        </div>
                                    @endif
                            
                                    <!-- Nút gửi -->
                                    <div class="button">
                                        <button type="submit" class="btn">Đăng Ký<span class="dir-part"></span></button>
                                    </div>
                                </form>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer Top -->
    <!-- Start Footer Middle -->
    <div class="footer-middle">
        <div class="container">
            <div class="bottom-inner">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer f-contact">
                            <h3>Liên hệ với chúng tôi</h3>
                            <p class="phone">Phone: {{$setting->contact_phone}}</p>
                           
                            <p class="mail">
                                <a href="#">{{$setting->contact_email}}</a>
                            </p>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                    <!-- Bản đồ Google -->
                       
                    <div class="col-lg-3 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer f-link">
                            <h3>Mạng Xã Hội</h3>
                            <ul>
                                @foreach ($listSocial as $item)
                                <li><a href="{{$item->url}}">{{$item->title}}</a></li>
                                @endforeach
                              
                               
                            </ul>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer f-link">
                            <h3>Giới Thiệu</h3>
                            <p>{{ Str::limit($about->footer, 335, '...') }}</p>
                        </div>
                        
                        <!-- End Single Widget -->
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="single-footer f-link">
                        <h3>Bản Đồ</h3>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.6055314132323!2d106.67074501099633!3d10.76485388933896!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752ee10a9f249b%3A0x54af0b8f63e60391!2zMzMgxJAuIFbEqW5oIFZp4buFbiwgUGjGsOG7nW5nIDIsIFF14bqtbiAxMCwgVGjDoG5oIHBo4buRIEjhu5MgQ2jDrCBNaW5oLCBWaWV0bmFt!5e0!3m2!1sen!2s!4v1714299849880!5m2!1sen!2s" 
                        width="300" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer Middle -->
    <!-- Start Footer Bottom -->
    <div class="footer-bottom">
        <div class="container">
            <div class="inner-content">
                <div class="row align-items-center">
                   
                    <div class="col-lg-4 col-12">
                        <div class="copyright">
                            <p>Designed and Developed by<a href="https://graygrids.com/" rel="nofollow"
                                    target="_blank">Tùng Dương</a></p>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer Bottom -->
</footer>