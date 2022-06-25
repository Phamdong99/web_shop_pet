@extends('admin.main')

@section('content')
  <table class="table">
      <div>
          <button style="margin: 2px" type="button" class="btn btn-success float-right">
              <a href="/admin/menus/add" style="color: white">Thêm mới</a>
          </button>
      </div>

      <thead>
            <tr>
                <th style="width: 50px">ID</th>
                <th>Tên</th>
                <th>Ảnh</th>
                <th>Trạng thái</th>
                <th>Cập nhật</th>
                <th style="width: 150px">Thực hiện</th>
            </tr>
      </thead>
      <tbody>
            {!! \App\Helpers\Helper::menu($menus) !!}
      </tbody>
  </table>
@endsection

