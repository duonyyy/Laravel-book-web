<?php

namespace App\Http\Controllers\Mail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscribers;

class SubscribersMailController extends Controller
{
    public function listSubscribers(){

        $listSub = Subscribers::all();

        return view('admin.email.listSubscribers')->with([
            'listSub' => $listSub
      ]);
    }

    public function viewSendMail(){
        return view('admin.email.sendMail');
    }
}
