<?php

namespace App\Http\Services\Review;

use App\Models\Product;
use App\Models\Review;
use App\Models\Reviewer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ReviewService
{
    //Admin
    public function getProduct()
    {
        return Product::where('type',1)
        ->get();
    }
    //Khách hàng
    public function create_review($request)
    {
        try {
            // ví dụ thay đổi code
            // vào đây sẽ thấy màu file khác đi
            DB::beginTransaction();
            $reviewer = Reviewer::create([
                'name' => (string)$request->input('name'),
                'email' => (string)$request->input('email')
            ]);
            $this->ProductReview($request, $reviewer->id);
            DB::commit();
            Session::flash('success', 'Đánh giá thành công');

        } catch (\Exception $err) {
            throw $err;
            DB::rollBack();
            Session::flash('error', 'Đánh giá không thành công');
            return false;
        }
        return true;

    }

    public function ProductReview($reviews, $reviewer_id)
    {
        $product = Product::where([
            'active' => 1,
            'id' => $reviews->product_id
        ])->select('id')->first();

        $data = [
            'reviewer_id' => $reviewer_id,
            'product_id' => $product->id,
            'content' => $reviews->content,
            'review_star' => 5
        ];

        return Review::insert($data);
    }
//show review
    public function show_review($id)
    {
        return Reviewer::get();
    }

}
