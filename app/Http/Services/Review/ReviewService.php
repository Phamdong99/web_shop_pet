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
        return Product::where('type', 1)
            ->get();
    }

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
                'review_star' => (int)$request->input('review_star')
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


}
