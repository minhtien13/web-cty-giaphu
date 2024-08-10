<?php

namespace App\Http\Controllers;

use App\Http\Services\menu\menuService;
use App\Http\Services\product\productService;
use Illuminate\Http\Request;

class MainController extends Controller
{
    protected $product = '';
    protected $menuService = '';
    public function __construct(productService $product, menuService $menu)
    {
        $this->product = $product;
        $this->menuService = $menu;
    }

    public function index(Request $request)
    {
        $search = !isset($request['s']) ? '' : $request['s'];
        $template = $search == '' ? 'home' : 'pages.search';
        return view($template, [
            'title' => 'Gia phú - chuyên xây dựng - thiết kế thi công tròn gói - .TP châu đốc, An giang',
            'products' => $this->product->getPublic(10, $search),
            'menus' => $this->menuService->getMenuHome()
        ]);
    }

    public function list()
    {

    }
}