<?php

namespace App\Http\Services\product;

use App\Helpers\helper;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class productSliderService
{
    public function get($slider)
    {
        return DB::table('product_slider')
            ->join('products', 'product_slider.product_id', '=', 'products.id')
            ->select('product_slider.*', 'products.title')
            ->where('product_slider.product_id', $slider)
            ->orderByDesc('sort_by')
            ->get();

    }

    public function insert($request, $slider)
    {
        $data = [
            'sort_by' => $request->input('sort_by'),
            'thumb' => $request->input('thumb'),
            'product_id' => $slider,
        ];

        $result = DB::table('product_slider')->insert($data);
        if ($result) {
            Session ::flash('success', 'Đã thêm hình slider của sản phẩm thành công');
            return true;
        }

        Session ::flash('error', 'Thực hiện thêm hình slider của sản phẩm không thành công');
        return false;
    }

    public function remove($request)
    {
        $id = $request->input('id');
        $slider = DB::table('product_slider')->where('id', $id)->select('id', 'thumb')->first();
        if ($slider) {
            helper::removeFile($slider->thumb);
            $slider = DB::table('product_slider')->where('id', $id)->delete();
            return true;
        }

        return false;
    }

    public function removeSliderToProductAll($request)
    {
        $id = $request->input('id');
        $sliders = DB::table('product_slider')->where('product_id', $id)->select('id', 'thumb')->get();
        if ($sliders) {
            foreach ($sliders as $slider) {
                helper::removeFile($slider->thumb);
            }

            DB::table('product_slider')->where('product_id', $id)->delete();
            return true;
        }

        return false;
    }

    public function getProduct($slider)
    {
        try {
            $product = Product::where("id", $slider)->first();
            if ($product) {
                return $product;
            }
            return false;

        } catch (\Exception $error) {
            return false;
        }
    }

    public function getPublic($productID)
    {
        return DB::table('product_slider')
                ->where('product_id', $productID)
                ->orderByDesc('sort_by')
                ->select('id', 'thumb')
                ->get();
    }
}
