<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\product\productFormRequest;
use App\Http\Services\menu\menuService;
use App\Http\Services\product\productService;
use App\Http\Services\product\productSliderService;
use App\Models\c;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    protected $MenuService = '';
    protected $productService = '';
    protected $productSliderService = '';


    public function __construct(menuService $menuService, productService $product, productSliderService $productSlider)
    {
        $this->MenuService = $menuService;
        $this->productService = $product;
        $this->productSliderService = $productSlider;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = !is_null($request->input('search')) ? $request->input('search') : '';
        $title = $search != '' ? 'đã tìm kiếm' : '';

        return view('admin.products.list', [
            'title' => 'Danh sách sản phẩm ' . $title,
            'menus' => $this->MenuService->get(),
            'products' => $this->productService->get($search)
        ]);
    }

    public function check(Request $request)
    {
        $result = $this->productService->checkUrl($request);
        return response()->json(['url' => $result]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.add', [
            'title' => 'Tạo sản phẩm',
            'menus' => $this->MenuService->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(productFormRequest $request)
    {
        $this->productService->insert($request);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function show(c $c)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.products.edit', [
            'title' => 'Cập nhật sản phẩm - ' . $product->title,
            'menus' => $this->MenuService->get(),
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $result = $this->productService->update($product, $request);
        if ($result) {
            Session::flash('success', 'Đa cập nhật sản phẩm thành công');
            return redirect('/admin/product/list');
        }

        Session::flash('error', 'Thực hiện cập nhật sản phẩm không thành công');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $result = $this->productService->remove($request);
        $this->productSliderService->removeSliderToProductAll($request);
        return $result ?
               response()->json(['error' => false, 'message' => 'Đã thực hiện xóa sản phẩm thành công']):
               response()->json(['error' => false, 'message' => 'Thực hiện xóa sản phẩm không thành công']);
    }
}