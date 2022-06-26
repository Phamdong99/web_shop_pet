@extends('admin.main')

@section('content')
        <div  id="example1" class="table table-bordered table-striped customer mt-3 " >
            <ul>
                <li>Tên khách hàng: <strong>{{ $customer->name }}</strong></li>
                <li>Số điện thoại: <strong>{{ $customer->phone }}</strong></li>
                <li>Địa chỉ: <strong>{{ $customer->address }}</strong></li>
                <li>Email: <strong>{{ $customer->email }}</strong></li>
                <li>Ghi chú: <strong>{{ $customer->content }}</strong></li>
            </ul>
        </div>

        <div class="carts">
            <table class="table">
                <tbody>
                <tr class="table_head">
                    <th class="column-1">Ảnh</th>
                    <th class="column-2">Tên sản phẩm</th>
                    <th class="column-3">Giá</th>
                    <th class="column-4">Số lượng</th>
                    <th class="column-5">Tổng tiền</th>
                </tr>
                @foreach($carts as $key => $cart)
                    <tr>
                        @php
                        $qty = $cart->qty;
                        $price = $cart->price;
                        $price_total =  $qty * $price
                        @endphp
                        <td class="column-1">
                            <div class="how-itemcart1">
                                <img src="{{ $cart->products->thumb }}" alt="IMG" style="width: 100px">
                            </div>
                        </td>
                        <td class="column-2">{{ $cart->products->name }}</td>
                        <td class="column-3">{{ number_format($price, 0, '', '.') }}</td>
                        <td class="column-4">{{ $qty }}</td>
                        <td class="column-5">{{ number_format($price_total, 0, '', '.') }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="4" class="text-right">Tổng Tiền</td>
                    <td>{{ number_format($total, 0, '', '.')  }} VND</td>
                </tr>
                </tbody>
            </table>
        </div>

@endsection




