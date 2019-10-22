<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests\ContactRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function getNousContacter()
    {
        return view('frontend.quisommesnous.nouscontacter');
    }

    public function getNotreEquipe()
    {
        return view('frontend.quisommesnous.notreequipe');
    }

    public function postNousContacter(ContactRequest $request)
    {
        Mail::send('frontend.quisommesnous.email_contact', $request->all(), function ($message) {
            $message->to('admin@justeunregard.org')->subject('Contact');
        });
        return view('frontend.quisommesnous.confirm');
    }
}
