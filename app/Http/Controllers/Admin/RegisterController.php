<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Register\FormRequestRegister;
use App\Http\Services\account\accountService;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    protected $account = '';
    public function __construct(accountService $account)
    {
        $this->account = $account;
    }

    public function create()
    {
        return view('admin.user.register', [
            'title' => 'đăng ký tài khoản'
        ]);
    }

    public function register(FormRequestRegister $request)
    {
        $result = $this->account->register($request);
        if ($result) {
            return redirect('/admin/user/login');
        }

        return redirect()->back();
    }
}