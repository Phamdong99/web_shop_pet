@extends('admin.main')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row" style="margin-top: 10px">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $total_cart_of_month }}</h3>

                            <p>Tổng số đơn hàng</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ number_format($total_of_month, 0, '', '.') }}<sup style="font-size: 20px"> VND</sup></h3>

                            <p>Danh số</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ count($members) }}</h3>

                            <p>Tổng số thành viên</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ count($product) }}</h3>

                            <p>Số lượng sản phẩm đang bán</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <div class="row">
                <div style="width: 98%" class="text-center">
                    <div ><h3>Danh sách đơn hàng mới nhất</h3></div>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên khách hàng</th>
                            <th>Số điện thoại</th>
                            <th>Email</th>
                            <th>Ngày đặt hàng</th>
                            <th>Tổng tiền</th>
                        </tr>
                        </thead>
                        <tbody>
                        {{-- {!! \App\Helpers\Product::product($products) !!}--}}
                        @foreach ($carts as $key => $cart)
                            @if(isset($cart->carts[0]))
                                <tr>
                                    <td>{{ $cart->carts[0]->id }}</td>
                                    <td>{{ $cart->name }}</td>
                                    <td>{{ $cart->phone }}</td>
                                    <td>{{ $cart->email }}</td>
                                    <td>{{ $cart->created_at  }}</td>
                                    <td>{{ number_format($cart->carts[0]->total)  }} VND</td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div style="width: 98% ">
                    <div class="text-center"><h4>Một số đánh giá mới nhất của khách hàng</h4></div>
                    @if(count($reviews) != 0)
                        <div class="carts">
                            <table class="table">
                                <tbody>
                                <tr class="table_head">
                                    <th class="column-0">Sản phẩm</th>
                                    <th class="column-1">Tên người đánh giá</th>
                                    <th class="column-2">Email</th>
                                    <th class="column-3">Nội dung đánh giá</th>
                                </tr>

                                @foreach($reviews as $key => $review)
                                    <tr>
                                        <td class="column-0">{{ $review->product_id }}</td>
                                        <td class="column-1">{{ $review->name }}</td>
                                        <td class="column-2">{{ $review->email }}</td>
                                        <td class="column-3">{{ $review->content }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center">
                            <h3>Không có đánh giá nào cho sản phẩm</h3>
                        </div>
                    @endif
                </div>
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
