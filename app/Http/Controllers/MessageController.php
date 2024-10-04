<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Group;
use App\Models\Phase;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::with(['user', 'group', 'phase'])->get();
        return view('admin.message-history', compact('messages'));
    }

    public function create()
    {
        $groups = Group::all();
        $phases = Phase::all();
        return view('admin.send-message', compact('groups', 'phases'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required',
            'group_id' => 'required|exists:groups,id',
            'phase_id' => 'required|exists:phases,id',
        ]);

        $message = new Message();
        $message->user_id = auth()->id();
        $message->group_id = $request->group_id;
        $message->phase_id = $request->phase_id;
        $message->message = $request->message;
        $message->save();

        return redirect()->route('message.create')->with('success', 'Message sent successfully!');
    }
}
