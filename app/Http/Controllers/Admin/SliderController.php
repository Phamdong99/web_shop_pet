<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Services\Slider\SliderService;
use Illuminate\Support\Facades\Redirect;

class SliderController extends Controller
{
    protected $slider;

    public function __construct(SliderService $slider)
    {
        $this->slider = $slider;
    }

    public function create()
    {
        return view('admin.slider.add', [
            'title' => 'Thêm Slider mới'
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required',
            'url' => 'required',
            'file' =>'required'
        ]);

        $this->slider->create($request);

        return Redirect('admin/sliders/list');
    }
    public function index()
    {
        return view('admin.slider.list', [
           'title' => 'Danh sách slider mới nhất',
           'sliders' => $this->slider->get()
        ]);
    }
    public function show(Slider $slider)
    {
        return view('admin.slider.edit', [
            'title' => 'Chỉnh sửa slider : ' .$slider->name,
            'slider'=>$slider
        ]);
    }
    public function update(Slider $slider, Request $request)
    {
 /*       $this->validate($request, [
           'name' => 'required',
            'url' => 'required',
            'file' => 'required'

        ]);*/

        $result = $this->slider->update($request, $slider);
        if($result){
            return Redirect('admin/sliders/list');
        }
        return Redirect()->back();
    }
    public function destroy(Request $request)
    {
        $result = $this->slider->destroy($request);
        if($result){
            return response()->json([
                'error' => false,
                'message' => 'Xóa slider thành công'
            ]);
        }
        return response()->json([
            'error' => true
        ]);
    }
}
