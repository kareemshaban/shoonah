<section class="bg0 p-t-23 p-b-140">
    <div class="container" @if(Config::get('app.locale') == 'ar') style="direction: rtl" @endif>
        <div class="p-b-10">
            <h3 class="ltext-103 cl5">
                @if($slag == 0)
                {{__('main.products_overview')}}
                @elseif($slag == 1)
                    {{__('main.top_products')}}
                @elseif($slag == 2)
                    {{__('main.products_overview')}}  <sapn style="color: #B57E10">
                        @if(Config::get('app.locale') == 'ar')
                            ({{$department->name_ar}})
                        @else
                            ({{$department->name_en}})
                        @endif
                    </sapn>
                @elseif($slag == 3)
                    {{__('main.products_overview')}}  <sapn style="color: #B57E10">
                        @if(Config::get('app.locale') == 'ar')
                            ({{$department->name_ar}}  | {{$category->name_ar}} )
                        @else
                            ({{$department->name_en}} | {{$category->name_en}})
                        @endif
                    </sapn>
                @elseif($slag == 4)

                    {{__('main.search_results')}}

                @elseif($slag == 5)

                    {{__('main.wish_list')}}


                @elseif($slag == 6)

                    {{__('main.products')}}
                @endif

            </h3>
        </div>

        @if($slag != 3)
            <div class="flex-w flex-sb-m p-b-52">
                <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
                        {{__('main.all')}}
                    </button>
                    @foreach($categories as $category)
                        <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".{{$category -> id}}">
                            @if(Config::get('app.locale') == 'ar')
                                {{$category->name_ar}}
                            @else
                                {{$category->name_en}}
                            @endif
                        </button>


                    @endforeach
                </div>

                <div class="flex-w flex-c-m m-tb-10" @if(Config::get('app.locale') == 'ar') style="direction: ltr" @endif>
                    <div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter" hidden="hidden">
                        <i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
                        <i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                        {{__('main.filter')}}
                    </div>

                    <div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search" @if(Config::get('app.locale') == 'ar') style="direction: ltr" @endif>
                        <i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
                        <i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                        {{__('main.searchbtn')}}
                    </div>
                </div>

                <!-- Search product -->
                <div class="dis-none panel-search w-full p-t-10 p-b-15">
                    <div class="bor8 dis-flex p-l-15">
                        <button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
                            <i class="zmdi zmdi-search"></i>
                        </button>

                        <input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product" placeholder="{{__('main.search')}}">
                    </div>
                </div>

                <!-- Filter -->
                <div class="dis-none panel-filter w-full p-t-10">
                    <div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
                        <div class="filter-col1 p-r-15 p-b-27">
                            <div class="mtext-102 cl2 p-b-15">
                                Sort By
                            </div>

                            <ul>
                                <li class="p-b-6">
                                    <a href="#" class="filter-link stext-106 trans-04">
                                        Default
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a href="#" class="filter-link stext-106 trans-04">
                                        Popularity
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a href="#" class="filter-link stext-106 trans-04">
                                        Average rating
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a href="#" class="filter-link stext-106 trans-04 filter-link-active">
                                        Newness
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a href="#" class="filter-link stext-106 trans-04">
                                        Price: Low to High
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a href="#" class="filter-link stext-106 trans-04">
                                        Price: High to Low
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="filter-col2 p-r-15 p-b-27">
                            <div class="mtext-102 cl2 p-b-15">
                                Price
                            </div>

                            <ul>
                                <li class="p-b-6">
                                    <a href="#" class="filter-link stext-106 trans-04 filter-link-active">
                                        All
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a href="#" class="filter-link stext-106 trans-04">
                                        $0.00 - $50.00
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a href="#" class="filter-link stext-106 trans-04">
                                        $50.00 - $100.00
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a href="#" class="filter-link stext-106 trans-04">
                                        $100.00 - $150.00
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a href="#" class="filter-link stext-106 trans-04">
                                        $150.00 - $200.00
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a href="#" class="filter-link stext-106 trans-04">
                                        $200.00+
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="filter-col3 p-r-15 p-b-27">
                            <div class="mtext-102 cl2 p-b-15">
                                Color
                            </div>

                            <ul>
                                <li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #222;">
										<i class="zmdi zmdi-circle"></i>
									</span>

                                    <a href="#" class="filter-link stext-106 trans-04">
                                        Black
                                    </a>
                                </li>

                                <li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #4272d7;">
										<i class="zmdi zmdi-circle"></i>
									</span>

                                    <a href="#" class="filter-link stext-106 trans-04 filter-link-active">
                                        Blue
                                    </a>
                                </li>

                                <li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #b3b3b3;">
										<i class="zmdi zmdi-circle"></i>
									</span>

                                    <a href="#" class="filter-link stext-106 trans-04">
                                        Grey
                                    </a>
                                </li>

                                <li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #00ad5f;">
										<i class="zmdi zmdi-circle"></i>
									</span>

                                    <a href="#" class="filter-link stext-106 trans-04">
                                        Green
                                    </a>
                                </li>

                                <li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #fa4251;">
										<i class="zmdi zmdi-circle"></i>
									</span>

                                    <a href="#" class="filter-link stext-106 trans-04">
                                        Red
                                    </a>
                                </li>

                                <li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #aaa;">
										<i class="zmdi zmdi-circle-o"></i>
									</span>

                                    <a href="#" class="filter-link stext-106 trans-04">
                                        White
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="filter-col4 p-b-27">
                            <div class="mtext-102 cl2 p-b-15">
                                Tags
                            </div>

                            <div class="flex-w p-t-4 m-r--5">
                                <a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                    Fashion
                                </a>

                                <a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                    Lifestyle
                                </a>

                                <a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                    Denim
                                </a>

                                <a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                    Streetstyle
                                </a>

                                <a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                    Crafts
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif


        <div class="row isotope-grid">
            @foreach($products as $product)
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item {{$product -> category_id}}">
                    <!-- Block2 -->
                    <div class="block2">
                        <div class="block2-pic hov-img0">
                            <img src="{{asset('/images/products' . '/'  . $product -> mainImg)}}"
                                 alt="IMG-PRODUCT" width="200px"  height="200px" style="object-fit: cover">

                            <a href="{{route('product-view' , $product -> id)}}" target="_blank"
                               class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 "
                               data-product-id="{{ $product->id }}">
                                {{ __('main.product_view') }}
                            </a>

                        </div>

                        <div class="block2-txt flex-w flex-t p-t-14">
                            <div class="block2-txt-child1 flex-col-l ">
                                <a href="{{route('product-view' , $product -> id)}}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                    @if(Config::get('app.locale') == 'ar')
                                        {{$product->name_ar}}
                                    @else
                                        {{$product->name_en}}
                                    @endif
                                </a>

                                <span class="stext-105 cl3">
                            @if(Config::get('app.locale') == 'ar')
                                        {{$product->department_ar}} | {{$product->category_ar}} | {{$product->brand_ar}}
                                    @else
                                        {{$product->department_en}} | {{$product->category_en}} | {{$product->brand_en}}
                                    @endif
                            </span>
                            </div>
                            @if($slag != 5)
                            <div class="block2-txt-child2 flex-r p-t-3">

                                    @if(in_array($product->id, array_column(session()->get('wishlist', []), 'id')))
                                        <i class="fa fa-heart remove_from_wish_list " data-product-id="{{ $product->id }}" ></i>
                                    @else
                                        <i class="fa fa-heart-o add_to_wish_list" data-product-id="{{ $product->id }}"></i>
                                    @endif

                            </div>
                            @endif
                        </div>
                    </div>
                </div>

            @endforeach
        </div>

          <input type="hidden" id="lang" name="lang" value="{{Config::get('app.locale')}}" />
        @if($slag == 0)
            <!-- Load more -->
            <div class="flex-c-m flex-w w-full p-t-45">
                <a href="{{route('all_products')}}" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
                    {{__('main.load_more')}}
                </a>
            </div>

        @endif

    </div>
    <script>
        $(document).on('click', '.add_to_wish_list', function() {
            var productId = $(this).data('product-id');
            var button = $(this);

            $.ajax({
                url: '/add_to_wishlist' + '/' + productId,
                type: 'GET',
                success: function(response) {

                    $('#wishlist-count').attr('data-notify', response.wishlistCount);


                    button[0].classList.replace('fa-heart-o', 'fa-heart');
                    button[0].classList.replace('add_to_wish_list', 'remove_from_wish_list');
                },
                error: function(response) {
                   // alert(response.responseJSON.message);
                }
            });
        });

        $(document).on('click', '.remove_from_wish_list', function() {
            var productId = $(this).data('product-id');
            var button = $(this);

            $.ajax({
                url: '/remove_from_wishlist' + '/' + productId,
                type: 'GET',
                success: function(response) {
                    $('#wishlist-count').attr('data-notify', response.wishlistCount);
                    button[0].classList.replace('fa-heart', 'fa-heart-o');
                    button[0].classList.replace('remove_from_wish_list', 'add_to_wish_list');
                },
                error: function(response) {
                    alert(response.responseJSON.message);
                }
            });
        });

    </script>
</section>

<script>
    $('.js-show-modal1').on('click',function(e){
        e.preventDefault();
        var productId = $(this).data('product-id');
        $.ajax({
            url: '/product-view/' + productId,
            method: 'GET',
            success: function(data) {
                $('.js-modal1').addClass('show-modal1');

                console.log('Product:', data); // `data` is your product JSON
                var lang = $('#lang').val();

                $('#modal-product-name').text(lang == 'ar' ?  data.name_ar : data.name_en);
                $('#modal-product-details').text(lang == 'ar' ?  data.short_description_ar : data.short_description_en);

                var mainImg =  '/../images/products/' + data.mainImg ;
                var main_img = $('#main_img');
                var main_img_thumb = $("#main_img_thumb");
                var main_img_a = $('#main_img_a');
                main_img.attr('src', mainImg);
                main_img_a.attr('href', mainImg);
                main_img_thumb.attr('data-thumb', mainImg);

                if(data.img1 != "") {
                    var Img1 = '/../images/products/' + data.img1;
                    var img1 = $('#img1');
                    var img1_thumb = $("#img1_thumb");
                    var img1_a = $('#img1_a');
                    img1.attr('src', Img1);
                    img1_a.attr('href', Img1);
                    img1_thumb.attr('data-thumb', Img1);
                } else {
                    $('#img1_thumb').remove();
                }

                if(data.img2 != "") {
                    var Img2 = '/../images/products/' + data.img2;
                    var img2 = $('#img2');
                    var img2_thumb = $("#img2_thumb");
                    var img2_a = $('#img2_a');
                    img2.attr('src', Img2);
                    img2_a.attr('href', Img2);
                    img2_thumb.attr('data-thumb', Img2);
                } else {
                    $('#img2_thumb').remove();
                }


                if(data.img3 != "") {
                    var Img3 = '/../images/products/' + data.img3;
                    var img3 = $('#img3');
                    var img3_thumb = $("#img3_thumb");
                    var img3_a = $('#img3_a');
                    img3.attr('src', Img3);
                    img3_a.attr('href', Img3);
                    img3_thumb.attr('data-thumb', Img3);
                } else {
                    $('#img3_thumb').remove();
                }

                $('.wrap-slick3').each(function() {
                    var $slider = $(this).find('.slick3');

                    // Skip if no slick container or no slides
                    if ($slider.length === 0 || $slider.children().length === 0) return;

                    // Destroy if already initialized
                    if ($slider.hasClass('slick-initialized')) {
                        $slider.slick('unslick');
                    }

                    $slider.slick({
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        fade: true,
                        infinite: true,
                        autoplay: false,
                        autoplaySpeed: 6000,

                        arrows: true,
                        appendArrows: $(this).find('.wrap-slick3-arrows'),
                        prevArrow:'<button class="arrow-slick3 prev-slick3"><i class="fa fa-angle-left" aria-hidden="true"></i></button>',
                        nextArrow:'<button class="arrow-slick3 next-slick3"><i class="fa fa-angle-right" aria-hidden="true"></i></button>',

                        dots: true,
                        appendDots: $(this).find('.wrap-slick3-dots'),
                        dotsClass:'slick3-dots',
                        customPaging: function(slick, index) {
                            var portrait = $(slick.$slides[index]).data('thumb');
                            return '<img src="' + portrait + '"/><div class="slick3-dot-overlay"></div>';
                        },
                    });
                });


            }
        });




    });
</script>


<script>
    $(document).ready(function() {
        // Cache the product items for better performance
        const $productItems = $('.isotope-item');
        const $searchInput = $('input[name="search-product"]');

        // Search function
        function filterProducts(searchTerm) {
            searchTerm = searchTerm.toLowerCase().trim();

            $productItems.each(function() {
                const $item = $(this);
                // Get all text content from the product card in lowercase
                const productText = $item.text().toLowerCase();

                // Show/hide based on search term match
                if (productText.includes(searchTerm)) {
                    $item.show();
                } else {
                    $item.hide();
                }
            });
        }

        // Keyup event with debounce to improve performance
        let searchTimer;
        $searchInput.on('keyup', function() {
            clearTimeout(searchTimer);
            searchTimer = setTimeout(() => {
                filterProducts($(this).val());
            }, 300); // 300ms delay after typing stops
        });

        // Clear search when clicking the search icon
        $('.panel-search button').on('click', function() {
            $searchInput.val('').trigger('keyup');
        });
    });
</script>
