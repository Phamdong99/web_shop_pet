<?php

namespace App\Http\Services\Member;

use App\Models\Member;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class MemberService
{
    public function getAll()
    {
        return Member::orderbyDesc('id')->paginate(15);
    }

    public function create($request)
    {
        try{
            Member::create([
                'name' => (string) $request->input('name'),
                'email' => (string) $request->input('email'),
                'password' => hash::make((string) $request->input('password')),
                /*'address' => (string) $request->input('address'),
                'phone' => (string) $request->input('phone'),
                'description' => (string) $request->input('description')*/

            ]);
            Session::flash('success','Thêm thành viên mới thành công');

        }catch (\Exception $err){

            Session::flash('error','Thêm thành viên lỗi');
            log::info($err->getMessage());

            return false;
        }

        return true;
    }
    public function update($member, $request)
    {
            $member->name = (string) $request->input('name');
            $member->email = (string) $request->input('email');
            $member->password = hash::make((string) $request->input('password'));
           /* $member->address = (string) $request->input('address');
            $member->phone =(string) $request->input('phone');
            $member->description = (string) $request->input('description');*/
            $member->save();

            Session::flash('success','Sửa thông tin thành công');
            return true;
    }
    public function destroy($request)
    {
        $id = (int) $request->input('id');
        $member = Member::where('id', $id)->first();

        if ($member){
            return Member::where('id', $id)->delete();
        }

        return false;
    }

    public function create_register($request)
    {
        try{
            Member::create([
                'name' => (string) $request->input('name'),
                'email' => (string) $request->input('email'),
                'password' => Hash::make((string) $request->input('password')),

            ]);
            Session::flash('success','Thêm thành viên mới thành công');

        }catch (\Exception $err){
            Session::flash('error','Thêm thành viên lỗi');
            log::info($err->getMessage());

            return false;
        }

        return true;
    }

}
