@extends('admin.main')
@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection
@section('content')
    @foreach($infos as $key => $info)
    <form action="" method="post">
        <div class="card-body">
            <div class="form-group">
                <label for="menu">Tên shop</label>
                <input type="text" class="form-control" name="name" value="{{ $info->name }}" placeholder="">
            </div>

            <div class="form-group">
                <label for="menu">Mô tả</label>
                <textarea name="description" class=form-control>{{ $info->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="menu">Nội dung</label>
                <textarea name="content" class=form-control>{{ $info->content }}</textarea>
            </div>

            <div class="form-group">
                <label for="menu">Ảnh</label>
                <input type="file" class="form-control"  id="upload" >
                <div id="image_show">
                    <a href="{{$info->thumb}}">
                        <img src="{{$info->thumb}}" width="100px">
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
