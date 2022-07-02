<?php

namespace App\Http\Services\Product;

use App\Http\Services\UploadService;
use App\Models\Menu;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class ProductService
{

    protected $upload;

    public function __construct(UploadService $uploadService)
    {
        $this->upload = $uploadService;
    }

    public function getMenu()
    {
        return Menu::where('active', 1)->get();
    }

    //check price>price_sale
    protected function isValidPrice($request)
    {
        if ($request->input('price') != 0 && $request->input('price_sale') != 0
            && $request->input('price_sale') >= $request->input('price')
        ) {
            Session::flash('error', 'Giá giảm phải nhỏ hơn giá gốc.Vui lòng nhập lại');
            return false;
        }

        if ($request->input('price_sale') != 0 && (int)$request->input('price') == 0) {
            Session::flash('error', 'Vui lòng nhập giá gốc');
            return false;
        }
        return true;
    }

    public function getAll()
    {
        if ($search = request()->search) {
            return Product::with('menu')
                ->orderbyDesc('id')
                ->latest()
                ->where('name', 'like', '%' . $search . '%')->get();
        } else {
            return Product::with('menu')
                ->orderbyDesc('id')->latest()->get();
        }
    }

    public function create($request)
    {

        $isValidPrice = $this->isValidPrice($request);
        if ($isValidPrice === false) return false;

        try {
            Product::create([
                'name' => (string)$request->input('name'),
                'description' => (string)$request->input('description'),
                'content' => (string)$request->input('content'),
                'menu_id' => (int)$request->input('menu_id'),
                'price' => (int)$request->input('price'),
                'price_sale' => (int)$request->input('price_sale'),
                'qty_product'=>(int)$request->input('qty_product'),
                'thumb' => (string)$request->input('file'),
                'type' => (string)$request->input('type'),
                'active' => (string)$request->input('active')

            ]);

            Session::flash('success', 'Tạo mới sản phẩm thành công');
        } catch (\Exception $err) {

            Session::flash('error', $err->getMessage());
            return false;
        }


        return true;
    }

    public function update($request, $product): bool
    {
        if ($request->input('menu_id') != $product->id) {
            $product->menu_id = (int)$request->input('menu_id');
        }
        $patch_file = $request->input('file');

        if (empty($patch_file)) {
            $patch_file = $product->thumb;
        }
        $product->name = (string)$request->input('name');
        $product->description = (string)$request->input('description');
        $product->content = (string)$request->input('content');
        $product->active = (string)$request->input('active');
        $product->thumb = $patch_file;
        $product->price = (int)$request->input('price');
        $product->price_sale = (int)$request->input('price_sale');
        $product->qty_product = (int)$request->input('qty_product');
        $product->save();

        Session::flash('success', 'Sửa sản phẩm thành công');
        return true;
    }

    public function destroy($request)
    {
        $id = (int)$request->input('id');
        $product = Product::where('id', $id)->orWhere('menu_id', $id)->first();


        if ($product) {
            if(count($product->carts) > 0){
                return 0;
            }
            $product->delete();
            return 1;
        }
        return 2;
    }

    public function fileUpload($request)
    {
        $data = [];
        try {
            if ($request->hasfile('file')) {
                foreach ($request->file('file') as $file) {
                    $name = $file->getClientOriginalName();
                    $pathFull = 'uploads/'. date("Y/m/d");
                    $file->storeAs(
                        'public/' . $pathFull, $name
                    );
                    $data[] = '/storage/'.$pathFull.'/'.$name;
                }
                return $data;
            }
        }catch (\Exception $exception){
            throw $exception;
        }
        return [];
    }
}
