<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\form\formRequestLogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.user.login', [
            'title' => 'đăng nhập tài khoản'
        ]);
    }

    public function login(formRequestLogin $request)
    {
        $isRename = $request->input('renamer');
        $renamer = !isset($isRename) ? 0 : $isRename;

        if (Auth::attempt(
            ['email' => $request->input('email'),
             'password' => $request->input('password')
            ], $renamer)) {

            $this->dateLoginUser();
            return redirect('/admin');
        }

        Session::flash('error', 'Vui lòng đăng nhập lại');
        return redirect()->back();
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/admin/user/login');
    }

    public function dateLoginUser()
    {
        $userID = Auth::user()->id;
        $user = DB::table('user_infos')->where('user_id', $userID)->first();
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