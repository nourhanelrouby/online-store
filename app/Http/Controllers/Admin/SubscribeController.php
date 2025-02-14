<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\subscribe\subscribeRequest;
use App\Mail\SubscribeMail;
use App\Models\Subscribe;
use Illuminate\Support\Facades\Mail;

class SubscribeController extends Controller
{
    public function index()
    {
        $subscribes = Subscribe::all();

        return view('admin.subscribe.index',[
            'subscribes' => $subscribes
        ]);
    }
    public function sendMail($subscribe)
    {

        Mail::to($subscribe)->send(new SubscribeMail($subscribe));
        return back()->with('success', 'Mail Sent Successfully!');
    }
}
