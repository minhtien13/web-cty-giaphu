<?php

namespace App\Helpers;

use App\Models\Menu;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class helper
{
    public static function menus($data, $parent_id = 0, $str = '')
    {
        $html = "";
        foreach ($data as $key => $row) {
            if ($row->parent_id == $parent_id) {
                $html .= '<option value="'. $row->id .'">'. $str . $row->name .'</option>';
                unset($data[$key]);
                $html .= self::menus($data, $row->id, '|__ ');
            }

        }

        return $html;
    }

    public static function menuTable($data, $parent_id = 0, $str = '')
    {
        $html = "";
        foreach ($data as $key => $row) {
            if ($row->parent_id == $parent_id) {
                $html .= '
                   <tr>
                        <td>'. $row->id .'</td>
                        <td>'. $str . $row->name .'</td>
                        <td>'. self::isStatus($row->is_status) .'</td>
                        <td>'. $row->updated_at .'</td>
                        <td>'. $row->created_at .'</td>
                        <td>
                            <div class="main__editor">
                                <a href="/admin/menu/edit/' . $row->id .'" class="main__btn bg-primary">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <a href="javascript:void(0)" onClick="OnRemove(\'/admin/menu/delete\', ' . $row->id .')" class="main__btn bg-danger ml-2">
                                <i class="fas fa-trash"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                ';

                unset($data[$key]);
                $html .= self::menuTable($data, $row->id, '|__');
            }

        }

        return $html;
    }

    public static function isStatus($status)
    {
        return $status == 1 ? '<span class="text-primary">công khai</span>' :
                              '<span class="text-danger">không công khai</span>';
    }

    public static function removeFile($url)
    {
        $url = trim($url, '/');
        if (File::exists($url)) {
            File::delete($url);
        }
    }

    public static function loadProductMenu($menuId)
    {
        $html = '';
        $products = Product::select('id', 'title', 'is_link', 'thumb', 'description')
                    ->where('menu_id', $menuId)->paginate(6);

        if (count($products) != 0) {
            $html .= '<ul class="product__list">';
            foreach ($products as $product) {
                $html .= '
                  <li class="product__list-item">
                    <div class="product__wrapper">
                        <div class="product__wrapper__ima">
                        <img
                            src="/template/asset/images/logo.jpg"
                            alt="gia-phu-architects"
                            class="product__wrapper__logo"
                            />

                        <img
                            src="'. $product->thumb .'"
                            alt="gia phu Architects"
                            class="product__wrapper__image"
                        />
                        </div>
                        <div class="product__wrapper__info">
                        <a href="/dich-vu/'. $product->is_link . '" class="product__wrapper__info-title">
                            <h2>'. $product->title .'</h2>
                        </a>
                        <div class="product__wrapper__content">
                            <span class="product__wrapper__info-desc">
                            '. $product->description .'
                            </span>

                            <div class="product__wrapper__info-buttom">
                            <a href="/dich-vu/'. $product->is_link . '" class="product__wrapper__info-btn btn">
                                Xem thêm <i class="fa-solid fa-chevron-right"></i>
                            </a>
                            </div>
                        </div>
                        </div>
                    </div>
                    </li>
                ';
            }
            $html .= '</ul>';
        } else {
            return false;
        }

        return $html;
    }

    public static function loadMenuPublic()
    {
        return Menu::select('id', 'name')->where('is_status', 1)->get();
    }

    public static function bread($name, $parentID = 0, $pageNumber = 0)
    {
        $html =  '';

        if ($parentID != 0) {
            $bread =  Menu::select('id', 'name')
                  ->where('id', $parentID)
                  ->where('is_status', 1)->first();

            if ($bread) {
                $link = $parentID == 0 ? 'dich-vu' : $bread->id . '-' . \Str::slug($bread->name);
                $html .= '
                    <li class="bread__list-item">
                        <a href="/danh-muc/ ' . $link .'.html" class="bread__list-link">
                            '. $bread->name .'
                        </a>
                        <span><i class="fa-solid fa-chevron-right"></i></span>
                    </li>
                ';
            }
        }

        $html .= '
            <li class="bread__list-item">
                <p class="bread__list-link"> '. $name .'</p>
                <span><i class="fa-solid fa-chevron-right"></i></span>
            </li>
        ';

        return $html;
    }

    public static function headLePrice(int $price)
    {
       $number = number_format($price, 0, '.', ',') . 'VND';

       if ($price > 99000000) {
            $number = substr($price, 0, -6) . 'TR';
       }

       if ($price > 9990000000) {
            $isNumber = substr($price, 1, -9);
            $number = $isNumber != 0 ? substr($price, 0, -10) . ',' . substr($price, 1, -9) . ' TỶ'
                      : substr($price, 0, -10) . ' TỶ';
       }

       if ($price > 99900000000) {
          $number = substr($price, 0, -10);
       }

       if ($price > 999900000000) {
            $number = substr($price, 0, -10) . ' TỶ';
       }

       return $number;
    }

    public static function dateLoginUser()
    {
        $userID = Auth::user()->id;
        $user = DB::table('user_infos')->where('user_id', $userID)->first();
        if (!$user) return false;
        $data = [
            'info_email' => $user->info_email,
            'user_create' => $user->user_create,
            'user_id' => $user->user_id,
            'date_register' => $user->date_register,
            'date_active' => $user->date_active,
            'date_login' => date('m/d/Y'),
            'is_role' => 0
        ];

        DB::table('user_infos')->where('user_id', $userID)->update($data);
    }

}