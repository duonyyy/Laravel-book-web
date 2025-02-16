@extends('admin.layouts.default')

@section('title', 'Gửi Email')

@section('content')


<div class="container-fluid">
    <div class="col-xl-12 mb-5">

          <!-- Toast Notification -->
          @if (session('message'))
          <div class="position-fixed bottom-0 end-0 p-3 toast-container">
              <div class="toast align-items-center text-bg-success border-0 show" role="alert" aria-live="assertive" aria-atomic="true">
                  <div class="d-flex">
                      <div class="toast-body">
                          {{ session('message') }}
                      </div>
                      <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                  </div>
              </div>
          </div>
          @endif
          
        <div class="container mt-5">
            <h3 class="text-center mb-4">Gửi Email đến Nhiều Người</h3>
            <form action="{{ route('admin.email.sendEmailToMultiple') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="subject" class="form-label">Tiêu Đề Email</label>
                    <input type="text" name="subject" id="subject" class="form-control" placeholder="Nhập tiêu đề email" required>
                </div>
                <div class="mb-3">
                    <label for="body" class="form-label">Nội Dung Email</label>
                    <textarea name="body" id="body" class="form-control" rows="5" placeholder="Nhập nội dung email" required></textarea>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Gửi Email</button>
                </div>
            </form>
        </div>
       </div>
    </div> 
@endsection
