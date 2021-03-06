<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\CreateFormRequest;
use App\Http\Services\Product\ProductService;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService=$productService;
    }

    public function index()
    {
        return view('admin.product.list', [
            'title' => 'Danh sách sản phẩm',
            'products' => $this->productService->getAll()
        ]);
    }
    public function create()
    {
        return view('admin.product.add', [
            'title'=>'Thêm sản phẩm',
            'products' => $this->productService->getMenu()
        ]);
    }

    public function store(CreateFormRequest $request)
    {
        $this->productService->create($request);

        return redirect('/admin/products/list');
    }

    public function show(Product $product)
    {
        return view('admin.product.edit', [
            'title' => 'Chỉnh sửa sản phẩm: ' .$product->name,
            'product' => $product,
            'menus' => $this->productService->getMenu()
        ]);
    }
    public function show_detail(Product $product)
    {
        return view('admin.product.show_detail', [
            'title' => 'Chi tiết sản phẩm: ' .$product->name,
            'product' => $product,
            'menus' => $this->productService->getMenu()
        ]);
    }
    public function update(Product $product, CreateFormRequest $request)
    {
        $this->productService->update($request, $product);
        return redirect('/admin/products/list');
    }

    public function destroy(Request $request)
    {
        $result = $this->productService->destroy($request);

        if($result == 1){
            return response()->json([
                'error' => false,
                'message' => 'Xóa sản phẩm thành công'
            ]);
        }elseif ($result == 0){
            return response()->json([
                'error' => true,
                'message' => 'Sản phẩm đã tồn tại trong một đơn hàng và bạn không thể xoá sản phẩm này'
            ]);
        }else{
            return response()->json([
                'error' => true,
                'message' => 'Xóa sản phẩm không thành công'
            ]);
        }
    }
}
