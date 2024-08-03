<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Messages;

class MessageController extends Controller
{
    public function index()
    {
        $authUser = Auth::user();
        $user = User::all();

        return view('message.message', ['users'=>$user],['authUser'=>$authUser]);
    }

    public function users()
    {
        $user = User::all();
        $authUser = Auth::user();

        return view('message.users', ['users'=>$user],['authUser'=>$authUser]);

    }

    public function chat(User $user)
    {
        return view('message.chat', ['user'=>$user]);
    }

    public function store(Request $request)
    {
        try {
            $authUser = Auth::user();

            $data = $request->validate([
                'incoming_id' => 'required',
                'message' => 'required'
            ]);

            Messages::create([
                'incoming_msg_id' => $data['incoming_id'],
                'outgoing_msg_id' => $authUser->id,
                'message' => $data['message'],
            ]);

            return response()->json(['status' => 'success']);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }

    public function display(User $user)
    {
        $authUser = Auth::user();
        $authUserID = $authUser->id;
        $userID = $user->id;

        $chats = Messages::where(function ($query) use ($userID, $authUserID) {
            $query->where('incoming_msg_id', $userID)
                  ->where('outgoing_msg_id', $authUserID);
        })->orWhere(function ($query) use ($userID, $authUserID) {
            $query->where('incoming_msg_id', $authUserID)
                  ->where('outgoing_msg_id', $userID);
        })->get();
        
        return view('message.displaychat', compact('chats','authUserID'));
    }
}
