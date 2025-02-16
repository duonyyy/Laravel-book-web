<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\FeedbackContact;
use App\Models\Setting;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contactPage()
    {

        $setting = Setting::first();
        return view('user.pages.contact', compact('setting'));
    }


    public function storeContact(Request $request)
    {
        // Validate dữ liệu từ form
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:11',
            'feedback' => 'nullable|string|max:600',
        ]);

        // Lưu dữ liệu vào database
        FeedbackContact::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'feedback' => $request->input('feedback'),
        ]);

        // Chuyển hướng với thông báo thành công
        return back()->with('success', 'Message sent successfully!');
    }
}
