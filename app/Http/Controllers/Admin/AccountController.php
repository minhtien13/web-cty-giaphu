<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\form\formRequestRegister;
use App\Http\Services\account\accountService;
use App\Models\c;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AccountController extends Controller
{
    protected $account = '';
    public function __construct(accountService $account)
    {
        $this->account = $account;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.accounts.list', [
            'title' => 'Danh sách tài khoản',
            'accounts' => $this->account->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.accounts.add', [
            'title' => 'Tạo tài khoản mới',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(formRequestRegister $request)
    {
       $this->account->insert($request);
       return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function edit(User $account)
    {
        $account['info_email'] = $this->account->getEmailInfo($account->id);
        return view('admin.accounts.edit', [
            'title' => 'Cập nhật tài khoản tên là: ' . $account->name,
            'account' => $account
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $account)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'info_email' => 'required|email',
        ], [
            'name.required' => 'Vui lòng nhập tên tài khoản',
            'email.required' => 'Vui lòng nhập tên người dùng',
            'info_email.required' => 'Vui lòng nhập gmail',
            'info_email.email' => 'Gmail không đúng định dạng',
        ]);


        // Check password
        if ($request->input('password')) {
            $request->validate([
                'password' => 'required|confirmed|min:6',
            ], [
                'password.min' => 'Vui lòng đặt mật khẩu từ 6 ký tự trở lên',
                'password.confirmed' => 'Mật khẩu xác nhận không chính xác'
            ]);
        }

        // Update
        $user = $this->account->update($account, $request);
        if ($user) {
            Session::flash('success', 'Đã cập nhật tài khoản thành công');
            return redirect('/admin/account/list');
        }

        Session::flash('error', 'Cập nhật tài khoản không thành công');
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
        $result = $this->account->remove($request);
        return $result ? response()->json(['error' => false, 'message' => 'Đã thực thiện xóa tài khoản thành công'])
                : response()->json(['error' => true, 'message' => 'Thực thiện xóa tài khoản không thành công']);
    }

    // Info
    public function info(User $user)
    {
        $userInfo = $this->account->getFirstInfo($user->id);
        return view('admin.accounts.info', [
            'title' => 'Thông tin tài khoản của: ' . $user->name,
            'info' =>  $userInfo,
            'account' => $user,
            'user' => $this->account->getFirstUser($userInfo->user_create)
        ]);
    }
}