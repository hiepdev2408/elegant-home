<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        // Lấy người dùng hiện tại
        try {
            $user = auth()->user();

            // Kiểm tra xem sản phẩm có tồn tại không

            // Tạo đánh giá mới
            $review = Review::create([
                'user_id' => $user->id,
                'product_id' => $request->product_id,
                'rating' => $request->rating,
                'comment' => $request->comment,
            ]);
            return back()->with('success', 'Bạn đã đánh giá sản phẩm thành công!');
        } catch (\Throwable $th) {
            return back()->with('error', 'Bạn chỉ được đánh giá 1 lần cho sản phẩm!');
        }
    }
}
