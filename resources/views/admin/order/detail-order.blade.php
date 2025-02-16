@extends('admin.layouts.default')

@section('title')
@parent
Chi Tiết Đơn Hàng
@endsection

@section('content')
<div class="container my-5">
    <div class="card shadow-sm">
        <div class="card-header">
            <h4 class="card-title fs-3 fw-bold">Chi Tiết Đơn Hàng #{{ $order->id }}</h4>
        </div>
        <div class="card-body">
            <!-- Buyer Information -->
            <div class="row mb-4">
                <div class="col-12 col-md-6">
                    <h5 class="fw-semibold">Thông tin người Mua</h5>
                    <p><strong>Họ và tên:</strong> {{ $order->recipient_name }}</p>
                </div>
                <div class="col-12 col-md-6">
                    <h5 class="fw-semibold">Số điện thoại</h5>
                    <p><strong>Điện thoại:</strong> {{ $order->phone }}</p>
                </div>
            </div>

            <!-- Shipping Address -->
            <div class="row mb-4">
                <div class="col-12 col-md-6">
                    <h5 class="fw-semibold">Địa chỉ giao hàng</h5>
                    <p><strong>Địa chỉ:</strong> {{ $order->address }}</p>
                </div>
            </div>

            <!-- Product Details Table -->
            <div class="row mb-4">
                <div class="col-12">
                    <h5 class="fw-semibold">Chi Tiết Sản Phẩm</h5>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">Sản phẩm</th>
                                <th class="text-center">Số lượng</th>
                                <th class="text-center">Giá</th>
                                <th class="text-center">Tổng</th>
                                <th class="text-center">Hình ảnh</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->orderDetails as $detail)
                                <tr>
                                    <td>{{ $detail->product->name }}</td>
                                    <td class="text-center">{{ $detail->quantity }}</td>
                                    <td class="text-center">{{ number_format($detail->product->price) }} VND</td>
                                    <td class="text-center">{{ number_format($detail->total) }} VND</td>
                                    <td class="text-center">
                                        <img src="{{ asset($detail->product->images->first()->image_url ?? 'default-image.jpg') }}" 
                                             alt="Product Image" class="img-thumbnail" style="max-width: 80px;">
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Total Price -->
            <div class="row">
                <div class="col-12">
                    <p><strong>Tổng tiền đơn hàng:</strong> {{ number_format($order->total_price) }} VND</p>
                </div>
            </div>
        </div>
        <div class="card-footer text-center">
            <a href="{{ route('admin.orders.listOrders') }}" class="btn btn-primary">Quay lại danh sách đơn hàng</a>
        </div>
    </div>
</div>
@endsection
