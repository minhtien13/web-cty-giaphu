<?php

namespace App\Http\Services\menu;

use App\Models\Menu;
use Exception;
use Illuminate\Support\Facades\Session;

class menuService
{
    public function get()
    {
        return Menu::orderByDesc('id')->get();
    }

    public function insert($request)
    {
        $result = Menu::create($request->input());

        if ($result) {
            Session::flash('success', 'Đã tạo menu thành công');
            return true;
        }

        Session::flash('error', 'Tạo menu không thành công');
        return false;
    }

    public function update($menu, $request)
    {
        try {
            $menu->fill($request->input());
            $menu->save();
            return true;
        } catch (Exception $e) {
                return $e;
        }
    }

    public function remove($request)
    {
        $menuID = (int)$request->input("id");

        $result = Menu::where("id", $menuID)->first();

        if ($result) {
            Menu::where("id", $menuID)->orWhere("parent_id", $menuID)->delete();
            return true;
        }

        return false;
    }

    // home
    public function getMenuHome()
    {
        return Menu::orderByDesc('id')->where('is_status', 1)->select('name', 'id')->get();
    }

    public function getNameFirst($id)
    {
        return Menu::where('id', $id)->where('is_status', 1)->select('name', 'id', 'parent_id')->first();
    }
}