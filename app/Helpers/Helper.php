<?php


namespace App\Helpers;

use Illuminate\Support\Str;

class Helper
{
    public static function menu($menus, $parent_id = 0, $char = '')
    {
        $html = '';

        foreach ($menus as $key => $menu) {
            if($menu->parent_id == $parent_id){
                $html .= '
                <tr>
                    <td>'. $menu->id .'</td>
                    <td>'. $char . $menu->name .'</td>
                    <td>
                             <a href='. $menu->thumb .' target="_blank">
                               <img src='. $menu->thumb .' height="40px">
                             </a>
                    </td>
                    <td>'. self::active($menu->active) .'</td>
                    <td>'. $menu->updated_at .'</td>
                    <td>
                          <a class="btn btn-primary btn-sm" href="/admin/menus/edit/' .$menu->id .' ">
                            <i class="fas fa-edit"></i>
                          </a>

                          <a href="#" class="btn btn-danger btn-sm"
                                onclick="removeRow(' . $menu->id .', \'/admin/menus/destroy\')">
                                <i class="fas fa-trash"></i>
                          </a>
                    </td>
                </tr>

                ';

                unset($menus[$key]);

                $html .= self::menu($menus, $menu->id,$char.'|--');

            }

        }
        return $html;

    }

    public static function active($active = 0)
    {
        return $active == 0 ? '<span class="btn btn-danger btn-xs">Không hoạt động</span>'
            : '<span class="btn btn-success btn-xs">Hoạt động</span>';
    }
    public static function active1($active = 0)
    {
        return $active == 0 ? '<span class="btn btn-danger btn-xs">Chưa thanh toán</span>'
            : '<span class="btn btn-success btn-xs">Đã thanh toán</span>';
    }
    public static function active2($active = 0)
    {
        return $active != 0 ? '<span class="btn btn-danger btn-xs">Đóng</span>'
            : '<span class="btn btn-success btn-xs">Đang hiển thị</span>';
    }

    public static function menus($menus, $parent_id = 0):string
    {
        $html = '';
        foreach ($menus as $key => $menu)
        {
            if($menu->parent_id == $parent_id)
            {
                $html .='
                <li>
                <a href="/danh-muc/' . $menu->id. '-' . Str::slug($menu->name, '-') .'.html">
                ' . $menu->name . '
                </a>';
                if(self::isChild($menus, $menu->id)){
                    $html .= '<ul class="sub-menu">';
                    $html .= self::menus($menus, $menu->id);
                    $html .='</ul>';
                }

                unset($menus[$key]);

                $html .='</li>
                ';
            }
        }
        return $html;
    }
    public static function isChild($menus, $id):bool
    {
        foreach ($menus as $menu)
        {
            if($menu->parent_id == $id){
                return true;
            }
        }
        return false;
    }
    public static function price($price = 0, $pricesale = 0)
    {

        if($pricesale != 0 ) return '<strike style="color: red">' . number_format($price) .' VND</strike>'
            . '<br />' .number_format($pricesale) . 'VND';
        if($price != 0 ) return number_format($price) . 'VND';
        return '<a href="/contact_show">Liên hệ</a>';
    }
}
