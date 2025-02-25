<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactStoreRequest;
use Illuminate\Contracts\View\View;


class ContactController extends Controller
{
    public function index(): View
    {
        return view("contact.index");
    }

    public function store(ContactStoreRequest $request)
    {

    }
}
