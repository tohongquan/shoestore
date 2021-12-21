<?php

namespace App\Http\View\Composers;

use App\Models\Menu;
use Illuminate\View\View;

class MenuComposer
{
    public function compose(View $view)
    {
        $menus =  Menu::select('id', 'name', 'parent_id','thumb')->where('active', 1)->orderByDesc('id')->get();
        $view->with('menus', $menus);
    }
}
