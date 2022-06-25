<?php

namespace App\Http\Services\Slider;

use http\Env\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use App\Models\Slider;
use Illuminate\Support\Facades\Storage;

class SliderService
{
    public function create($request)
    {
        try{
            Slider::create([
                'name' => (string) $request->input('name'),
                'url' => (string) $request->input('url'),
                'thumb' => (string) $request->input('file'),
                'sort_by' => (int) $request->input('sort_by'),
                'active' => (int) $request->input('active')

            ]);
            Session::flash('success','Thêm slider mới thành công');

        }catch (\Exception $err){

            Session::flash('error','Thêm slider lỗi');
            log::info($err->getMessage());

            return false;
        }

        return true;
    }
    public function get()
    {
        return Slider::orderByDesc('id')->paginate(15);
    }
    public function update($request, $slider)
    {
        try{
            $slider->name = (string) $request->input('name');
            $slider->url = (string) $request->input('url');
            $slider->thumb = (string) $request->input('file');
            $slider->sort_by = (int) $request->input('sort_by');
            $slider->active = (int) $request->input('active');
            $slider->save();
            Session::flash('success', 'Cập nhật slider thành công');

        }catch (\Exception $err){

            Session::flash('error','Cập nhật không thành công');
            Log::info($err->getMessage());
            return false;
        }


        return true;
    }
    public function destroy($request)
    {
        $slider = Slider::where('id', $request->input('id'))->first();
        if ($slider){
            $path = str_replace('storage','public', $slider->thumb);
            Storage::delete($path);
                $slider->delete();
                return true;
        }

        return false;
    }

    public function show()
    {
        return Slider::where('active', 1)->orderbyDesc('sort_by')->get();
    }
}
