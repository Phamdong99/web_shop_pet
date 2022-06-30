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

        $patch_file = $request->input('file');

        if (empty($patch_file)){
            $patch_file = $info->thumb;
        }

        $info->name = (string) $request->input('address');
        $info->description = (string) $request->input('description');
        $info->content = (string) $request->input('content');
        $info->thumb = $patch_file;
        $info->save();

        Session::flash('success','Sửa thông tin thành công');
        return true;
    }
}
