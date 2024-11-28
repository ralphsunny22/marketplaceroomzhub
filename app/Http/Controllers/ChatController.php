<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Message;
use App\Models\User;

class ChatController extends Controller
{

    public function sendMessage(Request $request)
    {
        $request->validate([
            'content' => 'nullable|string',
            'file' => 'nullable|file|mimes:jpeg,png,jpg,gif,mp4|max:20480', // Allow image and video files up to 20MB
        ]);

        try {
            $message = new Message();
            $message->sender_id = Auth::id();
            $message->receiver_id = $request->receiver_id; // Ensure receiver_id is sent in the request

            // Check if a file is being uploaded
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $filePath = $file->store('uploads/messages', 'public'); // Save file in public/uploads/messages

                $message->file_url = '/storage/' . $filePath;
                $message->file_type = $file->getMimeType(); // e.g., 'image/jpeg' or 'video/mp4'
            } else {
                $message->content = $request->content; // Save text content
            }

            $message->save();

            return response()->json([
                'success' => true,
                'message' => 'Message sent successfully',
                'data' => $message,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to send message',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function chat($activeUserId = null)
{
    // Fetch contact list
    $contacts = User::where('id', '!=', auth()->id())
        ->get()
        ->map(function ($user) {
            $lastMessage = Message::where(function ($query) use ($user) {
                $query->where('sender_id', auth()->id())
                      ->orWhere('receiver_id', $user->id);
            })->orderBy('created_at', 'desc')->first();

            return (object) [
                'id' => $user->id,
                'name' => $user->name,
                'last_message' => $lastMessage ? $lastMessage->content : 'No messages yet',
                'last_message_time' => $lastMessage ? $lastMessage->created_at->format('g:i A') : '',
            ];
        });

    // Handle active user logic
    $activeUser = null;
    $messages = collect(); // Default empty collection for messages

    if ($activeUserId) {
        $activeUser = User::find($activeUserId);

        if ($activeUser) {
            $messages = Message::where(function ($query) use ($activeUserId) {
                $query->where('sender_id', auth()->id())
                      ->where('receiver_id', $activeUserId);
            })
            ->orWhere(function ($query) use ($activeUserId) {
                $query->where('sender_id', $activeUserId)
                      ->where('receiver_id', auth()->id());
            })
            ->orderBy('created_at', 'asc')
            ->get();
        }
    }

    return view('vendor.pages.chat.chat', compact('contacts', 'activeUser', 'messages'));
}


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
