<?php

namespace App\Http\Controllers\User;

use App\Models\Cart;
use App\Models\CartDetail;
use App\Models\ProductComment;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Can;
use Illuminate\Database\Eloquent\ModelNotFoundException;



class ClientController extends Controller
{
    public function addToCart(Request $req)
    {
        // Kiểm tra dữ liệu đầu vào
        // $req->validate([
        //     'product_id' => 'required|exists:products,id', // Đảm bảo sản phẩm tồn tại
        //     'quantity' => 'required|integer|min:1', // Đảm bảo số lượng là số nguyên dương
        // ]);

        // Kiểm tra giỏ hàng hiện tại của người dùng
        $cart = Cart::where('user_id', Auth::id())->first();

        if ($cart) {
            // Kiểm tra xem chi tiết giỏ hàng cho sản phẩm đã tồn tại chưa
            $cartDetail = CartDetail::where('cart_id', $cart->id)
                ->where('product_id', $req->productId)
                ->first();

            if ($cartDetail) {
                // Cập nhật số lượng nếu sản phẩm đã tồn tại trong giỏ hàng
                $cartDetail->update([
                    'quantity' => intval($cartDetail->first()->quantity) + intval($req->quantity) // Cộng thêm số lượng yêu cầu
                ]);
            } else {
                // Thêm chi tiết giỏ hàng mới nếu sản phẩm chưa tồn tại trong giỏ
                CartDetail::create([
                    'cart_id' => $cart->id,
                    'product_id' => $req->productId,
                    'quantity' => $req->quantity,
                ]);
            }
        } else {
            // Tạo giỏ hàng mới cho người dùng nếu chưa có giỏ hàng
            $newCart = Cart::create([
                'user_id' => Auth::id()
            ]);

            // Thêm sản phẩm vào giỏ hàng mới
            CartDetail::create([
                'cart_id' => $newCart->id,
                'product_id' => $req->productId, // Sử dụng product_id ở đây
                'quantity' => $req->quantity,
            ]);
        }

        // Chuyển hướng đến trang hiển thị giỏ hàng
        return redirect()->route('users.cart');
    }




    public function cart()
    {
        $cart = Cart::where('user_id', Auth::id())
            ->with('cartDetails:id,cart_id,product_id,quantity')
            ->with('cartDetails.product:id,name,price')
            ->with('cartDetails.product.category:id,name')
            ->with('cartDetails.product.images:id,product_id,image_url')
            ->first();

        return view('user.pages.cart')->with([
            'cart' => $cart
        ]);
    }

    public function updateCart(Request $req)
    {
        foreach ($req->cartDetailId as $key => $cartDetailId) {
            CartDetail::find($cartDetailId)->update([
                'quantity' => $req->quantity[$key]
            ]);
        }

        // Chỉ trả về sau khi xử lý tất cả các cart detail
        return redirect()->back()->with([
            'message' => 'Cập nhật thành công!'
        ]);
    }




    public function deleteCart($cartItemId)
    {
        $cartDetail = CartDetail::find($cartItemId);

        if ($cartDetail) {
            $cartDetail->delete();
        }

        return redirect()->back()->with('success', 'Sản phẩm đã được xóa khỏi giỏ hàng');
    }

    ///// cmt


    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:product,id',
            'comment' => 'required|string|max:500',
            'parent_id' => 'nullable', // Check if it's a valid top-level comment if replying
        ]);

        // Create the comment or reply
        ProductComment::create([
            'product_id' => $validated['product_id'],
            'user_id' => auth()->id(),
            'comment' => $validated['comment'],
            'parent_id' => $validated['parent_id'] ?? null,
        ]);



        return back();
    }



    // Delete Comment
    public function deleteComment($id)
    {
        $comment = ProductComment::findOrFail($id);

        // Ensure the logged-in user is the owner of the comment
        if ($comment->user_id !== auth()->id()) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }

        $comment->delete();

        return redirect()->back()->with('success', 'Comment deleted successfully.');
    }
}
