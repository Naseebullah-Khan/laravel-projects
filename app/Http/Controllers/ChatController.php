<?php

namespace App\Http\Controllers;

use App\Events\SendMessageEvent;
use App\Models\Message;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index(): View
    {
        $users = User::where("id", "!=", Auth::user()->id)->get();
        return view("dashboard", compact("users"));
    }

    public function fetchMessage(Request $request): JsonResponse
    {
        $user = User::findOrFail($request->user_id);
        $messages = Message::where("sender_id", Auth::user()->id)
            ->Where("receiver_id", $request->user_id)
            ->orWhere("sender_id", $request->user_id)
            ->where("receiver_id", Auth::user()->id)
            ->get();

        return response()->json([
            "user" => $user,
            "messages" => $messages,
        ]);
    }

    public function sendMessage(Request $request)
    {
        $request->validate([
            "text" => ["required", "string"],
            "userId" => ["required"],
        ]);

        $message = new Message();
        $message->sender_id = Auth::user()->id;
        $message->receiver_id = $request->userId;
        $message->message = $request->text;
        $message->save();

        event(new SendMessageEvent($message->message, Auth::user()->id, $request->userId));

        return response($message);
    }
}
