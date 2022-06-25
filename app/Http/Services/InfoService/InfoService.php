<?php

namespace App\Http\Services\InfoService;

use App\Models\Info;
use Illuminate\Support\Facades\Session;

class InfoService
{
    public function getAll()
    {
        return Info::orderbyDesc('id')->get();
    }
    public function update($info, $request)
    {
        $info->name = (string) $request->input('address');
        $info->description = (string) $request->input('description');
        $info->content = (string) $request->input('content');
        $info->thumb = (string) $request->input('file');
        $info->save();

        Session::flash('success','Sửa thông tin thành công');
        return true;
    }
}
