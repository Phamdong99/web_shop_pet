@extends('admin.main')
@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection
@section('content')
    <form action="" method="post">
        <div class="card-body">
            <div class="form-group">
                <label for="menu">Tên thành viên</label>
                <input type="text" class="form-control" name="name" value="{{ $employee->name }}" placeholder="">
            </div>

            <div class="form-group">
                <label for="menu"> Email </label>
                <input type="email" class="form-control" name="email" value="{{ $employee->email }}" placeholder="">
            </div>

            <div class="form-group">
                <label for="menu"> Password </label>
                <input type="password" class="form-control" name="password" value="{{ $employee->password }}" placeholder="">
            </div>

            <div class="form-group">
                <label for="menu"> Địa chỉ </label>
                <textarea type="text" class="form-control" name="address" placeholder="">{{ $employee->address }}</textarea>
            </div>

            <div class="form-group">
                <label for="menu"> Số điện thoại </label>
                <input type="text" class="form-control" name="phone" value="{{ $employee->phone }}" placeholder="">
            </div>


            <div class="form-group">
                <label for="menu">Mô tả</label>
                <textarea name="description" class=form-control>{{ $employee->description }}</textarea>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Sửa thông tin</button>
            </div>
        @csrf
    </form>
@endsection
@section('footer')
    <script>
        CKEDITOR.replace( 'content' );
    </script>
@endsection
