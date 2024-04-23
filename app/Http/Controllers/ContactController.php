<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function contact(ContactRequest $contactRequest){
        $data = $contactRequest->validated();
        Mail::send(new ContactMail($data));

        return back()->with('success', 'Merci pour votre Message, une reponse vous sera envoyé dans les prochaines 24h!!!');
    }
}
