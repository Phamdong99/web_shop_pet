@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th>Tên</th>
            <th>Mô tả</th>
            <th>Nội dung</th>
            <th>Ảnh</th>
            <th>Cập nhật</th>
            <th style="width: 150px">Thực hiện</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($infos as $key => $info)
            <tr>
                <td>{{ $info->name }}</td>
                <td>{{ $info->content }}</td>
                <td>{{ $info->description }}</td>
                <td><img src="{{ $info->thumb }}" alt="" width="60px"></td>
                <td>{{ $info->updated_at  }}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/infos/edit/{{ $info->id }} ">
                        <i class="fas fa-edit"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

