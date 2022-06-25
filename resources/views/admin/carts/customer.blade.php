@extends('admin.main')

@section('content')
    <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th style="width: 50px">ID</th>
            <th>Tên khách hàng</th>
            <th>Số điện thoại</th>
            <th>Email</th>
            <th>Ngày đặt hàng</th>
            <th>Tổng tiền</th>
            <th>Trạng Thái</th>
            <th style="width: 150px">Thực hiện</th>
        </tr>
        </thead>
        <tbody>
        {{-- {!! \App\Helpers\Product::product($products) !!}--}}
        @foreach ($carts as $key => $cart)
            <tr>
                <td>{{ $cart->carts[0]->id  }}</td>
                <td>{{ $cart->name }}</td>
                <td>{{ $cart->phone }}</td>
                <td>{{ $cart->email }}</td>
                <td>{{ $cart->created_at  }}</td>
                <td>{{ number_format($cart->carts[0]->total)  }} VND</td>
                <td>
                    <select name="active" id="active" data-cart="{{$cart->carts[0]->id}}">
                        <option value="0" {{$cart->carts[0]->active == 0 ? 'selected' : ''}}>Chưa thanh toán</option>
                        <option value="1" {{$cart->carts[0]->active == 1 ? 'selected' : ''}}>Đã chuyển cọc</option>
                        <option value="2" {{$cart->carts[0]->active == 2 ? 'selected' : ''}}>Đã thanh toán</option>
                    </select>
                </td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/carts/view/{{ $cart->carts[0]->id }} ">
                        <i class="far fa-eye"></i>
                    </a>

                    <a href="#" class="btn btn-danger btn-sm"
                       onclick="removeRow({{ $cart->carts[0]->id }}, '/admin/carts/destroy')">
                        <i class="fas fa-trash"></i>
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

    <script>
        $(document).ready(function () {
            $("#active").on('change', function (e) {
                let active = e.target.value;
                let cart_id = e.target.getAttribute("data-cart");

                // update active cart

                $.ajax({
                    type: 'POST',
                    data: { active, cart_id },
                    url: '{{route('admin.cart.update')}}',
                    success: function (result)
                    {
                        if(result.error === false){
                            alert(result.message);
                            location.reload();
                        }
                        else
                        {
                            alert('Cập nhật đơn hàng không thành công. Vui lòng thử lại');
                        }
                    }
                })
            })
        })
    </script>
@endsection
