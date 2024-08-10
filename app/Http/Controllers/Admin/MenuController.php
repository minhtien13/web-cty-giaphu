<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\menu\formMenuRequest;
use App\Http\Services\menu\menuService;
use App\Models\c;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MenuController extends Controller
{
    protected $MenuService = '';

    public function __construct(menuService $menuService)
    {
        $this->MenuService = $menuService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.menus.list', [
            'title' => 'Danh sách menu',
            'menus' => $this->MenuService->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.menus.add', [
            'title' => 'Tạo menu',
            'menus' => $this->MenuService->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(formMenuRequest $request)
    {
        $this->MenuService->insert($request);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function show(c $c)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        return view('admin.menus.edit', [
            'title' => 'Cập nhật menu',
            'menus' => $this->MenuService->get(),
            'data' => $menu
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function update(formMenuRequest $request, Menu $menu)
    {
       $result =  $this->MenuService->update($menu, $request);
       if ($result) {
           Session::flash('success', 'Đã cập nhật menu thành công');
           return redirect()->back();
       }
       Session::flash('error', 'Cập nhật menu không thành công');
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
        $result = $this->MenuService->remove($request);
        return $result ? response()->json(['error' => false, 'message' => 'Đã xóa menu thành công'])
                : response()->json(['error' => true, 'message' => 'Xóa menu không thành công']);
    }
}