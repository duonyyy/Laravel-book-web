<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenController extends Controller
{
    public function dashboard()
    {
        $countUser = User::count();
        $countProduct = Product::count();
        $countOder = Order::count();
        $countCategory = Category::count();

        return view('admin.dashboard')->with([
            'countUser' => $countUser,
            'countProduct' => $countProduct,
            'countOder' => $countOder,
            'countCategory' => $countCategory,

        ]);
    }
    public function login()
    {
        return view('login');
    }

    public function home()
    {
        return view('user.home');
    }

    public function register(){
        return view('user.pages.register');
    }

    public function postLogin(Request $request)
    {
        $request->validate(
            [
                'name' => ['required'],
                'password' => ['required']
            ],
            [
                'name.required' => 'Name không được để trống.',
               
                'password.required' => 'Password không được để trống.'
            ]
        );

        if (Auth::attempt(['name' => $request->name, 'password' => $request->password])) {
            // Redirect based on role
            return Auth::user()->role == '1'
                ? redirect()->route('admin.dashboard')
                : redirect()->route('users.home');
        }

        return redirect()->back()->with('messageError', 'Name hoặc password không đúng.');
    }
    public function postRegister(Request $request)
    {
        // Xác thực dữ liệu đầu vào
        $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:3', 'confirmed'],
            ],
            [
                'name.required' => 'Tên không được để trống.',
                'email.required' => 'Email không được để trống.',
                'email.email' => 'Email không đúng định dạng.',
                'email.unique' => 'Email đã được sử dụng.',
                'password.required' => 'Mật khẩu không được để trống.',
                'password.min' => 'Mật khẩu phải có ít nhất 3 ký tự.',
                'password.confirmed' => 'Xác nhận mật khẩu không khớp.',
            ]
        );
    
        // Tạo người dùng mới
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => '2', // Mặc định là người dùng (role: 0)
        ]);
    
        // Đăng nhập tự động sau khi đăng ký thành công
        Auth::login($user);
    
        // Chuyển hướng dựa vào vai trò
        return  redirect()->route('users.home')->with('success', 'Đăng ký thành công!');
           
    }
    
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with([
            'messageError' => 'Logout thanh cong'
        ]);
    }
}
