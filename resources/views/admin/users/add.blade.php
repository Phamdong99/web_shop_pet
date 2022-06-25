@extends('admin.main')
@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection
@section('content')
    <form action="" method="post">
        <div class="card-body">
            <div class="form-group">
                <label for="menu">Tên nhân viên</label>
                <input type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="">
            </div>

            <div class="form-group">
                <label for="menu"> Email </label>
                <input type="email" class="form-control" name="email" value="{{old('email')}}" placeholder="">
            </div>

            <div class="form-group">
                <label for="menu"> Password </label>
                <input type="password" class="form-control" name="password" value="{{old('password')}}" placeholder="">
            </div>

            <div class="form-group">
                <label for="menu"> Địa chỉ </label>
                <textarea type="text" class="form-control" name="address" value="{{old('address')}}" placeholder=""></textarea>
            </div>

            <div class="form-group">
                <label for="menu"> Số điện thoại </label>
                <input type="text" class="form-control" name="phone" value="{{old('phone')}}" placeholder="">
            </div>


            <div class="form-group">
                <label for="menu">Mô tả</label>
                <textarea name="description" value="{{old('description')}}" class=form-control></textarea>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Tạo mới</button>
            </div>
        @csrf
    </form>
@endsection
@section('footer')
    <script>
        CKEDITOR.replace( 'content' );
    </script>
@endsection
