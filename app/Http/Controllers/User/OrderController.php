<?php


namespace App\Http\Controllers\User;


use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class OrderController extends Controller

{
    
    public function showCheckout()
    {
        // Lấy giỏ hàng và các chi tiết liên quan
        $cart = Cart::where('user_id', Auth::id())
            ->with('cartDetails:id,cart_id,product_id,quantity')
            ->with('cartDetails.product:id,name,price,category_id')
            ->with('cartDetails.product.category:id,name')
            ->with('cartDetails.product.images:id,product_id,image_url')
            ->first();
    
        // Kiểm tra nếu giỏ hàng rỗng
        if (!$cart || $cart->cartDetails->isEmpty()) {
            return redirect()->route('users.cart')->with('message', 'Giỏ hàng của bạn đang trống.');
        }
    
        // Tính tổng tiền và phí vận chuyển
        $subtotal = $cart->cartDetails->sum(function ($cartDetail) {
            return $cartDetail->product->price * $cartDetail->quantity;
        });
        $shippingFee = 30000; // Giả sử phí vận chuyển cố định
    
        // Trả về view 'checkout' với dữ liệu
        return view('user.pages.checkout', compact('cart', 'subtotal', 'shippingFee'));
    }
    

    public function listOrderUser()
    {
        $userId = Auth::id(); 
        $orders = Order::with('orderDetails.product')
            ->where('user_id', $userId) 
            ->get();
        return view('user.pages.orderPage', compact('orders')); 
    }
    

    public function showOrder($id)
    {
        // Lấy ID người dùng hiện đang đăng nhập
        $userId = auth()->id();
    
        // Truy vấn đơn hàng theo ID và đảm bảo thuộc về người dùng hiện tại
        $order = Order::with([
                'orderDetails.product' => function ($query) {
                    $query->select('id', 'name', 'price'); // Lấy các cột cần thiết của sản phẩm
                },
                'orderDetails.product.category' => function ($query) {
                    $query->select('id', 'name'); // Lấy tên danh mục của sản phẩm
                },
                'orderDetails.product.images' => function ($query) {
                    $query->select('id', 'product_id', 'image_url'); // Lấy ảnh sản phẩm
                }
            ])
            ->where('id', $id)
            ->where('user_id', $userId) // Đảm bảo đơn hàng thuộc về người dùng đăng nhập
            ->firstOrFail(); // Nếu không tìm thấy đơn hàng, trả về lỗi 404
    
        // Trả dữ liệu cho view
        return view('user.pages.show-order', compact('order'));
    }
    


    public function processCheckout(Request $request)
    {
        // Xác thực dữ liệu đầu vào
        $request->validate([
            'recipient_name' => 'required|string|max:255',
            'address' => 'required|string|max:500',
        ]);
    
        // Lấy giỏ hàng
        $cart = Cart::with('cartDetails.product')->where('user_id', auth()->id())->first();
    
        // Kiểm tra nếu giỏ hàng trống
        if (!$cart || $cart->cartDetails->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Giỏ hàng của bạn đang trống.');
        }
    
        // Sử dụng giao dịch để đảm bảo tính toàn vẹn dữ liệu
        
    
            // Tạo đơn hàng
            $order = Order::create([
                'user_id' => auth()->id(),
                'recipient_name' => $request->recipient_name,
                'phone' => $request->phone,
                'address' => $request->address,
                'total_price' => $cart->cartDetails->sum(function ($detail) {
                    return $detail->product->price * $detail->quantity;
                }),
            ]);
    
            // Tạo chi tiết đơn hàng
            foreach ($cart->cartDetails as $detail) {
                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $detail->product_id,
                    'quantity' => $detail->quantity,
                    'price' => $detail->product->price,
                    'total' => $detail->product->price * $detail->quantity,
                ]);
            }
    
            // Xóa giỏ hàng và chi tiết giỏ hàng
            $cart->cartDetails()->delete();
            $cart->delete();
    
         
    
            return redirect()->route('users.home')->with('success', 'Đặt hàng thành công!');
    
            return redirect()->route('users.home')->with('error', 'Đã xảy ra lỗi khi xử lý đơn hàng. Vui lòng thử lại.');
        }
    
    
}
