@extends('admin.main')

@section('content')
    <div  id="example1" class="table table-bordered table-striped customer mt-3 " >
        <ul>
            <li>Ảnh: <strong><img src="{{ $product->thumb }}" alt="" width="60px"></strong></li>
            <li>Sản Phẩm được đánh giá: <strong>{{ $product->name }}</strong></li>
        </ul>
    </div>
@if(count($reviews) != 0)
    <div class="carts">
        <table class="table">
            <tbody>
            <tr class="table_head">
                <th class="column-0">#</th>
                <th class="column-1">Tên người đánh giá</th>
                <th class="column-2">Email</th>
                <th class="column-3">Nội dung đánh giá</th>
                <th class="column-3">Trạng thái</th>
            </tr>

            @foreach($reviews as $key => $review)
                <tr>
                    <td class="column-0">{{ $review->id }}</td>
                    <td class="column-1">{{ $review->name }}</td>
                    <td class="column-2">{{ $review->email }}</td>
                    <td class="column-3">{{ $review->content }}</td>
                    <td>
                        <select name="active" class="active" data-review="{{$review->id}}">
                            <option value="0" {{$review->active == 0 ? 'selected' : ''}}>Đang hiển thị</option>
                            <option value="1" {{$review->active == 1 ? 'selected' : ''}}>Đóng</option>
                        </select>
                    </td>
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
@endsection
@section('footer')
    <script>
        $(document).ready(function () {
            $(".active").on('change', function (e) {
                let active = e.target.value;
                let review_id = e.target.getAttribute("data-review");

                // update active review

                $.ajax({
                    type: 'POST',
                    data: { active, review_id },
                    url: '{{route('admin.review.update')}}',
                    success: function (result)
                    {
                        if(result.error === false){
                            alert(result.message);
                            location.reload();
                        }
                        else
                        {
                            alert('Cập nhật đánh giá không thành công. Vui lòng thử lại');
                        }
                    }
                })
            })
        })
    </script>
@endsection


