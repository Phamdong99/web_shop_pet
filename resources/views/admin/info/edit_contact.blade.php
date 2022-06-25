@extends('admin.main')
@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection
@section('content')
    @foreach($contacts as $key => $contact)
        <form action="" method="post">
            <div class="card-body">
                <div class="form-group">
                    <label for="menu">Địa Chỉ</label>
                    <input type="text" class="form-control" name="address" value="{{ $contact->address }}" placeholder="">
                </div>

                <div class="form-group">
                    <label for="menu">Số điện thoại</label>
                    <input type="text" class="form-control" name="phone" value="{{ $contact->phone }}" placeholder="">
                </div>

                <div class="form-group">
                    <label for="menu">Email</label>
                    <input type="text" class="form-control" name="email" value="{{ $contact->email }}" placeholder="">
                </div>

                <div class="form-group">
                    <label for="menu">Facebook</label>
                    <input type="text" class="form-control" name="facebook" value="{{ $contact->facebook }}" placeholder="">
                </div>

                <div class="form-group">
                    <label for="menu">Ảnh</label>
                    <input type="file" class="form-control"  id="upload" >
                    <div id="image_show">
                        <a href="{{$contact->thumb}}">
                            <img src="{{$contact->thumb}}" width="100px">
                        </a>
                    </div>
                    <div id="image_show">

                    </div>
                    <input type="hidden" name="file" id="file">
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Sửa thông tin</button>
                </div>
            @csrf
        </form>
    @endforeach
@endsection
@section('footer')
    <script>
        CKEDITOR.replace( 'content' );
    </script>
@endsection
