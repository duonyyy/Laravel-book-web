@extends('admin.layouts.default')

@section('title')
@parent 
Danh Sách Phản Hồi
@endsection

@push('style')
<style>
    .toast-container {
        position: fixed;
        bottom: 20px;
        right: 20px;
        z-index: 9999;
    }
    .table th, .table td {
        vertical-align: middle;
    }
    .card-header {
        background-color: #f8f9fa;
        border-bottom: 2px solid #e0e0e0;
    }
    .modal-content {
        border-radius: 8px;
    }
</style>
@endpush

@section('content')   
<div class="h1"></div>
<div class="d-flex">
    <div id="kt_app_content_container" class="app-container container-fluid">
        <div class="col-xl-12 mb-5 mb-xl-10">
            @if (session('message'))
                <div class="toast-container">
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
                
            <div class="card card-flush h-xl-100">
                <div class="card-header pt-5 w-100">
                    <div class="d-flex justify-content-between mb-10 w-100">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold text-gray-800">
                                Danh Sách Phản Hồi
                            </span>
                        </h3>
                    </div>
                </div>

                <div class="card-body pt-2">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="kt_stats_widget_16_tab_1">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-bordered align-middle table-bordered" id="dataTables-example">
                                    <thead class="table-light">
                                        <tr class="text-center">
                                            <th>STT</th>
                                            <th>Tên</th>
                                            <th>Điện thoại</th>
                                            <th>Phản hồi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($listFeedback as $key => $value)
                                        <tr>
                                            <td class="text-center">{{ $key + 1 }}</td>
                                            <td>{{$value->name }}</td>
                                            <td >{{ $value->phone }}</td>
                                            <td>{{ $value->feedback}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>  


@endsection
