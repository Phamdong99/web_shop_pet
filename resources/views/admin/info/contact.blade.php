@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th>Địa chỉ</th>
            <th>Số ĐT</th>
            <th>Email</th>
            <th>Facebook</th>
            <th>thumb</th>
            <th>Cập nhật</th>
            <th style="width: 150px">Thực hiện</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($contacts as $key => $contact)
            <tr>
                <td>{{ $contact->address }}</td>
                <td>{{ $contact->phone }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->facebook }}</td>
                <td><img src="{{ $contact->thumb }}" alt="" width="60px"></td>
                <td>{{ $contact->updated_at  }}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/contacts/edit/{{ $contact->id }} ">
                        <i class="fas fa-edit"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
