@extends('admin.layouts.master')
@section('content')
    <div id="app">
        <div class="container">

            <!-- Hiển thị trạng thái người dùng -->
            <div class="status mt-2">
                <b>Trạng thái: <span id="user-status">Đang kiểm tra...</span></b>

            </div>
            <hr>
            <div id="message-box" style="height: 400px; overflow-y: auto; background-color: #f8f9fa; padding: 10px;">
                @foreach ($messages as $item)
                    @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 2)
                        @if (Auth::user()->id === $item->sender_id)
                            <div class="message sent">
                                <strong>Bạn: </strong>{{ $item->message }}
                            </div>
                        @else
                            <div class="message received">
                                <strong>Khách hàng: </strong>{{ $item->message }}
                            </div>
                        @endif
                    @endif
                    @if (Auth::user()->role_id == 3)
                        @if (Auth::user()->id === $item->sender_id)
                            <div class="message sent">
                                <strong>Bạn: </strong>{{ $item->message }}
                            </div>
                        @else
                            <div class="message received">
                                <strong>Quảng trị viên: </strong>{{ $item->message }}
                            </div>
                        @endif
                    @endif
                @endforeach
            </div>
            <!-- Form gửi tin nhắn -->
            <div class="input-box">
                <textarea class="form-control" id="message-input" placeholder="Nhập tin nhắn..." rows="3"></textarea>
                <div class="d-flex align-items-center gap-2 mt-3">
                    <button class="btn btn-primary" id="send-message-btn">Gửi</button>
                    @if (Auth::user()->role_id == 3)
                        <form action="{{ route('outChat', $roomId) }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-danger">Thoát cuộc trò chuyện</button>
                        </form>
                    @endif
                </div>

            </div>
        </div>

    </div>
@endsection
@section('style-libs')
    <script>
        let userId = {{ auth()->id() }};
        let receiverId = {{ $receiverId }};
        let roomId = {{ $roomId }};
        let roleId = {{ auth()->user()->role_id }};
        // console.log(roleId)
    </script>
    
@endsection