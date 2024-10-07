<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\File;

class uploadService
{
    public function upload($request)
    {
        if ($request->hasFile('file')) {
            try {
                $name = $request->file('file')->getClientOriginalName();
                $pathFull = 'upload/' . date("Y/m/d");

                $checkFile = 'storage/' . $pathFull . '/' . $name;
                if (File::exists($checkFile)) {
                    $name = time() . '-' . $name;
                }

                $request->file('file')->storeAs($pathFull,  $name, 'public_uploads');

                return '/storage/' . $pathFull . '/' . $name;
            } catch (\Exception $err) {
                return false;
            }
        }
    }
}
