<style>
    .first-row-wrapper {
        z-index: 1030;
        background-color: white;
        border-bottom: 1px solid #dee2e6;
    }

    .navbar-spacer {
        height: 80px; /* Adjust this height based on the first row height */
    }
</style>

<nav class="navbar navbar-expand-lg navbar-light shadow-sm">
    <div class="container">

        {{-- Fixed First Row --}}
        <div class="first-row-wrapper fixed-top w-100">
            <div class="d-flex w-100 align-items-center justify-content-between flex-wrap py-2 px-3"
            style=" padding-left: 1.5rem !important;padding-right: 1.5rem !important; width: 90% !important;
    margin: auto;">

                {{-- Logo --}}
                <a class="navbar-brand me-3" href="{{ url('/') }}">
                    <img src="{{ asset('assets/img/shoonah_trans.png') }}" alt="Logo" style="width: 100px;">
                </a>

                {{-- Search form --}}
                <form action="#" method="GET" class="flex-grow-1 mx-3 position-relative" style="max-width: 600px;">
                    <div class="input-group rounded shadow-sm" style="border-radius: 25px !important; border: solid 1px #000000; padding: 8px;">
                        <input
                            id="searchInput"
                            type="search"
                            name="query"
                            class="form-control border-0"
                            placeholder="{{__('main.search_item')}}"
                            aria-label="Search"
                            autocomplete="off"
                        >
                        <button class="btn" type="submit" style="background-color: #B57E10; border-color: #B57E10; color: white; width: 80px; border-radius: 20px;">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>

                    <div id="recentSearches" class="list-group position-absolute w-100" style="top: 100%; left: 0; z-index: 1100; display: none;">
                        @if(!empty($recentSearches) && count($recentSearches) > 0)
                            @foreach($recentSearches as $search)
                                <button type="button" class="list-group-item list-group-item-action recent-search-item">{{ $search }}</button>
                            @endforeach
                        @else
                            <div class="list-group-item text-muted">No recent searches</div>
                        @endif
                    </div>
                </form>

                {{-- Become Seller --}}
                <a href="#" class="btn btn-outline-primary btn-custom me-3">
                    {{ __('main.become_seller') }}
                </a>

                {{-- Language and Account --}}
                <div class="d-flex align-items-center">
                    {{-- Language Dropdown --}}
                    <ul class="navbar-nav me-3">
                        <li class="nav-item dropdown">
                            <a
                                class="nav-link dropdown-toggle text-uppercase text-secondary d-flex align-items-center"
                                href="#"
                                id="langDropdown"
                                role="button"
                                data-bs-toggle="dropdown"
                                aria-expanded="false"
                                style="font-weight: 600;"
                            >
                                <i class="bi bi-globe me-2" style="font-size: 1.2rem;"></i>
                                {{ strtoupper(app()->getLocale()) }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="langDropdown">
                                <li>
                                    <a href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}"
                                       class="dropdown-item {{ app()->getLocale() === 'en' ? 'active' : '' }}">
                                        <img src="{{ asset('assets/img/english.png') }}" style="width: 20px; margin-right: 8px;">
                                        English
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}"
                                       class="dropdown-item {{ app()->getLocale() === 'ar' ? 'active' : '' }}">
                                        <img src="{{ asset('assets/img/arab.png') }}" style="width: 20px; margin-right: 8px;">
                                        العربية
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>

                    <a href="{{route('front')}}" class="nav-link text-secondary px-2 d-flex align-items-center" >
                        <i class="bi bi-house-door-fill me-2" style="font-size: 22px"></i>
                        <span style="font-size: 14px ; font-weight: 600;"> {{ __('main.home', ['default' => 'Login']) }} </span>
                    </a>

                    {{-- Login --}}
                    <a href="#" class="nav-link text-secondary px-2 d-flex align-items-center" >
                        <i class="bi bi-person me-2" style="font-size: 22px"></i>
                       <span style="font-size: 14px ; font-weight: 600;"> {{ __('main.login', ['default' => 'Login']) }} </span>
                    </a>

                    {{-- Cart --}}
                    <a href="#" class="nav-link position-relative text-secondary px-2" style="font-weight: 600;">
                        <i class="bi bi-cart3" style="font-size: 22px"></i>
                        <span class="badge bg-danger rounded-pill position-absolute top-0 start-100 translate-middle">
                            {{$cartCount}}
                        </span>
                    </a>
                </div>
            </div>
        </div>

        {{-- Spacer to push down content below fixed navbar --}}
        <div class="navbar-spacer"></div>

        {{-- Second Row: Menu --}}
        <div class="w-100">
            <ul class="nav justify-content-start flex-wrap gap-3 bottom-nav">
                <li class="nav-item" hidden="hidden">
                    <a href="{{ route('front') }}"
                       class="nav-link px-2 {{ Route::currentRouteName() === 'front' ? 'active' : 'text-secondary' }}"
                       style="font-weight: 600;">
                        {{ __('main.home') }}
                    </a>
                </li>

                <li class="nav-item mega-dropdown position-static">
                    <a href="#" class="nav-link text-secondary px-2" style="font-weight: 600;">
                        {{ __('main.all_categories') }}
                    </a>

                    <div class="mega-dropdown-menu">
                        <div class="row" style="width: 100%;margin: auto;">
                            <!-- Left: Departments -->
                            <div class="col-3 border-end departments-list p-3">
                                <ul class="list-unstyled m-0">
                                    @foreach($departments as $department)
                                        <li class="department-item">
                                            <a href="#" class="text-decoration-none text-dark d-block py-2 px-2">
                                                {{ app()->getLocale() === 'ar' ? $department->name_ar : $department->name_en }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <!-- Right: Categories -->
                            <div class="col-9 categories-grid p-3">
                                @foreach($departments as $department)
                                    <div class="department-categories" data-department-id="{{ $department->id }}">
                                        <h5 class="mb-3">
                                            {{ app()->getLocale() === 'ar' ? $department->name_ar : $department->name_en }}
                                        </h5>
                                        <div class="row row-cols-2 row-cols-md-6 g-4">

                                        @foreach($department->categories as $category)
                                                <div class="col text-center">
                                                    <a href="#" class="category-link text-decoration-none text-secondary d-block">
                                                        <img
                                                            src="{{ asset('images/categories/' . $category->icon) }}"
                                                            alt="{{ app()->getLocale() === 'ar' ? $category->name_ar : $category->name_en }}"
                                                            class="img-fluid mb-2"
                                                            style="width: 60px; height: 60px; object-fit: contain;"
                                                        >
                                                        <div>
                                                            {{ app()->getLocale() === 'ar' ? $category->name_ar : $category->name_en }}
                                                        </div>
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </li>


                <li class="nav-item">
                    <a href="{{ route('front_news') }}"
                       class="nav-link px-2 {{ Route::currentRouteName() === 'front_news' ? 'active' : 'text-secondary' }}"
                       style="font-weight: 600;">
                        {{ __('main.news', ['default' => 'Shoonah Academy']) }}
                    </a>
                </li>

                <li class="nav-item" hidden="hidden">
                    <a href="{{ route('about') }}"
                       class="nav-link px-2 {{ Route::currentRouteName() === 'about' ? 'active' : 'text-secondary' }}"
                       style="font-weight: 600;">
                        {{ __('main.about', ['default' => 'About Us']) }}
                    </a>
                </li>

                <li class="nav-item" hidden="hidden">
                    <a href="{{ route('faqs') }}"
                       class="nav-link px-2 {{ Route::currentRouteName() === 'faqs' ? 'active' : 'text-secondary' }}"
                       style="font-weight: 600;">
                        {{ __('main.help', ['default' => 'Help & FAQ']) }}
                    </a>
                </li>

                <li class="nav-item" hidden="hidden">
                    <a href="{{ route('contact') }}"
                       class="nav-link px-2 {{ Route::currentRouteName() === 'contact' ? 'active' : 'text-secondary' }}"
                       style="font-weight: 600;">
                        {{ __('main.contact', ['default' => 'Contact Us']) }}
                    </a>
                </li>

                <li class="nav-item" hidden="hidden">
                    <a href="{{ route('terms') }}"
                       class="nav-link px-2 {{ Route::currentRouteName() === 'terms' ? 'active' : 'text-secondary' }}"
                       style="font-weight: 600;">
                        {{ __('main.privacy', ['default' => 'Privacy Policy']) }}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script>
    const megaDropdown = document.querySelector('.mega-dropdown');
    const megaMenu = document.querySelector('.mega-dropdown-menu');

    const navbarTop = document.querySelector('.first-row-wrapper');
    const bottomNav = document.querySelector('.bottom-nav');

    function updateMegaMenuTop(fromScroll = false) {
        const navHeight = navbarTop.offsetHeight;
        const bottomNavHeight = fromScroll ? 0 : ((bottomNav?.offsetHeight || 0) + 20);
        console.log("Bottom Nav Height:", bottomNavHeight);

        megaMenu.style.top = (navHeight + bottomNavHeight) + 'px';
    }

    function showMegaMenu() {
        updateMegaMenuTop();
        megaMenu.style.display = 'block';
    }

    function hideMegaMenu() {
        megaMenu.style.display = 'none';
    }

    megaDropdown.addEventListener('mouseenter', showMegaMenu);
    megaDropdown.addEventListener('mouseleave', () => {
        setTimeout(() => {
            if (!megaDropdown.matches(':hover') && !megaMenu.matches(':hover')) {
                hideMegaMenu();
            }
        }, 100);
    });

    megaMenu.addEventListener('mouseenter', showMegaMenu);
    megaMenu.addEventListener('mouseleave', () => {
        setTimeout(() => {
            if (!megaDropdown.matches(':hover') && !megaMenu.matches(':hover')) {
                hideMegaMenu();
            }
        }, 100);
    });




    // Recalculate on scroll/resize
    window.addEventListener('scroll', () => updateMegaMenuTop(true));
    window.addEventListener('resize', updateMegaMenuTop);


</script>


