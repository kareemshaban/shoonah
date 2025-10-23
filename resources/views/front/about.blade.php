<!DOCTYPE html>
<html   @if(Config::get('app.locale')=='ar' )  lang="ar"   dir="rtl" @else lang="en"   dir="ltr" @endif>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Custom CSS -->
<style>
    .hero-section {
        background-image: url('{{asset('assets/front/images/about.png')}}'); /* Replace with your banner image */
        background-size: cover;
        background-position: center;
        color: white;
        padding: 100px 0;
        margin-top: 30px;
        text-align: center;
    }

    .hero-section h1 {
        font-size: 4rem;
        font-weight: 700;
        margin-bottom: 10px;
    }


    .about-header {
        font-size: 2.5rem;
        color: #B57E10;
        font-weight: bold;
    }

    .about-description {
        font-size: 1.1rem;
        color: #555;
        line-height: 1.6;
    }

    .section-title {
        font-size: 2rem;
        color: #333;
        text-transform: uppercase;
        font-weight: 700;
        margin-bottom: 30px;
    }

    .features-icons {
        display: flex;
        justify-content: space-around;
        flex-wrap: wrap;
        gap: 30px;
    }

    .feature-card {
        background: white;
        border-radius: 15px;
        padding: 30px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        text-align: center;
        width: 250px;
    }

    .feature-card h5 {
        font-weight: 600;
        margin-top: 20px;
        color: #333;
    }

    .feature-card p {
        color: #777;
    }

    .feature-card .icon {
        font-size: 3rem;
        color: #B57E10;
    }

    .cta-section {
        background-color: #B57E10;
        color: white;
        padding: 80px 0;
        text-align: center;
    }

    .cta-section h2 {
        font-size: 2.5rem;
        font-weight: bold;
    }

    .cta-section p {
        font-size: 1.2rem;
        margin-bottom: 30px;
    }

    .cta-btn {
        background-color: #fff;
        color: #B57E10;
        font-weight: bold;
        padding: 10px 30px;
        font-size: 1.1rem;
        border-radius: 50px;
        text-decoration: none;
    }
</style>
    @include('layouts.head_front')

<body class="animsition">

<!-- Header -->
@include('layouts.new_front_nav')


<div class="sec-banner bg0 p-t-80 p-b-50 py-5 bg-light">

    <section class="hero-section">
        <div class="container">
            <h1 style="color: #B57E10">{{__('main.about_title')}}</h1>
            <p style="color: black">{{__('main.about_sub_title')}}</p>
        </div>
    </section>
    <section class="about-container" style="margin-top: 30px">
        <div class="container text-center">
            <h2 class="about-header">{{__('main.about_title2')}}</h2>
            <p class="about-description" style="margin-top: 20px">
               {{__('main.about_details')}}
            </p>
        </div>
    </section>

    <section class="container my-5 text-center" style="margin-top: 30px">
        <h2 class="section-title" style="margin-bottom: 30px">{{__('main.how_works')}}</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="feature-card">
                    <div class="icon">
                        <i class="bi bi-basket"></i>
                    </div>
                    <h5 style="margin-bottom: 15px">{{__('main.buyers')}}</h5>
                    <p>{{__('main.works1')}}</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-card">
                    <div class="icon">
                        <i class="bi bi-truck"></i>
                    </div>
                    <h5 style="margin-bottom: 15px">{{__('main.sellers')}}</h5>
                    <p>{{__('main.works2')}}</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-card">
                    <div class="icon">
                        <i class="bi bi-cash-coin"></i>
                    </div>
                    <h5 style="margin-bottom: 15px">{{__('main.off_platform')}}</h5>
                    <p> {{__('main.works3')}}</p>
                </div>
            </div>

        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="cta-section">
        <h2>{{__('main.join_title')}}</h2>
        <p>{{__('main.join_sub_title')}}</p>
        <a href="{{route('register')}}" class="cta-btn">{{__('main.join_button')}}</a>
    </section>
</div>

<!-- Footer -->
@include('layouts.footer_design_front')


<!-- Back to top -->
<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
</div>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

<!-- Bootstrap Icons (for icons in features) -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
<!--===============================================================================================-->

@include('layouts.footer_front')
</body>
</html>






