<?php

namespace App\Http\Controllers;

use App\Http\Services\Slider\SliderService;
use App\Http\Services\Menu\MenuService;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Services\Product\ProductUserService;

class HomeController extends Controller
{
    protected $slider;
    protected $menu;
    protected $product;

    public function __construct(SliderService $slider, MenuService $menu,
    ProductUserService $product)
    {
        $this->slider = $slider;
        $this->menu = $menu;
        $this->product = $product;
    }
#view trang chủ khách hàng
    public function index()
    {

        return view('home', [
            'title' => 'PET SHOP',
            'sliders' => $this->slider->show(),
            'menus' => $this->menu->show(),
            'products'=> $this->product->get()
        ]);
    }
#load more sản phẩm
    public function loadProduct(Request $request)
    {
        $page = $request->input('page', 0);

        $result = $this->product->get($page);

        if(count($result) != 0 ){
            $html = view('products.list', ['products' => $result])->render();
            return response()->json(['html'=> $html]);
        }
        return response()->json(['html'=>'']);
    }
    #tìm kiếm sản phẩm
    public function search(Request $request)
    {
        $product = Product::where('name','like','%'.$request->key.'%')
                            ->get();
        return view('search', [
            'title'=>'Tìm kiếm',
            'products'=>$product
        ]);
    }
}
