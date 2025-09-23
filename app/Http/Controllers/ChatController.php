<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index(): View
    {
        $users = User::where("id", "!=", Auth::user()->id)->get();
        return view("dashboard", compact("users"));
    }
}
