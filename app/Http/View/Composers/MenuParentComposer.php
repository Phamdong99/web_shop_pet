<?php

namespace App\Http\View\Composers;

use App\Models\Menu;
use Illuminate\View\View;

class MenuParentComposer
{
    public function __construct()
    {

    }

    public function compose(View $view)
    {
        $menus = Menu::select('id', 'name', 'parent_id')->where(['active' => 1, 'parent_id' => 0])->orderByDesc('id')->get();
        $view->with('menu_parent', $menus);
    }
}

