<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\contact\ContatRequest;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        return view('website.contact.index');
    }

    public function store(ContatRequest $request)
    {
        Contact::create($request->all());
        return back()->with(['success' => 'Message sent successfully']);
    }
}
