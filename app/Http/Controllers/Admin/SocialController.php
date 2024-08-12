<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\social\socialService;
use App\Models\Social;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SocialController extends Controller
{
    protected $social;
    public function __construct(socialService $social)
    {
        $this->social = $social;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.socials.list', [
            'title' => 'Danh sách kết nối',
            'socials' =>  $this->social->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.socials.add', [
            'title' => 'Tạo kết nối mới'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'is_link' => 'required',
            'thumb' => 'required'
        ], [
            'name.required' => 'Vui lòng nhâp tên',
            'is_link.required' => 'Vui lòng dán đường dẫn',
            'thumb.required' => 'Vui lòng tải hình lên',
        ]);

        $this->social->insert($request);
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function edit(Social $social)
    {
        return view('admin.socials.edit', [
            'title' => 'Cập nhật kết nối: ' . $social->name,
            'social' => $social
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Social $social)
    {
        $request->validate([
            'name' => 'required',
            'is_link' => 'required',
            'thumb' => 'required'
        ], [
            'name.required' => 'Vui lòng nhâp tên',
            'is_link.required' => 'Vui lòng dán đường dẫn',
            'thumb.required' => 'Vui lòng tải hình lên',
        ]);

        $Social = $this->social->update($social, $request);
        if ($Social) {
            Session::flash('success', 'Đã cập nhật kết nối thành công');
            return redirect('/admin/social/list');

        }

        Session::flash('error', 'Cập nhật kết nối không thành công');
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
        $social = $this->social->remove($request);
        return $social ?
               response()->json(['error' => false, 'message' => 'Đã thực xóa kết nối thành công'])
               : response()->json(['error' => false, 'message' => 'Thực xóa kết nối không thành công']);
    }
}