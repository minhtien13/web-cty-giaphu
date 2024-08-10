<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\uploadService;
use Illuminate\Http\Request;

class UploadFileController extends Controller
{
    protected $upload = '';
    public function __construct(uploadService $uploadService)
    {
        $this->upload = $uploadService;
    }

    public function upload(Request $request)
    {
        $result = $this->upload->upload($request);
        return $result ? response()->json(['error' => false, 'url' => $result])
                       : response()->json(['error' => true, 'message' => 'upload file không thành công']);
    }
}