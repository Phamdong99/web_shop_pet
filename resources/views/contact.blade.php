@extends('main')

@section('content')
    <div class="p-t-80">
        <section class="bg-img1 txt-center p-lr-15 p-tb-200" style="background-image: url('template/images/slider1.jpg');">
            <h2 class="ltext-105 cl0 txt-center">
                Liên Hệ
            </h2>
        </section>
    </div>
@foreach($contacts as $key => $contact)
    <section class="bg0 p-t-104 p-b-116">
        <div class="container">
            <div class="flex-w flex-tr">
                <div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
                  {{--  <form>
                        <h4 class="mtext-105 cl2 txt-center p-b-30">
                            Send Us A Message
                        </h4>

                        <div class="bor8 m-b-20 how-pos4-parent">
                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="email" placeholder="Your Email Address">
                            <img class="how-pos4 pointer-none" src="template/images/icons/icon-email.png" alt="ICON">
                        </div>

                        <div class="bor8 m-b-30">
                            <textarea class="stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25" name="msg" placeholder="How Can We Help?"></textarea>
                        </div>

                        <button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
                            Submit
                        </button>
                    </form>--}}
                        <img src="{{ $contact->thumb }}" alt="IMG" style="width: 400px">

                </div>

                <div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
                    <div class="flex-w w-full p-b-42">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-map-marker"></span>
						</span>

                        <div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Địa Chỉ
							</span>

                            <p class="stext-115 cl6 size-213 p-t-18">
                                {{ $contact->address }}
                            </p>
                        </div>
                    </div>

                    <div class="flex-w w-full p-b-42">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-phone-handset"></span>
						</span>

                        <div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Số Điện Thoại
							</span>

                            <p class="stext-115 cl1 size-213 p-t-18">
                                + {{ $contact->phone }}
                            </p>
                        </div>
                    </div>

                    <div class="flex-w w-full">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-envelope"></span>
						</span>

                        <div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Email
							</span>

                            <p class="stext-115 cl1 size-213 p-t-18">
                                {{ $contact->email }}
                            </p>
                        </div>
                    </div>
                    <br>
                    <div class="flex-w w-full">
						<span class="fs-18 cl5 txt-center size-211">
							<i class="fad fa-facebook"></i>
						</span>

                        <div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Facebook
							</span>

                            <p class="stext-115 cl1 size-213 p-t-18">
                                {{ $contact->facebook }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endforeach
    <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.7177027374782!2d105.83991261440697!3d21.00395019400191!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac775d1a29b1%3A0x47ca351d075745a6!2zNTUgR2nhuqNpIFBow7NuZywgxJDhu5NuZyBUw6JtLCDEkOG7kW5nIMSQYSwgSMOgIE7hu5lpLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1654877737365!5m2!1svi!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

@endsection
