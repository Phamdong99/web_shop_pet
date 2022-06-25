@extends('admin.main')
@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection
@section('content')
    <form action="" method="post">
        <div class="card-body">
            <div class="form-group">
                <label for="menu">Tên thành viên</label>
                <input type="text" class="form-control" name="name" value="{{ $member->name }}" placeholder="">
            </div>

            <div class="form-group">
                <label for="menu"> Email </label>
                <input type="email" class="form-control" name="email" value="{{ $member->email }}" placeholder="">
            </div>

            <div class="form-group">
                <label for="menu"> Password </label>
                <input type="password" class="form-control" name="password" value="{{ $member->password }}" placeholder="">
            </div>

            {{--<div class="form-group">
                <label for="menu"> Địa chỉ </label>
                <textarea type="text" class="form-control" name="address" placeholder="">{{ $member->address }}</textarea>
            </div>

            <div class="form-group">
                <label for="menu"> Số điện thoại </label>
                <input type="text" class="form-control" name="phone" value="{{ $member->phone }}" placeholder="">
            </div>


            <div class="form-group">
                <label for="menu">Mô tả</label>
                <textarea name="description" class=form-control>{{ $member->description }}</textarea>
            </div>--}}

        @csrf
    </form>
@endsection
@section('footer')
    <script>
        CKEDITOR.replace( 'content' );
    </script>
@endsection
