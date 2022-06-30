<?php

namespace App\Http\Services\Product;

use App\Models\Menu;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class ProductService
{
    public function  getMenu()
    {
        return Menu::where('active', 1)->get();
    }
    //check price>price_sale
    protected function isValidPrice($request)
    {
        if ($request->input('price')!=0 && $request->input('price_sale')!=0
        && $request->input('price_sale') >= $request->input('price')
        ){
            Session::flash('error','Giá giảm phải nhỏ hơn giá gốc.Vui lòng nhập lại');
            return false;
        }

        if($request->input('price_sale')!=0 && (int)$request->input('price')==0){
            Session::flash('error','Vui lòng nhập giá gốc');
            return false;
        }
        return true;
    }

    public function getAll()
    {
        if($search = request()->search){
            return Product::with('menu')
                ->orderbyDesc('id')
                ->where('name','like','%'.$search.'%')->get();
        }else{
            return Product::with('menu')
                ->orderbyDesc('id')->get();
        }
    }
    public function create($request)
    {


        $isValidPrice = $this->isValidPrice($request);
        if($isValidPrice === false) return false;

        try {

            Product::create([
                'name' => (string) $request->input('name'),
                'description' => (string) $request->input('description'),
                'content' => (string) $request->input('content'),
                'menu_id' => (int) $request->input('menu_id'),
                'price' => (int) $request->input('price'),
                'price_sale' => (int) $request->input('price_sale'),
                'thumb' => (string) $request->input('file'),
                'type'=> (string) $request->input('type'),
                'active' => (string) $request->input('active')

            ]);

            Session::flash('success','Tạo mới sản phẩm thành công');
        }catch (\Exception $err) {

            Session::flash('error', $err->getMessage());
            return false;
        }


        return true;
    }
    public function update($request, $product) : bool
    {
        if($request->input('menu_id')!=$product->id){
            $product->menu_id = (int) $request->input('menu_id');
        }
        $patch_file = $request->input('file');

        if (empty($patch_file)){
            $patch_file = $product->thumb;
        }

        $product->name = (string) $request->input('name');
        $product->description = (string) $request->input('description');
        $product->content = (string) $request->input('content');
        $product->active = (string) $request->input('active');
        $product->thumb = $patch_file;
        $product->price = (int) $request->input('price');
        $product->price_sale = (int) $request->input('price_sale');
        $product->save();

        Session::flash('success','Sửa danh mục thành công');
        return true;
    }
    public function destroy($request)
    {
        $id = (int) $request->input('id');
        $product = Product::where('id', $id)->first();

        if ($product){
            return Product::where('id', $id)->orWhere('menu_id', $id)->delete();
        }

        return false;
    }
}
