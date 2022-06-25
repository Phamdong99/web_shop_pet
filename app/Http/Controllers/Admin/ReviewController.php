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
            'products' => $this->reviewService->getProduct()
        ]);
    }

        public function show(Product $product)
    {
        return view('admin.reviews.detail', [
            'title'=> 'Chi tiết đánh giá : ' . $product->name,
            'product'=> $product,
            'reviews' => $product->reviews()->with('reviewer')->get()
        ]);
    }
}
