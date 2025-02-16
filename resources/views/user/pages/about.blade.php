@extends('user.layouts.default')

@section('title', 'Gioi Thiệu')

@section('content')

<section class="team section">
    <div class="container">
      <!-- About Section -->
<!-- About Section -->
<div class="row mb-5">
    <!-- Left Content (About Title) -->
    <div class="col-12 mb-4">
        <div class="content-left">
            <h2 class="section-title">{{ $about->content ?? 'Default About Content' }}</h2>
        </div>
    </div>
    
    <!-- Right Content (About Footer) -->
    <div class="col-12">
        <div class="content-right">
            <p>{{ $about->footer ?? 'Default Footer Content' }}</p>
        </div>
    </div>
</div>


        <!-- Team Section -->
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>Người Tạo Web</h2>
                    <p>Gặp gỡ những người biến mọi thứ thành có thể. Đội ngũ của chúng tôi tận tâm và có kỹ năng trong nghề của họ.

                    </p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            @forelse ($userAdmin as $member)
            <div class="col-auto col-lg-3 col-md-6 col-12">
                <!-- Start Single Team -->
                <div class="single-team text-center shadow rounded p-3">
                    <div class="image">
                        <!-- Set a fixed size for the image and ensure it covers the area -->
                        <img src="{{ asset($member->image) }}" alt="{{ $member->name }}" class="img-fluid fixed-image" style="height:250px; object-fit: cover;">
                    </div>
                    <div class="content mt-3">
                        <h3>{{ $member->name }}</h3>
                        {{-- <h5>{{ $member->position }}</h5> --}}
                        <ul class="social list-inline mt-2">
                            <li class="list-inline-item"><a href="{{ $member->facebook ?? '#' }}"><i class="lni lni-facebook-filled"></i></a></li>
                            <li class="list-inline-item"><a href="{{ $member->twitter ?? '#' }}"><i class="lni lni-twitter-original"></i></a></li>
                            <li class="list-inline-item"><a href="{{ $member->skype ?? '#' }}"><i class="lni lni-skype"></i></a></li>
                        </ul>
                    </div>
                </div>
                <!-- End Single Team -->
            </div>
            @empty
            <div class="col-12 text-center">
                <p class="text-muted">No admin members available at the moment.</p>
            </div>
            @endforelse
        </div>
        
    </div>
</section>


@endsection