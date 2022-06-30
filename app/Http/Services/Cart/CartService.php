<?php

namespace App\Http\Services\Cart;

use App\Jobs\SenMail;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CartService
{
    //insert phía khách hàng
    public function create($request)
    {
        $qty = (int)$request->input('num_product');
        $product_id = (int)$request->input('product_id');

        if ($qty <= 0 || $product_id <= 0) {
            Session::flash('error', 'Số lượng hoặc Sản phẩm không chính xác');
            return false;
        }

        $carts = Session::get('carts');
        //kiểm tra xem có sp trong giỏ hàng chưa.nếu chưa ta tạo ra giỏ hàng
        if (is_null($carts)) {
            Session::put('carts', [
                $product_id => $qty
            ]);
            return true;
        }
        //ngược lại ta cập nhật số lượng cũ
        //arr:exists de lay ra cais id
        $exists = Arr::exists($carts, $product_id);
        if ($exists) {
            $carts[$product_id] = $carts[$product_id] + $qty;

            //update session
            Session::put('carts', $carts);
            return true;
        }
        $carts[$product_id] = $qty;
        Session::put('carts', $carts);
        return true;
    }
//lấy product trả về giao diện phía khách
    public function getProduct()
    {
        $carts = Session::get('carts');
        if (is_null($carts)) return [];

        $productId = array_keys($carts);
        return Product::where('active', 1)
            ->whereIn('id', $productId)
            ->get();
    }

    public function update($request)
    {

        /*Session::put('carts', $request->input('num_product'));
        return true;*/
        $numArr = $request->input('num_product');
        $idArr = $request->input('product_id');

        $carts = Session::get('carts');

        foreach ($idArr as $product_id) {
            if (isset($carts[$product_id])) {
                $carts[$product_id] = $numArr[$product_id];
            }
        }
        Session::put('carts', $carts);
        return true;
    }

    public function remove($id)
    {
        $carts = Session::get('carts');
        unset($carts[$id]);

        Session::put('carts', $carts);
        return true;
    }

    public function addCart($request)
    {
        try {
            DB::beginTransaction(); // ktra try để k bị dư dl
            $carts = Session::get('carts');

            if (is_null($carts))
                return false;

            $customer = Customer::create([
                'name' => $request->input('name'),
                'phone' => $request->input('phone'),
                'address' => $request->input('address'),
                'email' => $request->input('email'),
                'content' => $request->input('content')
            ]);

            $cart_insert = $this->infoProductCart($carts, $customer->id);
            DB::commit();
            #queue
            SenMail::dispatch($request->input('email'))->delay(now()->addSeconds(2));


            Session::forget('carts');
            return $cart_insert;
        } catch (\Exception $err) {
            DB::rollBack();
        }
        return false;

    }

    public function infoProductCart($carts, $customer_id)
    {

        $cart = Cart::create([
            'customer_id' => $customer_id,
            'total' => 0,
            'active' => 0
        ]);

        $total = 0;

        foreach ($carts as $key => $item) {
            // lay chi tiet san pham
            $product = $this->getDetailsProduct($key);
            $price = $product->price_sale != 0 ? $product->price_sale : $product->price;

            $total += $price * $item;

            // insert cart details
            $cart->cart_details()->create([
                'qty' => $item,
                'price' => $price,
                'product_id' => $product->id,
                'cart_id' => $cart->id
            ]);
        }

        // insert vao bang cart
        $cart->update([
            'total' => $total
        ]);

        return $cart;
    }

    public function getDetailsProduct($id)
    {
        return Product::select('id', 'name', 'price', 'price_sale', 'thumb')
            ->where(['id' => $id, 'active' => 1])
            ->first();
    }

    //admin
    public function destroy($request)
    {
        $id = (int)$request->input('id');
        $customer = Customer::where('id', $id)->first();
        if ($customer) {
            $customer->carts[0]->cart_details()->delete();
            $customer->carts()->delete();
            return $customer->delete();
        }

        return false;
    }

    public function updateActive($request)
    {
        $active = (int)$request->input('active');
        $cart_id = (int)$request->input('cart_id');
        $cart = Cart::where('id', $cart_id)->first();

        if ($cart) {
            return Cart::where('id', $cart_id)->update(['active' => $active]);
        }

        return false;
    }
}
