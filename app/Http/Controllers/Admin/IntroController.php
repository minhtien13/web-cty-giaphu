<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\c;
use Illuminate\Http\Request;
use App\Http\Services\intro\introService;
use App\Models\Intro;
use Illuminate\Support\Facades\Session;

class IntroController extends Controller
{
    protected $intro = '';
    public function __construct(introService $intro)
    {
        $this->intro = $intro;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $intro = $this->intro->getOneRow();
        if (!$intro) return redirect('/admin/intro/add');

        return view('admin.intros.view', [
            'title' => 'nội dung trang giới của website',
            'intro' => $intro
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $check = $this->intro->checkRowOne();
        if ($check) return redirect('/admin/intro/list');

        return view('admin.intros.add', [
            'title' => 'Tạo trang giới thiệu'
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
        $check = $this->intro->checkRowOne();
        if ($check) return redirect('/admin/intro/list');

        $request->validate([
            'description' => 'required',
            'content' => 'required'
        ], [
            'description.required' => 'Vui lòng nhập mô tả ngắn về công ty',
            'content.required' => 'Vui lòng nhập tiểu sử về công ty'
        ]);

        $result = $this->intro->insert($request);
        if ($result) {
            Session::flash('success', 'Đã tạo trang giới thiệu thành công');
            return redirect('/admin/intro/list');
        }

        Session::flash('error', 'Tạo trang giới thiệu không thành công');
        return redirect('/admin/intro/list');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function edit(Intro $intro)
    {
        $check = $this->intro->checkRowOne();
        if (!$check) return redirect('/admin/intro/add');

        return view('admin.intros.edit', [
            'title' => 'Cập nhật trang giới thiệu',
            'intro' => $intro
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Intro $intro)
    {
        $check = $this->intro->checkRowOne();
        if (!$check) return redirect('/admin/intro/add');

        $request->validate([
            'description' => 'required',
            'content' => 'required'
        ], [
            'description.required' => 'Vui lòng nhập mô tả ngắn về công ty',
            'content.required' => 'Vui lòng nhập tiểu sử về công ty'
        ]);

        $result = $this->intro->insert($request);
        if ($result) {
            Session::flash('success', 'Thực thiện cập nhật trang giới thiệu thành công');
            return redirect('/admin/intro/list');
        }

        Session::flash('error', 'Thực thiện cập nhật trang giới thiệu không thành công');
        return redirect('/admin/intro/list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request )
    {
        //
        $result = $this->intro->remove($request);
        return $result ? response()->json(['error' => false, 'message' => 'Thực thiện xóa trang giới thiệu thành công'])
                : response()->json(['error' => true, 'message' => 'Thực thiện xóa trang giới thiệu không thành công']);
    }
}