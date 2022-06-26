<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cart;

class MainController extends Controller
{
    public function index()
    {
        return view('admin.home',[
            'title'=>'Trang quản trị Admin',
            'carts'=> Cart::get(),
        ]);
    }


}
