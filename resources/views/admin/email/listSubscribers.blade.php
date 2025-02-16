@extends('admin.layouts.default')

@section('title')
@parent 
Danh Sách Người Đăng Ký
@endsection

@push('style')
<style>
    .toast-container {
        z-index: 1055;
    }
</style>
@endpush

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

        <!-- Card Section -->
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title fw-bold text-gray-800">
                    Danh Sách Người dùng Đăng Ký
                </h3>
                <a href="{{route('admin.email.viewSendMail')}}" class="btn btn-sm fw-bold btn-primary" >Gửi Thư  </a>
            </div>
            <div class="card-body">
                <!-- Table -->
                <div class="table-responsive">
                    <table class="table table-bordered table-striped align-middle text-center">
                        <thead>
                            <tr class="fw-bold text-gray-500">
                                <th>STT</th>
                                <th>EMAIL</th>
                                <th>HÀNH ĐỘNG</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($listSub as $key => $value)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $value->email }}</td>
                                <td>
                                    <a href="#" data-id="{{ $value->id }}" data-bs-toggle="modal" data-bs-target="#modalDelete" class="text-danger">
                                        <i class="fa-solid fa-trash fs-5"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
{{-- <div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="modalDeleteLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalDeleteLabel">Xác Nhận Xóa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Bạn có chắc chắn muốn xóa người dùng này không?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                <form method="POST" action="{{ route('subscribers.delete') }}">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" id="deleteSubscriberId" name="id">
                    <button type="submit" class="btn btn-danger">Xóa</button>
                </form>
            </div>
        </div>
    </div>
</div> --}}

@push('scripts')
<script>
    document.querySelectorAll('[data-bs-target="#modalDelete"]').forEach(button => {
        button.addEventListener('click', () => {
            const id = button.getAttribute('data-id');
            document.getElementById('deleteSubscriberId').value = id;
        });
    });
</script>
@endpush
@endsection
