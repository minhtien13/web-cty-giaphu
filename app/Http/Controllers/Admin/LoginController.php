<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\form\formRequestLogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.user.login');
    }

    public function login(formRequestLogin $request)
    {
        $isRename = $request->input('renamer');
        $renamer = !isset($isRename) ? 0 : $isRename;

        if (Auth::attempt(
            ['email' => $request->input('email'),
             'password' => $request->input('password')
            ], $renamer)) {

            return redirect('/admin');
        }

        Session::flash('error', 'Vui lòng đăng nhập lại');
        return redirect()->back();
    }
}