<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Subscribers;
use Illuminate\Http\Request;

class SubscribersController extends Controller
{
    public function storeSubscriber(Request $request)
    {

        $request->validate([
            'email' => ['required', 'email', 'unique:subscribers,email'],
        ], [
            'email.email' => 'Email không đúng định dạng.',
            'email.required' => 'Email không được để trống.',
            'email.unique' => 'Email đã tồn tại trong hệ thống.',
        ]);

        Subscribers::create(
            [
                'email' => $request->email,
                'status' => 1,
            ]
        );
        return redirect()->back()->with([
            'message' => 'Thêm mới thành công',
            'alert-type' => 'success'
        ]);
    }
}
