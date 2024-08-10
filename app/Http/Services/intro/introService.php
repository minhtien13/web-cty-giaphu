<?php

namespace App\Http\Services\intro;

use App\Models\Intro;

class introService
{
    public function insert($request)
    {
        try {
            Intro::create($request->all());
            return true;
        } catch (\Exception $err) {
            return false;
        }
    }

    public function checkRowOne()
    {
        $intro = Intro::orderByDesc('id')->first();
        if ($intro) {
            $this->countRowDelete($intro->id);
            return true;
        }

        return false;
    }

    public function getOneRow()
    {
        $intro = Intro::orderByDesc('id')->first();
        if ($intro) {
            $this->countRowDelete($intro->id);
            return $intro;
        }

        return false;
    }

    public function countRowDelete($id = 0)
    {
       Intro::where('id', '!=', $id)->delete();
    }

    public function remove($request)
    {
        try {
            $introID = (int)$request->input("id");
            $result = Intro::where("id", $introID)->first();
            if ($result) {
                Intro::where("id", $introID)->delete();
                return true;
            }

            return false;

        } catch (\Exception $e) {
            return false;
        }
    }

    public function update($intro, $request)
    {
        try {
            $intro->fill($request->all());
            $intro->save();
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}