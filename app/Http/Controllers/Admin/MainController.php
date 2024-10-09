<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\helper;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function index()
    {
        helper::dateLoginUser();
        return view('admin.home', [
            'title' => 'Quảng trị admin'
        ]);
    }
}