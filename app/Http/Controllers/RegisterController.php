<?php

namespace App\Http\Controllers;

use App\Http\Services\Member\MemberService;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    protected $memberService;
    public function __construct(MemberService $memberService)
    {
        $this->memberService=$memberService;
    }

    public function register()
    {
        return view('register', [
            'title'=>'Đăng ký tài khoản'
        ]);
    }

    public function store_register(Request $request)
    {

        $this->validate($request, [
            'name'=>'required',
            'email'=>'required|unique:members,email',
            'password'=>'required|confirmed',
        ]);

        $this->memberService->create_register($request);
        return redirect('member_login');
    }
}
