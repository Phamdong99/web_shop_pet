<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Employee\EmployeeService;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    protected $employeeService;

    public function __construct(EmployeeService $employeeService)
    {
        $this->employeeService = $employeeService;
    }
    public function index()
    {
        return view('admin/users/list', [
            'title'=>'Danh sách nhân viên',
            'employees'=>$this->employeeService->get()
        ]);
    }

    public function create()
    {
        return view('admin.users.add', [
            'title'=>'Thêm nhân viên'
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
            'address' => 'required',
            'phone' =>'required'
        ]);

        $this->employeeService->create($request);
        return redirect('/admin/employees/list');
    }


    public function show_detail(User $employee)
    {
        return view('admin/users/show_detail', [
            'title'=>'Danh sách nhân viên',
            'employee'=>$employee
        ]);
    }
    public function show(User $employee)
    {
        return view('admin/users/edit', [
            'title'=>'Danh sách nhân viên',
            'employee'=>$employee
        ]);
    }

    public function update(User $employee, Request $request)
    {
       $this->employeeService->update($employee, $request);
        return Redirect('admin/employees/list');
    }

    public function destroy(Request $request)
    {
        $result = $this->employeeService->destroy($request);
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
