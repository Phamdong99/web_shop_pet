<?php

namespace App\Http\Services\Menu;

use App\Models\Menu;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class MenuService
{
    public function getParent()
    {
        return Menu::where('parent_id', 0)->get();
    }

    //show KH
    public function show()
    {
        return Menu::where('parent_id', 0)
            ->orderbyDesc('id')
            ->get();
    }

    public function getAll()
    {
        return Menu::orderbyDesc('id')->paginate(30);
    }

    public function create($request)
    {
        try {
            Menu::create([
                'name' => (string)$request->input('name'),
                'parent_id' => (int)$request->input('parent_id'),
                'description' => (string)$request->input('description'),
                'content' => (string)$request->input('content'),
                'thumb' => (string)$request->input('file'),
                'active' => (string)$request->input('active'),
                'slug' => Str::slug($request->input('name'), '-')

            ]);

            Session::flash('success', 'Tạo danh mục thành công');
        } catch (\Exception $err) {

            Session::flash('error', $err->getMessage());
            return false;
        }


        return true;
    }

    public function update($request, $menu): bool
    {
        if ($request->input('parent_id') != $menu->id) {
            $menu->parent_id = (int)$request->input('parent_id');
        }

        $patch_file = $request->input('file');

        if (empty($patch_file)) {
            $patch_file = $menu->thumb;
        }


        $menu->name = (string)$request->input('name');
        $menu->description = (string)$request->input('description');
        $menu->thumb = $patch_file;
        $menu->content = (string)$request->input('content');
        $menu->active = (string)$request->input('active');
        $menu->save();

        Session::flash('success', 'Sửa danh mục thành công');
        return true;
    }

    public function destroy($request)
    {
        $id = (int)$request->input('id');
        $menu = Menu::where('id', $id)->first();

        if ($menu) {
            return Menu::where('id', $id)->orWhere('parent_id', $id)->delete();
        }

        return false;
    }

    public function getId($id)
    {
        return Menu::where('id', $id)->where('active', 1)->firstOrFail();
    }

    public function getProduct($menu, $request)
    {
        $products = [];

        $menu_children = $menu->menus;


        if (!empty($menu_children)) {
            foreach ($menu_children as $menu_child) {
                $products[] = $menu_child->products->all();
            }
        }
        // get products menu parent

        $products[] = $menu->products->all();

        $data = [];

        foreach ($products as $product){
            foreach ($product as $item){
                $data[] = $item->toArray();
            }
        }

        $collection = collect($data);
        $sorted =  $collection->sortBy('price', SORT_NATURAL);
        if ($request->input('price')) {
            $type_sort = strtolower($request->input('price'));
            switch ($type_sort){
                default:
                case 'asc':
                    $sorted = $collection->sortBy('price', SORT_ASC);
                    break;
                case 'desc':
                    $sorted = $collection->sortByDesc('price', SORT_DESC);
                    break;
            }

        }

//        $sorted->values()->all();

//        $result = call_user_func_array('array_merge', $products);
//
//        return array_values($result);
//dd(json_encode($sorted->values()->all()));
        return json_encode($sorted->values()->all());
    }
}
