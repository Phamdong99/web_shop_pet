@extends('admin.main')

@section('content')
    <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th style="width: 50px">ID</th>
            <th>Ảnh</th>
            <th>Tên sản phẩm</th>
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
                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/reviews/view/{{ $product->id }} ">
                        <i class="far fa-eye"></i>
                    </a>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{--{!! $carts->links() !!}--}}

@endsection


@section('footer')
    <script>
        $(function () {
            $("#example1").DataTable({
                "paging": true,
                "responsive": true, "lengthChange": false, "autoWidth": false,
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
