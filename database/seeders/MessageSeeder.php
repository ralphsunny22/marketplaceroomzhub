<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Str;
use App\Models\Message;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $message = new Message();
        $message->sender_id = 1;
        $message->receiver_id = 2;
        $message->content = 'first message contnent';
        $message->save();

        $message = new Message();
        $message->sender_id = 2;
        $message->receiver_id = 1;
        $message->content = 'seonnd message contnent';
        $message->save();

        $message = new Message();
        $message->sender_id = 1;
        $message->receiver_id = 2;
        $message->content = 'third message contnent';
        $message->save();

        $message = new Message();
        $message->sender_id = 2;
        $message->receiver_id = 1;
        $message->content = 'LongText Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum assumenda laudantium ipsam libero consequuntur debitis neque ipsum molestias omnis modi!';
        $message->save();

        $message = new Message();
        $message->sender_id = 1;
        $message->receiver_id = 2;
        $message->content = 'Reply LongText Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum assumenda laudantium ipsam libero consequuntur debitis neque ipsum molestias omnis modi!';
        $message->save();
    }
}
