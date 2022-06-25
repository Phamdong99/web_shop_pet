<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginMemberController extends Controller
{

    public function index()
    {
        return view('login', [
            'title'=>'Đăng nhập'
        ]);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email:filter',
            'password' => 'required'
        ]);

        if (Auth::guard('member')->attempt([

            'email' => $request->input('email'),
            'password' => $request->input('password')
        ], $request->input('remember')))
        {
            return redirect() -> route('member');
        }

        Session::flash('error','Email hoặc Password không đúng');
        return redirect()->back();

    }
    public function logout(){

        Auth::guard('member')->logout();
        return redirect('/member_login');

    }
}
