<footer class="bg3 p-t-75 p-b-32">
    <div class="container"  @if(Config::get('app.locale')=='ar' ) style="direction: rtl" @endif>
        <div class="row">
            <div class="col-sm-6 col-lg-3 p-b-50">
                <h4 class="stext-301 cl0 p-b-30">
                    {{__('main.departments')}}
                </h4>

                <ul>
                    @foreach($departments as $department)
                        <li class="p-b-10">
                            <a href="{{route('department_products' , $department -> id)}}" class="stext-107 cl7 hov-cl1 trans-04">
                                @if(Config::get('app.locale')=='ar' )
                                    {{$department -> name_ar}}
                                    @else
                                    {{$department -> name_en}}
                                @endif
                            </a>
                        </li>
                    @endforeach

                </ul>
            </div>

            <div class="col-sm-6 col-lg-3 p-b-50">
                <h4 class="stext-301 cl0 p-b-30">
                    {{__('main.useful_links')}}
                </h4>

                <ul>
                    <li class="p-b-10">
                        <a href="{{route('faqs')}}" class="stext-107 cl7 hov-cl1 trans-04">
                            {{__('main.help')}}
                        </a>
                    </li>

                    <li class="p-b-10">
                        <a href="{{route('contact')}}" class="stext-107 cl7 hov-cl1 trans-04">
                            {{__('main.contact_title2')}}
                        </a>
                    </li>

                    <li class="p-b-10">
                        <a href="{{route('about')}}" class="stext-107 cl7 hov-cl1 trans-04">
                            {{__('main.about')}}
                        </a>
                    </li>

                    <li class="p-b-10">
                        <a href="{{route('terms')}}" class="stext-107 cl7 hov-cl1 trans-04" target="_blank">
                            {{__('main.terms')}}
                        </a>
                    </li>
                </ul>
            </div>

            <div class="col-sm-6 col-lg-3 p-b-50">
                <h4 class="stext-301 cl0 p-b-30">
                    {{__('main.get_in_touch')}}
                </h4>

                <p class="stext-107 cl7 size-201">
                   {{__('main.address1')}}

                </p>
                <span dir="ltr" style="unicode-bidi: plaintext;">  {{__('main.phone1')}} </span>

                <div class="p-t-27">
                    <a href="https://www.facebook.com/omarco2020" class="fs-18 cl7 hov-cl1 trans-04 m-r-16" target="_blank">
                        <i class="fa fa-facebook"></i>
                    </a>

                    <a href="https://www.instagram.com/shoonah_international/" class="fs-18 cl7 hov-cl1 trans-04 m-r-16" target="_blank">
                        <i class="fa fa-instagram"></i>
                    </a>

                    <a href="https://x.com/shoonahuae" class="fs-18 cl7 hov-cl1 trans-04 m-r-16" target="_blank">
                        <i class="fa fa-twitter"></i>
                    </a>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3 p-b-50">
                <h4 class="stext-301 cl0 p-b-30">
                    {{__('main.newsletter')}}
                </h4>

                <form class="center" method="POST" action="{{ route('newsletter') }}"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="wrap-input1 w-full p-b-4">
                        <input class="input1 bg-none plh1 stext-107 cl7" type="text"
                               name="email" placeholder="email@example.com" required>
                        <div class="focus-input1 trans-04"></div>
                    </div>

                    <div class="p-t-18">
                        <button class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn2 p-lr-15 trans-04">
                            {{__('main.Subscribe')}}
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="p-t-40">


            <p class="stext-107 cl6 txt-center">

                Copyright <script>document.write(new Date().getFullYear());</script> All rights reserved | Made  by <a href="https://colorlib.com" target="_blank">NileArc</a>


            </p>
        </div>
    </div>
</footer>
