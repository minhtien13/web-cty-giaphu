<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\form\formRequestRegister;
use App\Http\Services\account\accountService;
use App\Models\c;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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

    public function password(User $account)
    {
        return view('admin.accounts.password', [
            'title' => 'Cấp lại mật khẩu',
            'accounts' => $account
        ]);
    }

    public function resetPassword(Request $request, User $account)
    {
        $request->validate([
            'password' => 'required|confirmed|min:6'
        ], [
            'password.required' => 'Vui lòng nhập mật khấu mới',
            'password.confirmed' => 'Vui lòng nhập mật khấu xác nhận',
            'password.min' => 'Mật khấu bắt buột từ 6 ký tự trở lên',
        ]);

        $result = $this->account->updateAccount($account, $request);
        if ($result) {
            Session::flash('success', 'Đã cập nhật mật khẩu thành công');
            return redirect('/admin/account/list');
        }

        Session::flash('error', 'Cập nhật mật khẩu không thành công');
        return redirect('/admin/account/list');
    }

    public function changePassword($account)
    {
        $result = $this->account->getAccountFirst($account);
        if (!$result && $account != Auth::user()->id) return redirect('/admin');

        return view('admin.accounts.changePassword', [
            'title' => 'Đổi mật khẩu'
        ]);
    }

    public function setPassword(Request $request, User $account)
    {
        $request->validate([
            'password' => 'required|confirmed|min:6',
            'password_old' => 'required'
        ], [
            'password_old.required' => 'Vui lòng nhập mật khấu củ',
            'password.required' => 'Vui lòng nhập mật khấu mới',
            'password.confirmed' => 'Vui lòng nhập mật khấu xác nhận',
            'password.min' => 'Mật khấu bắt buột đặt từ 6 ký tự trở lên',
        ]);

        $password_old = $request->input('password_old');
        if (!password_verify($password_old, $account->password)) {
            Session::flash('error', 'Nhập mật khẩu củ không chính xác');
            return redirect()->back();
        }

        $result = $this->account->changePassword($account, $request);
        if ($result) {
            Session::flash('success', 'Đã cập nhật mật khẩu thành công');
            return redirect()->back();
        }

        Session::flash('error', 'Cập nhật mật khẩu không thành công');
        return redirect()->back();
    }

    public function account(User $account)
    {
        return view('admin.accounts.account', [
            'title' => 'Tạo tài khoản mới',
            'account' => $account
        ]);
    }

    public function updateAccount(Request $request, User $account)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email'
        ]);

        $result = $this->account->updateAccount($account, $request);
        if ($result) {
            Session::flash('success', 'Đã cập nhật thông tin thành công');
            return redirect()->back();
        }

        Session::flash('error', 'Cập nhật thông tin không thành công');
        return redirect()->back();
    }
}