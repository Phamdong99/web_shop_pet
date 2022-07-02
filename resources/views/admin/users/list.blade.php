@extends('admin.main')

@section('content')
    <table class="table">
        <div>
            <button style="margin: 2px" type="button" class="btn btn-success float-right">
                <a href="/admin/employees/add" style="color: white">Thêm mới</a>
            </button>
        </div>

        <thead>
        <tr>
            <th style="width: 50px">ID</th>
            <th>Tên</th>
            <th>Email</th>
            <th>Địa chỉ</th>
            <th>Chức danh</th>
            <th>Cập nhật</th>
            <th style="width: 150px">Thực hiện</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($employees as $key => $employee)
            <tr>
                <td>{{ $employee->id  }}</td>
                <td>{{ $employee->name }}</td>
                <td>{{ $employee->email }}</td>
                <td>{{ $employee->address }}</td>
                <td>{{ $employee->cd }}</td>
                <td>{{ $employee->updated_at  }}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/employees/employee_detail/{{ $employee->id }} ">
                        <i class="far fa-eye"></i>
                    </a>

                    <a class="btn btn-primary btn-sm" href="/admin/employees/edit/{{ $employee->id }} ">
                        <i class="fas fa-edit"></i>
                    </a>

                    <a href="#" class="btn btn-danger btn-sm"
                       onclick="removeRow({{ $employee->id }}, '/admin/employees/destroy')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

@section('footer')
    <script>
        $(function () {
            $("#example1").DataTable({
                "paging": true,
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["copy", "excel", "pdf", "print"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endsection
