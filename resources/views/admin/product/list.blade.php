@extends('admin.main')

@section('content')

    <table id="example1" class="table table-bordered table-striped">
      <div>
          <button style="margin: 2px" type="button" class="btn btn-success float-right">
              <a href="/admin/products/add" style="color: white">Thêm mới</a>
          </button>
        {{--<div class="search-container">
              <form action="">
                  <input placeholder="Search.." name="search">
                  <button type="submit"  class="btn-primary">
                      <i class="fa fa-search"></i>
                  </button>
              </form>
          </div>--}}
      </div>

      <thead>
            <tr>
                <th style="width: 50px">ID</th>
                <th>Ảnh</th>
                <th>Tên sản phẩm</th>
                <th>Danh mục</th>
                <th>Trạng thái</th>
                <th>Ngày cập nhật</th>
                <th>Giá</th>
                <th>Giá giảm giá</th>
                <th style="width: 150px">Thực hiện</th>
            </tr>
      </thead>
      <tbody>
           {{-- {!! \App\Helpers\Product::product($products) !!}--}}
           @foreach ($products as $key => $product)
           <tr>
               <td>{{ $product->id  }}</td>
               <td><img src="{{ $product->thumb }}" alt="" width="60px"></td>
               <td>{{ $product->name }}</td>
               <td>{{ $product->menu->name }}</td>
               <td>{!! \App\Helpers\Helper::active($product->active) !!}</td>
               <td>{{ $product->updated_at  }}</td>
               <td>{{ $product->price }}</td>
               <td>{{ $product->price_sale }}</td>
               <td>
                   <a class="btn btn-primary btn-sm" href="/admin/products/product_detail/{{ $product->id }} ">
                       <i class="far fa-eye"></i>
                   </a>

                   <a class="btn btn-primary btn-sm" href="/admin/products/edit/{{ $product->id }} ">
                       <i class="fas fa-edit"></i>
                   </a>

                   <a href="#" class="btn btn-danger btn-sm"
                      onclick="removeProduct({{ $product->id }}, '/admin/products/destroy')">
                       <i class="fas fa-trash"></i>
                   </a>
               </td>
           </tr>
           @endforeach
      </tbody>
  </table>

{{--    {!! $products->links() !!}--}}

@endsection
@section('footer')
    <script>
        $(function () {
            $("#example1").DataTable({
                "paging": true,
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "pageLength": 50,
                "buttons": ["copy", "excel", "pdf", "print"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endsection
