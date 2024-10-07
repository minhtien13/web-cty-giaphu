<?php

namespace App\Http\Services\product;

use App\Helpers\helper;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class productService
{
    public function insert($request)
    {
        try {
            $data = $request->input();
            $data['user_id'] = Auth::user()->id;
            $result = Product::create($data);
            if ($result) {
                Session::flash('success', 'Đã tạo sản phẩm thành công');
                return true;
            }

            Session::flash('error', 'Tạo sản phẩm không thành công');
            return false;

        } catch (\Exception $err) {
            Session::flash('error', 'Tạo sản phẩm không thành công');
            return false;
        }
    }

    public function get($search = '')
    {
        return Product::with('menu')->with('user')->orderByDesc("id")
                       ->where('title', 'LIKE', '%' . $search . '%')
                       ->paginate(20);
    }

    public function checkUrl($request)
    {
        $url = $request->input('url');
        $first = Product::where("is_link", $url)->first();
        if (!is_null($first)) {
           $url .= '-' . time();
        }
        return $url;
    }

    public function update($product, $request)
    {
        try {
            $product->fill($request->input());
            $product->save();
            return true;
        } catch (\Exception $e) {
                return false;
        }
    }

    public function remove($request)
    {
        try {
            $productID = (int)$request->input("id");
            $result = Product::where("id", $productID)->select('id', 'thumb')->first();
            if ($result) {
                helper::removeFile($result->thumb);
                Product::where("id", $productID)->delete();
                return true;
            }

            return false;

        } catch (\Exception $e) {
            return false;
        }
    }

    // home

    public function getPublic($limit = 10, $search = '')
    {
        return Product::orderByDesc("id")
        ->where('is_status', 1)
        ->where('title', 'LIKE', '%' . $search . '%')
        ->select('is_link', 'title', 'description', 'thumb')
        ->paginate($limit);
    }

    public function getListPublic($menuID = 0)
    {
        if ($menuID != 0) {
            return Product::orderByDesc("id")
                    ->where('is_status', 1)
                    ->where('menu_id', $menuID)
                    ->select('id', 'is_link', 'title', 'description', 'thumb', 'price')
                    ->paginate(10);
        }

        return Product::orderByDesc("id")
                ->where('is_status', 1)
                ->select('id', 'is_link', 'title', 'description', 'thumb', 'price')
                ->paginate(10);
    }

    public function detail($slug)
    {
        $result = Product::where('is_link', $slug)
                  ->where('is_status', 1)
                  ->select('id', 'is_link', 'title', 'description', 'thumb', 'content', 'menu_id')
                  ->first();

        if ($result) {
            return $result;
        }
        return false;
    }

    public function search()
    {
        return Product::select('title')->get();
    }


}