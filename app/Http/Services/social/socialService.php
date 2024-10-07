<?php

namespace App\Http\Services\social;

use App\Helpers\helper;
use App\Models\Social;
use Illuminate\Support\Facades\Session;

class socialService
{
    public function get()
    {
        return Social::orderByDesc('id')->paginate(20);
    }

    public function insert($request)
    {
        try {
            $Social = Social::create($request->all());
            if ($Social) {
                Session::flash('success', 'Đã tạo kết nối thành công');
                return true;
            }

            Session::flash('error', 'Tạo kết nối không thành công');
            return false;
        } catch (\Exception $error) {
            Session::flash('error', 'Tạo kết nối không thành công');
            return false;
        }
    }

    public function update($social, $request)
    {
        try {
            $social->fill($request->input());
            $social->save();
            return true;
        } catch (\Exception $e) {
                return $e;
        }
    }

    public function remove($request)
    {
        $socialID = (int)$request->input("id");

        $result = Social::where("id", $socialID)->first();

        if ($result) {
            helper::removeFile($result->thumb);
            Social::where("id", $socialID)->delete();
            return true;
        }

        return false;
    }
}
