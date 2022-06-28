<?php

namespace App\Http\Services\Review;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Review;
use App\Models\Reviewer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ReviewService
{
    //Khách hàng
    public function create_review($request)
    {
        try {

            DB::beginTransaction();
            Review::create([
                'product_id' => (int)$request->input('product_id'),
                'name' => (string)$request->input('name'),
                'email' => (string)$request->input('email'),
                'content' => (string)$request->input('content'),
                'review_star' => (int)$request->input('review_star'),
                'active'=>(int)$request->input('0')
            ]);

            DB::commit();
            Session::flash('success', 'Đánh giá thành công');

        } catch (\Exception $err) {

            DB::rollBack();
            Session::flash('error', 'Đánh giá không thành công');
            return false;
        }
        return true;

    }
    //update active review
    public function updateActive($request)
    {
        $active = (int)$request->input('active');
        $review_id = (int)$request->input('review_id');
        $review = Review::where('id', $review_id)->first();

        if ($review) {
            return Review::where('id', $review_id)->update(['active' => $active]);
        }

        return false;
    }

}
