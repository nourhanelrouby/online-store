<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\subscribe\SubscribeRequest;
use App\Models\Subscribe;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    public function subscribe(SubscribeRequest $request)
    {
        Subscribe::create([
            'email'=>$request->email
        ]);
        return response()->json(['success' => true, 'message' => 'Subscription successful!']);
    }
}
