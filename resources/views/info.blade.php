@extends('main')

@section('content')

@foreach($infos as $key => $info)
    <div class="p-t-105">
        <section class="bg-img1 txt-center p-lr-15 p-tb-200"
                 style="background-image: url('template/images/slider1.jpg');">
        </section>
        <section class="bg0 p-t-75 p-b-120">
            <div class="container">
                <div class="row p-b-148">
                    <div class="col-md-7 col-lg-8">
                        <div class="p-t-7 p-r-85 p-r-15-lg p-r-0-md">
                            <h3 class="mtext-111 cl2 p-b-16">
                                Mô tả
                            </h3>
                            <p class="stext-113 cl6 p-b-26">
                                {{ $info->description }}
                            </p>
                        </div>
                    </div>

                    <div class="col-11 col-md-5 col-lg-4 m-lr-auto">
                        <div class="how-bor1 ">
                            <div class="hov-img0">
                                <img src="{{ $info->thumb }}" alt="IMG">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="order-md-2 col-md-7 col-lg-8 p-b-30">
                        <div class="p-t-7 p-l-85 p-l-15-lg p-l-0-md">
                            <h3 class="mtext-111 cl2 p-b-16">
                                Nội dung
                            </h3>

                            <p class="stext-113 cl6 p-b-26">
                                {{ $info->content }}
                            </p>

                        </div>
                    </div>

                    <div class="order-md-1 col-11 col-md-5 col-lg-4 m-lr-auto p-b-30">
                        <div class="how-bor2">
                            <div class="hov-img0">
                                <img src="{{ $info->thumb }}" alt="IMG">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endforeach
@endsection
