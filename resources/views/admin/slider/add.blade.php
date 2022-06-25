@extends('admin.main')

@section('content')
    <form action="" method="post">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Tiêu đề</label>
                        <input type="text" class="form-control" name="name" value="{{old('name')}}" >
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Đường dẫn</label>
                        <input type="url" name="url" value="{{old('url')}}" class=form-control>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="menu">Ảnh</label>
                <input type="file" class="form-control"  id="upload" >
                <div id="image_show">

                </div>
                <input type="hidden" name="file" id="file">
            </div>

            <div class="form-group">
                <label for="menu">Sắp xếp</label>
                <input type="number" class="sort_by" name="sort_by"  value="{{1}}">
            </div>

            <!-- /.card-body -->
            <div class="form-group">
                <label>Kích Hoạt</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="active" name="active" checked="">
                    <label for="active" class="custom-control-label">Có</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="no_active" name="active">
                    <label for="no_active" class="custom-control-label">Không</label>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Thêm slider</button>
            </div>
        @csrf
    </form>
@endsection
