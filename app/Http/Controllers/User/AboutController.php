<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\User;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function aboutPage(){

        $about = About::first();
        $userAdmin = User::where('role', '1')->get();
        return view('user.pages.about', compact('about', 'userAdmin'));
    }
}
