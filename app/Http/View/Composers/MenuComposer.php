<?php

namespace App\Http\View\Composers;

use App\Models\Menu;
use App\Repositories\UserRepository;
use Illuminate\View\View;

class MenuComposer
{

    public function __construct()
    {

    }

    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $menus = Menu::orderByDesc('id')->where("is_status", 1)->select("id", "name")->get();
        $view->with('menus', $menus);
    }
}