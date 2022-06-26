<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Review\ReviewService;
use App\Models\Product;
use App\Models\Reviewer;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    protected $reviewService;

    public function __construct(ReviewService $reviewService)
    {
        $this->reviewService=$reviewService;
    }

    public function index()
    {
        return view('admin.reviews.product', [
            'title' => 'Danh sách sản phẩm được đánh giá',
            'reviews' => Product::with('reviews')->get()
        ]);
    }

    public function show(Product $product)
    {
        return view('admin.reviews.detail', [
            'title'=> 'Chi tiết đánh giá : ' . $product->name,
            'product'=> $product,
            'reviews' => $product->reviews()->get()
        ]);
    }

    //update active review
    public function update(Request $request)
    {
        $result = $this->reviewService->updateActive($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Cập nhật đánh giá thành công'
            ]);
        }
        return response()->json([
            'error' => true
        ]);
    }
}
