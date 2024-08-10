<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\product\productSliderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductSliderController extends Controller
{
    protected $productSlider = '';

    public function __construct(productSliderService $productSliderService)
    {
        $this->productSlider = $productSliderService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slider)
    {
        return view('admin.products.sliders.list', [
            'title' => 'Thêm hình slider cho sản phẩm',
            'sliders' => $this->productSlider->get($slider),
            'sliderId' => $slider
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($slider)
    {
       $product = $this->productSlider->getProduct($slider);
       if ($product == false) return redirect('/admin/product/list');
       return view('admin.products.sliders.add', [
        'title' => 'Thêm hình slider cho sản phẩm: ' . $product->title,
        'sliderId' => $slider
       ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $slider)
    {
        $request->validate([
            'thumb' => 'required'
        ], [
            'thumb.required' => 'Vui lòng upload hình slider'
        ]);

        $product = $this->productSlider->getProduct($slider);
        if ($product == false) {
            Session ::flash('error', 'Sản phẩm không tồn tại nên không thể thêm hình slider');
            return redirect('/admin/product/list');
       }

       $this->productSlider->insert($request, $slider);
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
        $productSlider = $this->productSlider->remove($request);
        return $productSlider ?
               response()->json(['error' => false, 'message' => 'Đã xóa hình slider thành công']) :
               response()->json(['error' => true, 'message' => 'Thực hiện xóa hình slider không thành công']);
    }
}