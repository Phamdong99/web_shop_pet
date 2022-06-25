<?php

namespace App\Http\Services\Product;

use App\Models\Cart;
use App\Models\Member;
use App\Models\Product;
use App\Models\Review;
use App\Models\Reviewer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ProductUserService
{
    const LIMIT = 16;

    public function get($page = null)
    {
        return Product::orderbyDesc('id')
            ->where('active', 1)
            ->when($page != null, function ($query) use ($page) {
                $offset = $page * self::LIMIT;
                $query->offset($offset);
            })
            ->limit(self::LIMIT)
            ->get();
    }

    public function show($id)
    {
        return Product::where('id', $id)
            ->where('active', 1)
            ->with('menu')
            ->firstOrFail();
    }

    public function more($id)
    {
        return Product::where('active', 1)
            ->where('id', '!=', $id)
            ->orderByDesc('id')
            ->limit(8)
            ->get();
    }


}
