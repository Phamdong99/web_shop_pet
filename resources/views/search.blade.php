@extends('main')

@section('content')
    <div class="p-t-120">
        <section class="bg0 p-t-23 p-b-140">
            <div class="container">
                <div class="p-b-10">
                    <h3 class="ltext-103 cl5">
                        Danh sách sản phẩm
                    </h3>
                </div>
                <div id="loadProduct">
                    <div class="row isotope-grid p-t-50">
                        @foreach($products as $key => $product)
                            @if($product->type != 2)
                                <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                                    <!-- Block2 -->
                                    <div class="block2">
                                        <div class="block2-pic hov-img0">
                                            <img src="{{$product->thumb}}" alt="IMG-PRODUCT">

                                            {{-- <a href="{{$product->id}}" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                                 Quick View
                                             </a>--}}

                                        </div>

                                        <div class="block2-txt flex-w flex-t p-t-14">
                                            <div class="block2-txt-child1 flex-col-l ">
                                                <a href="/san-pham/{{ $product->id }}-{{ \Str::slug($product->name, '-') }}.html"
                                                   class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                                    {{$product->name}}
                                                </a>
                                                <span class="stext-105 cl3">
									            {!!\App\Helpers\Helper::price($product->price, $product->price_sale)!!}
								                </span>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <!-- Load more -->
                {{--<div class="flex-c-m flex-w w-full p-t-45" id="button-loadMore">
                    <input type="hidden" value="1" id="page">
                    <a onclick="loadMore()" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
                        Load More
                    </a>
                </div>--}}
            </div>
        </section>
    </div>
@endsection
