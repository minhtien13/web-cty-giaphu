<?php

namespace App\Http\Controllers;

use App\Http\Services\menu\menuService;
use App\Http\Services\product\productService;
use App\Http\Services\product\productSliderService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $product = '';
    protected $productSlider = '';
    protected $menuService = '';

    public function __construct(productService $product, menuService $menu, productSliderService $slider)
    {
        $this->product = $product;
        $this->menuService = $menu;
        $this->productSlider = $slider;
    }

    public function listAll()
    {
        return view('products.service', [
            'title' => 'Gia phú - trang dịch vụ',
            'name' => 'trang dịch vụ',
            'products' => $this->product->getListPublic(),
            'menu' => 0
        ]);
    }

    public function list($id, $slug)
    {
        $menu = $this->menuService->getNameFirst($id);
        return view('products.service', [
            'title' => 'Gia phú - ' . $menu->name,
            'name' => $menu->name,
            'products' => $this->product->getListPublic($id),
            'menu' => $menu->parent_id
        ]);
    }

    public function detail($slug)
    {
        $product = $this->product->detail($slug);
        $id = $product->id;
        $sliders = $this->productSlider->getPublic($id);

        return view('products.detail', [
            'title' => 'Gia phú - ' . $product->title,
            'name' =>  $product->title,
            'product' => $product,
            'menu' =>  $product->menu_id,
            'sliders' => $sliders
        ]);
    }

    public function search()
    {
        $data = $this->product->search();
        return response()->json($data, 200);
    }
}
