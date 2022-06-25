<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\InfoService\InfoService;
use App\Models\Info;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    protected $infoService;

    public function __construct(InfoService $infoService)
    {
        $this->infoService = $infoService;
    }

    public function index()
    {
        return view('admin.info.info', [
            'title'=>'Thông tin pet shop',
            'infos'=>$this->infoService->getAll()

        ]);
    }
    public function show()
    {
        return view('info', [
            'title'=>'Thông Tin Shop',
            'infos'=>$this->infoService->getAll()
        ]);
    }
    public function show_info()
    {
        return view('admin.info.edit_info', [
            'title' => 'Thông Tin Shop',
            'infos' => $this->infoService->getAll()
        ]);
    }

        public function update(Info $info, Request $request)
    {
        $this->infoService->update($info, $request);
        return redirect('admin/infos/info');
    }
}
