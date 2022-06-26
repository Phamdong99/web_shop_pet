<?php

namespace App\Http\Controllers;

use App\Http\Services\Review\ReviewService;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Services\Product\ProductUserService;

class ProductHomeController extends Controller
{

    protected $productUserService;
    protected $reviewService;

    public function __construct(ProductUserService $productUserService, ReviewService $reviewService)
    {
        $this->productUserService = $productUserService;
        $this->reviewService = $reviewService;
    }
# view Chi tiết sản phẩm
    public function index($id = '' , $slug = '' )
    {
        $product = $this->productUserService->show($id);
        $productMore = $this->productUserService->more($id);
        return view('products.content',[
            'title' => $product->name,
            'product'=> $product,
            'products'=> $productMore,
            'reviews' => $product->reviews
        ]);
    }
//Đánh giá
    public function add_review(Request $request)
    {
        $this->reviewService->create_review($request);

        return redirect()->back();
    }


}
