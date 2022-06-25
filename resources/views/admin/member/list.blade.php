@extends('admin.main')

@section('content')
  <table id="example1" class="table table-bordered table-striped">
      <div>
          <button style="margin: 2px" type="button" class="btn btn-success float-right">
              <a href="/admin/members/add" style="color: white">Thêm mới</a>
          </button>
      </div>

      <thead>
            <tr>
                <th style="width: 50px">ID</th>
                <th>Tên</th>
                <th>Email</th>
                {{--<th>Địa chỉ</th>
                <th>Số điện thoại</th>
                <th>Mô tả</th>--}}
                <th>Cập nhật</th>
                <th style="width: 150px">Thực hiện</th>
            </tr>
      </thead>
      <tbody>
      @foreach ($members as $key => $member)
          <tr>
              <td>{{ $member->id  }}</td>
              <td>{{ $member->name }}</td>
              <td>{{ $member->email }}</td>
              {{--<td>{{ $member->address }}</td>
              <td>{{ $member->phone }}</td>
              <td>{{ $member->description }}</td>--}}
              <td>{{ $member->updated_at  }}</td>
              <td>
                  <a class="btn btn-primary btn-sm" href="/admin/members/member_detail/{{ $member->id }} ">
                      <i class="far fa-eye"></i>
                  </a>

                  <a class="btn btn-primary btn-sm" href="/admin/members/edit/{{ $member->id }} ">
                      <i class="fas fa-edit"></i>
                  </a>

                  <a href="#" class="btn btn-danger btn-sm"
                     onclick="removeRow({{ $member->id }}, '/admin/members/destroy')">
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
