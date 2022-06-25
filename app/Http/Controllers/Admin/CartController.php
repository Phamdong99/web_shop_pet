<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Cart\CartService;
use App\Models\Cart;
use App\Models\Customer;
use Illuminate\Http\Request;

class CartController extends Controller
{
    protected $cart;

    public function __construct(CartService $cart)
    {
        $this->cart = $cart;
    }


    /*    public function index()
        {
            return view('admin.carts.customer', [
                'title'=>'Danh sách đơn đặt hàng',
                'carts'=>$this->cart->getCustomer()
            ]);
        }*/
    public function index()
    {
        return view('admin.carts.customer', [
            'title' => 'Đơn hàng : ',
            'carts' => Customer::with('carts')->get()
        ]);
    }

    public function show(Cart $cart)
    {
        return view('admin.carts.detail', [
            'title' => 'Chi tiết đơn hàng : ' . $cart->id,
            'customer' => $cart->customer,
            'carts' => $cart->cart_details,
            'total' => $cart->total
        ]);
    }

    public function destroy(Request $request)
    {
        $result = $this->cart->destroy($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa đơn hàng thành công'
            ]);
        }
        return response()->json([
            'error' => true
        ]);
    }

    public function update(Request $request)
    {
        $result = $this->cart->updateActive($request);

        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Cập nhật đơn hàng thành công'
            ]);
        }
        return response()->json([
            'error' => true
        ]);
    }
}
