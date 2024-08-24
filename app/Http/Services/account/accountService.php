<?php

namespace App\Http\Services\account;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

use function PHPUnit\Framework\isNull;

class accountService
{
    public function get()
    {
        $userId = Auth::user()->id;
        return User::orderByDesc('id')->where('id', '!=', $userId)->paginate(30);
    }

    public function getFirstUser($userId  = 0)
    {
        $user = User::where('id', $userId)->select('name', 'is_level')->first();
        return $user ? $user : false;
    }

    public function insert($request)
    {
        try {
            $user = [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'password' => Hash::make($request->input('password')),
                'is_status' => $request->input('is_status', 0),
                'is_level' => $request->input('is_level', 2)
            ];

           $result = User::create($user);
           if ($result) {
                $this->insertInfo($request, $result->id);
                Session::flash('success', 'Đã tạo tài khoản thành công');
                return true;
           }

           Session::flash('error', 'Tạo tài khoản không thành công');
           return false;

        } catch (\Exception $error) {
            Session::flash('error', 'Tạo tài khoản không thành công');
            return false;
        }
    }

    public function register($request)
    {
        try {
            $user = [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'password' => Hash::make($request->input('password')),
                'is_status' => 0,
                'is_level' => 0
            ];

            $result = User::create($user);
            if ($result) {
                 $this->insertInfo($request, $result->id);
                 Session::flash('success', 'Đã đăng ký tài khoản thành công');
                 return true;
            }

            Session::flash('error', 'Đăng ký tài khoản không thành công');
            return false;

        } catch (\Exception $error) {
            Session::flash('error', 'Đăng ký tài khoản không thành công');
            return false;
        }
    }

    public function update($account, $request)
    {
        try {
            $password = !is_null($request->input('password')) ?
                        Hash::make($request->input('password')) :
                        $account->password;

            $user = [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'password' => $password,
                'is_status' => $request->input('is_status'),
                'is_level' => $request->input('is_level')
            ];

            $account->fill($user);
            $account->save();
            $this->updateInfo($request, $account->id);
            return true;
        } catch (\Exception $e) {
                return $e;
        }
    }

    public function remove($request)
    {
        $accountID = (int)$request->input("id");

        $result = User::where("id", $accountID)->first();

        if ($result) {
            DB::table('user_infos')->where('user_id', $accountID)->delete();
            User::where("id", $accountID)->delete();
            return true;
        }

        return false;
    }


    // User Info
    public function insertInfo($request, $userId)
    {
        $userInfo = [
            'info_email' => $request->input('info_email'),
            'user_create' => isset(Auth::user()->id) ? Auth::user()->id : 0,
            'user_id' => $userId,
            'date_register' => date('m/d/Y'),
            'is_role' => 0
        ];

        DB::table('user_infos')->insert($userInfo);
        return true;
    }

    public function updateInfo($request, $userId)
    {
        $userInfo = DB::table('user_infos')->where('user_id', $userId)->first();
        $active = $request->input('is_status');

        $userData = [
            'info_email' => $request->input('info_email'),
            'user_create' => $userInfo->user_create,
            'user_id' => $userInfo->user_id,
            'date_register' => $userInfo->date_register,
            'date_active' => $active == 1 ? date('m/d/Y') : '',
            'is_role' => 0
        ];

        DB::table('user_infos')->where('user_id', $userId)->update($userData);
        return true;
    }

    public function getEmailInfo($userId)
    {
        $userInfo = DB::table('user_infos')->where('user_id', $userId)->select('info_email')->first();
        return $userInfo->info_email;
    }

    public function getFirstInfo($userId)
    {
        $userInfo = DB::table('user_infos')
                    ->where('user_id', $userId)
                     ->join('users', 'user_infos.user_id', '=', 'users.id')
                    ->first();
        return $userInfo;
    }
}