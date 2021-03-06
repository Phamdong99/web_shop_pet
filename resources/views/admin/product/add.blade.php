@extends('admin.main')
@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection
@section('content')
    <form action="" method="post" enctype="multipart/form-data">
        <div class="card-body">
            <div class="form-group">
                <label for="menu">Tên sản phẩm</label>
                <input type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="Nhập tên danh mục">
            </div>

            <div class="form-group">
                <label for="menu">Mô tả</label>
                <textarea name="description" value="{{old('description')}}" class=form-control></textarea>
            </div>

            <div class="form-group">
                <label for="menu">Mô tả chi tiết</label>
                <textarea name="content" id="content" value="{{old('content')}}" class=form-control></textarea>
            </div>

            <div class="form-group">
                <label for="menu">Danh mục</label>
                <select class="form-control" name="menu_id">
                    <option value="0"> Danh mục </option>
                    @foreach($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>

            </div>

            <div class="form-group">
                <label for="menu">Giá sản phẩm</label>
                <input type="text" class="form-control" name="price"  value="{{old('price')}}" placeholder="Giá sản phẩm">
            </div>

            <div class="form-group">
                <label for="menu">Giá sản phẩm đã giảm giá</label>
                <input type="text" class="form-control" name="price_sale" value="{{old('price_sale')}}" placeholder="Giá sản phẩm đã giảm giá">
            </div>

            <div class="form-group">
                <label for="menu">Tổng số lượng</label>
                <input type="number" class="form-control" name="qty_product" value="1" placeholder="Nhập số lượng">
            </div>

            <div class="form-group">
                <label for="menu">Ảnh</label>
                <input type="file" class="form-control"  id="upload" >
                <div id="image_show">

                </div>
                <input type="hidden" name="file" id="file">
            </div>

            <div class="form-group">
                <label for="type">Loại</label>
                <select class="form-control" name="type" required>
                    <option value=""> Loại </option>
                    <option value="0"> Thú Cưng </option>
                    <option value="1"> Phụ Kiện </option>
                    <option value="2"> Dịch Vụ </option>
                </select>
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
            <button type="submit" class="btn btn-primary">Tạo sản phẩm</button>
        </div>
            @csrf
    </form>
@endsection
@section('footer')
    <script>
        CKEDITOR.replace( 'content' );
    </script>
@endsection
