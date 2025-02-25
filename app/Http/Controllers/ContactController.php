<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactStoreRequest;
use App\Models\Contact;
use Illuminate\Contracts\View\View;


class ContactController extends Controller
{
    public function index(): View
    {
        return view("contact.index");
    }

    public function store(ContactStoreRequest $request)
    {
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->save();

        dd("saved");
    }
}
