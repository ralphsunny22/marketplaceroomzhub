@extends('layout.design')
@section('title')Annie Shop :: Marketplace @endsection

@section('extra_css')
    <style>
        .chat-sidebar {
            max-height: 100vh;
            overflow-y: auto;
            border-right: 1px solid #ddd;
        }
        .chat-area {
            max-height: calc(100vh - 56px);
            overflow-y: auto;
        }
        .chat-message {
            display: flex;
            align-items: flex-start;
            margin-bottom: 15px;
        }
        .chat-message.sent {
            justify-content: flex-end;
        }
        .chat-message .message-content {
            max-width: 70%;
            word-wrap: break-word;
        }
        .chat-message .time-sent {
            font-size: 0.8rem;
            color: gray;
            margin-top: 5px;
        }
    </style>
@endsection

@section('content')
<main class="main-wrapper">
    <div class="container-fluid mb-5">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 chat-sidebar bg-light">
                <div class="list-group">
                    <div class="p-3 fw-bold border-bottom">
                        Contacts
                    </div>
                    <!-- Loop through contacts -->
                    @foreach ($contacts as $contact)
                        <a href="{{ route('chat', ['activeUserId' => $contact->id]) }}"
                        class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            <div>
                                <div class="fw-bold">{{ $contact->name }}</div>
                                <small class="text-muted">{{ $contact->last_message }}</small>
                            </div>
                            <small class="text-muted">{{ $contact->last_message_time }}</small>
                        </a>
                    @endforeach
                </div>
            </div>

            <!-- Main Chat Area -->
            <div class="col-md-9 p-0">
                <!-- Top Nav -->
                @if ($activeUser)
                    <div class="bg-primary text-white px-3 py-2 d-flex align-items-center">
                        <div class="fw-bold">{{ $activeUser->name }}</div>
                    </div>
                @else
                    <div class="bg-secondary text-white px-3 py-2 d-flex align-items-center">
                        <div class="fw-bold">Select a contact to start chatting</div>
                    </div>
                @endif

                <!-- Chat Messages -->
                <div class="chat-area px-3 py-2">
                    @if ($activeUser && $messages->isNotEmpty())
                        <!-- Loop through messages -->
                        @foreach ($messages as $message)
                            <div class="chat-message {{ $message->sender_id == auth()->id() ? 'sent' : '' }}">
                                <div class="message-content">
                                    @if ($message->file)
                                        @if ($message->file_type == 'image')
                                            <img src="{{ $message->file_url }}" class="img-fluid rounded" style="max-width: 200px;">
                                        @elseif ($message->file_type == 'video')
                                            <video controls class="rounded" style="max-width: 200px;">
                                                <source src="{{ $message->file_url }}" type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>
                                        @endif
                                    @else
                                        <div class="p-2 bg-light rounded shadow-sm">{{ $message->content }}</div>
                                    @endif
                                    <div class="time-sent">{{ $message->created_at->format('g:i A') }}</div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <!-- Default message if no active user or no messages -->
                        <div class="text-center text-muted py-5 no-message">
                            @if ($activeUser)
                                <p>No messages yet. Start the conversation!</p>
                            @else
                                <p>Select a contact to view messages.</p>
                            @endif
                        </div>
                    @endif
                </div>

                <!-- Message Form -->
                @if ($activeUser)
                    <div class="p-3 border-top">
                        <form method="POST" action="{{ route('sendMessage') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="receiver_id" value="{{ $activeUser->id }}">
                            <div class="input-group">
                                <input type="text" name="content" class="form-control" placeholder="Type a message" required>
                                <input type="file" name="file" class="d-none" id="file-input">
                                <button type="button" class="btn btn-outline-secondary" onclick="document.getElementById('file-input').click();">
                                    <i class="bi bi-paperclip"></i>
                                </button>
                                <button type="submit" class="btn btn-primary">Send</button>
                            </div>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </div>
</main>

@endsection

@section('extra_js')
@endsection

