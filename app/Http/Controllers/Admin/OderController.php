<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class OderController extends Controller
{
    public function listOrders()
    {
        $orders = Order::with('orderDetails.product')->get();  // Lấy các đơn hàng cùng với chi tiết sản phẩm


        return view('admin.order.list-order', compact('orders'));
    }

    // Xóa đơn hàng
    public function deleteOrder($id)
    {
        // Lấy đơn hàng và các chi tiết đơn hàng
        $order = Order::with('orderDetails')->findOrFail($id);

        // Xóa các chi tiết đơn hàng
        $order->orderDetails()->delete();

        // Sau khi đã xóa chi tiết, có thể xóa đơn hàng
        $order->delete();


        return redirect()->route('admin.orders.listOrders')->with('message', 'Đơn hàng đã được xóa thành công!');
    }

    public function showOrder($id)
    {
        // Truy vấn chi tiết đơn hàng theo ID, bao gồm thông tin chi tiết đơn hàng, sản phẩm, và người dùng
        $order = Order::where('id', $id)
            ->with([
                'orderDetails.product:id,name,price', 
                'orderDetails.product.category:id,name',   
                'orderDetails.product.images:id,product_id,image_url',                                
            ])
            ->firstOrFail();
    
        // Trả về view chi tiết đơn hàng
        return view('admin.order.detail-order', compact('order'));
    }
}    
