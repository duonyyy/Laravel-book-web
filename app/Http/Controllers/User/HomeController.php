<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\FeedbackContact;
use App\Models\ProductImage;
use App\Models\Sliders;
use App\Models\Social;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        // Lấy tất cả sản phẩm từ bảng products và eager load các quan hệ
        $products = Product::with('images:id,product_id,image_url')  // Quan hệ với bảng images
            ->with('category:id,name')  // Quan hệ với bảng category
            ->paginate(8); // Hiển thị 8 sản phẩm mỗi trang
        $listSlider = Sliders::select('id', 'title', 'image')->get();

        // Trả về view 'user.home' và truyền dữ liệu 'products'
        return view('user.pages.home', compact('products', 'listSlider',));
    }

    // tìm kiếm sản phảm 
    public function SearchProduct(Request $request)
    {

        $search = $request->search;
        $productsQuery = Product::with('images:id,product_id,image_url')
            ->with('category:id,name');
        if (!empty($search)) {
            $productsQuery->where('name', 'like', '%' . $search . '%');
        }
        $products = $productsQuery->paginate(8);
        if ($products->isEmpty()) {
            return view('user.pages.no-results', ['search' => $search]);
        }
        return view('user.pages.search-results', compact('products', 'search'));
    }

    public  function categoryProducts($categoryId)
    {
        $category_products = Product::with(['images:id,product_id,image_url', 'category:id,name'])
            ->where('category_id', $categoryId)  // Filter products by category_id
            ->get();  // Get the products for that category
        return view('user.pages.category_product', compact('category_products'));
    }


    public function detailProduct($id)
    {
        // Fetch the product with related images, comments, and their users
        $product = Product::with([
            'images:id,product_id,image_url,image_type',
            'comments.user:id,name',
            'comments.replies.user:id,name'
        ])->findOrFail($id);

        // Fetch all categories
        $categories = Category::all();

        // Return the view with the product and category data
        return view('user.pages.productDetail')->with([
            'product' => $product,
            'categories' => $categories
        ]);
    }


  
}
