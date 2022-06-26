<?php

namespace App\Http\Services\Employee;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class EmployeeService
{
    public function get()
    {
        return User::orderbyDesc('id')->paginate(10);
    }

    public function create($request)
    {
        try{
            User::create([
                'name' => (string) $request->input('name'),
                'email' => (string) $request->input('email'),
                'password' =>hash::make((string) $request->input('password')),
                'address' => (string) $request->input('address'),
                'phone' => (string) $request->input('phone'),
                'description' => (string) $request->input('description')

            ]);
            Session::flash('success','Thêm nhân viên mới thành công');

        }catch (\Exception $err){

            Session::flash('error','Thêm nhân viên lỗi');
            log::info($err->getMessage());

            return false;
        }

        return true;
    }

    public function update($employee, $request)
    {
        $employee->name = (string) $request->input('name');
        $employee->email = (string) $request->input('email');
        $employee->password = hash::make((string) $request->input('password'));
        $employee->address = (string) $request->input('address');
        $employee->phone =(string) $request->input('phone');
        $employee->description = (string) $request->input('description');
        $employee->save();

        Session::flash('success','Sửa thông tin thành công');
        return true;
    }

    public function destroy($request)
    {
        $id = (int) $request->input('id');
        $employee = User::where('id', $id)->first();

        if ($employee){
            return User::where('id', $id)->delete();
        }

        return false;
    }


}
