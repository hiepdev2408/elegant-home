<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Events\RoomJoinedEvent;
use App\Models\Message;
use App\Models\Room;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    //người dùng click để thêm phòng
    public function createOrRedirect(Request $request, $receiverId)
    {
        $room = Room::firstOrCreate(
            ['user_id' => auth()->id()]
        );

        return redirect()->route('chat.room', ['roomId' => $room->id, 'receiverId' => $receiverId]);
    }
    //đi đến phòng chat đang hoạt động
    public function listChatRooms()
    {
        $rooms = Room::query()->get();
        // dd($rooms);
        return view('admin.chat.index', compact('rooms'));
    }
    //hiển thị chat trang admin
    public function showChatRoom($roomId, $receiverId)
    {
        // $room = Room::findOrFail($roomId);

        // // Cập nhật trạng thái phòng chat khi người dùng tham gia
        // if (auth()->user()->role !== 'admin' && $room->user_id === auth()->id()) {
        //     $room->update(['is_active' => true]);

        //     // Phát event tới admin


        // }

        return view('client.chat.room', compact('roomId', 'receiverId'));
    }

    //giửi tin nhắn lưu vào cơ sở dữ liệu

    public function sendMessage(Request $request)
    {
        $message = Message::create([
            'sender_id' => auth()->id(),
            'receiver_id' => $request->receiver_id,
            'room_id' => $request->room_id,
            'message' => $request->message,
        ]);

        broadcast(new MessageSent($message, roomId: $request->room_id))->toOthers();

        return response()->json(['message' => $message]);
    }
}