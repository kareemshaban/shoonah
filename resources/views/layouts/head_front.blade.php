<head>
    <title>Shoonah Store</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/front/images/icons/fav/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets/front/images/icons/fav/favicon-32x32.png')}}/">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/front/images/icons/fav/favicon-16x16.png')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/vendor/bootstrap/css/bootstrap.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/fonts/iconic/css/material-design-iconic-font.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/fonts/linearicons-v1.0.0/icon-font.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/vendor/animate/animate.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/vendor/css-hamburgers/hamburgers.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/vendor/animsition/css/animsition.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/vendor/select2/select2.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/vendor/daterangepicker/daterangepicker.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/vendor/slick/slick.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/vendor/MagnificPopup/magnific-popup.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/vendor/perfect-scrollbar/perfect-scrollbar.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/css/main.css')}}">
    <!--===============================================================================================-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <style>
        @font-face {
            font-family: 'icomoon';
            src: url("{{asset('assets/fonts/ArbFONTS-The-Sans-Plain.otf')}}");
            src: url("{{asset('assets/fonts/ArbFONTS-The-Sans-Plain.otf')}}");
            font-weight: normal;
            font-style: normal;
        }

        *:not(.zmdi , .fa) {
            font-family: 'icomoon' !important;
        }


        .navbar .nav-link {
            color: #555;
            transition: color 0.3s ease;
        }

        .navbar .nav-link:hover,
        .navbar .nav-link.active {
            color: #b57e10; /* Your theme color */
        }

        .btn-custom {
            border-color: #B57E10 !important;
            color: #B57E10 !important;
            background-color: transparent !important;
            transition: all 0.3s ease;
        }

        .btn-custom:hover,
        .btn-custom:focus {
            background-color: #B57E10 !important;
            color: #ffffff !important;
            border-color: #ffffff !important;
        }
        nav .container {
            display: block !important;
        }

        .bottom-nav .nav-link {
            transition: color 0.3s ease, border-bottom 0.3s ease;
            position: relative;
        }

        .bottom-nav .nav-link:hover,
        .bottom-nav .nav-link:focus {
            color: #B57E10 !important;
            text-decoration: none;
        }

        .bottom-nav .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            height: 2px;
            width: 0;
            background-color: #B57E10;
            transition: width 0.3s ease;
        }

        .bottom-nav .nav-link:hover::after,
        .bottom-nav .nav-link:focus::after {
            width: 100%;
        }

        .mega-dropdown {
            position: relative;
        }





        /* Left column: departments list */
        .mega-dropdown-menu .departments-list {
            height: 60vh !important;
            overflow-y: auto;
            background: #f9f9f9;
        }

        .department-item a:hover {
            background-color: #B57E10;
            color: white !important;
        }

        /* Right column: categories */
        .categories-grid {
            max-height: 400px;
            overflow-y: auto;
        }

        /* Hide all department categories initially */
        .department-categories {
            display: none;
        }

        /* Show only first department categories by default */
        .department-categories:first-child {
            display: block;
        }

        .category-link:hover {
            color: #B57E10;
            font-weight: 600;
            text-decoration: underline;
        }

        /* Scrollbar styling (optional) */
        .departments-list::-webkit-scrollbar,
        .categories-grid::-webkit-scrollbar {
            width: 6px;
        }

        .departments-list::-webkit-scrollbar-thumb,
        .categories-grid::-webkit-scrollbar-thumb {
            background-color: rgba(181, 126, 16, 0.5);
            border-radius: 3px;
        }
        #recentSearches {
            background: white;
            border: 1px solid #ddd;
            max-height: 200px;
            overflow-y: auto;
            border-radius: 0 0 5px 5px;
            box-shadow: 0 4px 6px rgb(0 0 0 / 0.1);
        }

        #recentSearches .list-group-item {
            cursor: pointer;
            padding: 8px 12px;
            font-size: 0.9rem;
        }

        #recentSearches .list-group-item:hover {
            background-color: #f8e9c6; /* light gold highlight */
            color: #B57E10;
        }

        .navbar .nav-link {
            color: #555;
            transition: color 0.3s ease;
        }

        .navbar .nav-link:hover,
        .navbar .nav-link.active {
            color: #b57e10; /* Your theme color */
        }

        .btn-custom {
            border-color: #B57E10 !important;
            color: #B57E10 !important;
            background-color: transparent !important;
            transition: all 0.3s ease;
        }

        .btn-custom:hover,
        .btn-custom:focus {
            background-color: #B57E10 !important;
            color: #ffffff !important;
            border-color: #ffffff !important;
        }
        nav .container {
            display: block !important;
        }

        .bottom-nav .nav-link {
            transition: color 0.3s ease, border-bottom 0.3s ease;
            position: relative;
        }

        .bottom-nav .nav-link:hover,
        .bottom-nav .nav-link:focus {
            color: #B57E10 !important;
            text-decoration: none;
        }

        .bottom-nav .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            height: 2px;
            width: 0;
            background-color: #B57E10;
            transition: width 0.3s ease;
        }

        .bottom-nav .nav-link:hover::after,
        .bottom-nav .nav-link:focus::after {
            width: 100%;
        }

        .mega-dropdown {
            position: relative;
        }

        .mega-dropdown-menu {
            position: fixed;
            top: 150px; /* adjust based on your navbar height */
            left: 0;
            right: 0;  /* ensures full width */
            width: 99% !important;
            height: 60vh;
            box-sizing: border-box;
            background: #fff;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            padding: 0 !important;
            display: none; /* start hidden */
            z-index: 1050;
            border-top: 4px solid #B57E10;
            overflow-y: auto;
        }


        .mega-dropdown:hover .mega-dropdown-menu {
            display: block;
        }

        /* Left column: departments list */
        .mega-dropdown-menu .departments-list {
            height: 60vh;
            overflow-y: auto;
            background: #f9f9f9;
        }

        .department-item a:hover {
            background-color: #B57E10;
            color: white !important;
        }

        /* Right column: categories */
        .categories-grid {
            max-height: 400px;
            overflow-y: auto;
        }

        /* Hide all department categories initially */
        .department-categories {
            display: none;
        }

        /* Show only first department categories by default */
        .department-categories:first-child {
            display: block;
        }

        .category-link:hover {
            color: #B57E10;
            font-weight: 600;
            text-decoration: underline;
        }

        /* Scrollbar styling (optional) */
        .departments-list::-webkit-scrollbar,
        .categories-grid::-webkit-scrollbar {
            width: 6px;
        }

        .departments-list::-webkit-scrollbar-thumb,
        .categories-grid::-webkit-scrollbar-thumb {
            background-color: rgba(181, 126, 16, 0.5);
            border-radius: 3px;
        }

        #searchInput:focus {
            outline: none;
            box-shadow: none;
        }

        .accordion-button {
            border-radius: 8px !important;
            font-size: 1rem;
        }
        .accordion-button:not(.collapsed) {
            color: #b57e10;
            background-color: #fff7e6;
            box-shadow: 0 2px 8px rgb(181 126 16 / 0.15);
        }
        .category-hover:hover {
            color: #b57e10 !important;
            text-decoration: underline;
        }
        .brand-hover:hover {
            background-color: #fff7e6;
            border-radius: 6px;
            cursor: pointer;
        }
        .list-group {
            background: #fff;
        }
        .cursor-pointer {
            cursor: pointer;
        }
        .sidebar-shadow {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 30px;
        }
        .add-to-cart-btn {
            border: 2px solid #b57e10 !important;
            background-color: white;
            color: #b57e10 !important;
            font-weight: 600 !important;
            justify-content: center; /* center content horizontally */
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .add-to-cart-btn i {
            font-size: 1.3rem; /* bigger icon */
            color: #b57e10;
            transition: color 0.3s ease;
        }

        .add-to-cart-btn:hover {
            background-color: #b57e10 !important;
            color: white !important;
            border-color: #b57e10 !important;
        }

        .add-to-cart-btn:hover i {
            color: white !important;
        }
        .card-img-top {
            transition: transform 0.3s ease;
        }

        .card:hover .card-img-top {
            transform: scale(1.05);
        }
        .hero-section {
            background: linear-gradient(90deg, #b57e10, #d4a017);
            height: 100px; /* thin height */
            /* Center content vertically and horizontally */
            font-size: 1.25rem;
            letter-spacing: 0.05em;
            box-shadow: 0 2px 6px rgb(181 126 16 / 0.4);
        }


    </style>

    @if(app()->getLocale() === 'ar')
        <!-- Bootstrap RTL CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    @else
        <!-- Regular Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    @endif

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
@include('layouts.cart_modal')
