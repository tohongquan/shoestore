<?php

namespace App\Helpers;

use Illuminate\Support\Str;

class Helper
{
    public static function active($active = 0)
    {
        return $active == 0 ? '<span class="btn btn-danger">No</span>'
            : '<span class="btn btn-success">Yes</span>';
    }

    public static function getParent($menus, $parent_id = 0, $char = '')
    {
        $html = '';
        foreach ($menus as $key => $menu) {
            if ($menu->parent_id == $parent_id) {
                $html .= ' <option value="' . $menu->id . '">' . $char .' '. $menu->name . '</option> ';
                unset($menus[$key]);
                $html .= self::getParent($menus, $menu->id, $char . '━');
            }
        }
        return $html;
    }






}
