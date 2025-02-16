@extends('user.layouts.default')
  @section('title')
    Sản phẩm liên quan
  @endsection

  @section('content')
 
  <div class="container py-5">
      <h1 class="mb-4">Danh Sách Đơn Hàng</h1>
  
      @if(session('message'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('message') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
      @endif
  
      <div class="card">
          <div class="card-header bg-primary text-white">
              <h5 class="mb-0">Danh Sách Đơn Hàng</h5>
          </div>
          <div class="card-body">
              @if($orders->isEmpty())
                  <p class="text-center">Không có đơn hàng nào.</p>
              @else
                  <table class="table table-bordered table-striped">
                      <thead class="bg-light">
                          <tr>
                              <th>STT</th>
                              <th>Người dùng</th>
                              <th>Địa chỉ</th>
                              <th>Chi tiết</th>
                              <th>Tổng tiền</th>
                              <th>Thao tác</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($orders as $key => $order)
                              <tr>
                                  <td>{{ $key + 1 }}</td>
                                  <td>{{ $order->recipient_name ?? 'N/A' }}</td>
                                  <td>{{ $order->address }}</td>
                                  <td>
                                      <ul>
                                          @foreach($order->orderDetails as $detail)
                                              <li>
                                                  {{ $detail->product->name ?? 'Sản phẩm không tồn tại' }} 
                                                  (x{{ $detail->quantity }}) - 
                                                  {{ number_format($detail->price) }} VND
                                              </li>
                                          @endforeach
                                      </ul>
                                  </td>
                                  <td>{{ number_format($order->orderDetails->sum('total')) }} VND</td>
                                  <td class="text-center">
                                    <a href="{{ route('users.orders.show', ['id' => $order->id]) }}" class="btn btn-sm btn-info">Xem</a>
                                  </td>
                              </tr>
                          @endforeach
                      </tbody>
                  </table>
              @endif
          </div>
      </div>
  </div>

  
  @endsection