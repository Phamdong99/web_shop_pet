<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Member\MemberService;
use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    protected $memberService;

    public function __construct(MemberService $memberService)
    {
        $this->memberService = $memberService;
    }

    public function index()
    {
        return view('admin.member.list', [
            'title'=>'Danh sách thành viên',
            'members' => $this->memberService->getAll()
        ]);
    }

    public function create()
    {
        return view('admin.member.add', [
            'title'=>'Thêm thành viên'
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
            /*'address' => 'required',
            'phone' =>'required'*/
        ]);

        $this->memberService->create($request);
        return redirect('/admin/members/list');
    }

    public function show_detail(Member $member)
    {
        return view('admin.member.show_detail', [
            'title'=>'Sửa thành viên',
            'member'=>$member
        ]);
    }

    public function show(Member $member)
    {
        return view('admin.member.edit', [
            'title'=>'Sửa thành viên',
            'member'=>$member
        ]);
    }

    public function update(Member $member, Request $request)
    {
        $this->memberService->update($member, $request);
        return Redirect('admin/members/list');
    }
    public function destroy(Request $request)
    {
        $result = $this->memberService->destroy($request);
        if($result){
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành viên thành công'
            ]);
        }
        return response()->json([
            'error' => true
        ]);
    }
}
