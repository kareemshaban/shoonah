<!DOCTYPE html>
<html   @if(Config::get('app.locale')=='ar' )  lang="ar"   dir="rtl" @else lang="en"   dir="ltr" @endif>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<!-- Custom Style -->
<style>
    body {
        font-family: 'Segoe UI', sans-serif;
    }

    .contact-header {
        background-color: #B57E10;
        color: white;
        padding: 60px 0;
        text-align: center;
    }

    .contact-header h1 {
        font-weight: bold;
    }

    .contact-section {
        padding: 60px 0;
    }

    .contact-info i {
        font-size: 1.5rem;
        color: #B57E10;
        margin-right: 10px;
    }

    .form-control:focus {
        border-color: #B57E10;
        box-shadow: 0 0 0 0.2rem rgba(181, 126, 16, 0.25);
    }

    .btn-brand {
        background-color: #B57E10;
        color: #fff;
        border: none;
    }

    .btn-brand:hover {
        background-color: #a66f0d;
    }
</style>
@include('layouts.head_front')

<body class="animsition">

<!-- Header -->
@include('layouts.nav_front' , ['slag' => 4])


<div class="sec-banner bg0 p-t-80 p-b-50 py-5 bg-light">
    <section class="contact-header" style="margin-top: 40px">
        <div class="container">
            <h1 style="margin-bottom: 10px">{{__('main.contact')}}</h1>
            <p>{{__('main.contact_title1')}}</p>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact-section">
        <div class="container">
            <div class="row g-5">
                <!-- Contact Info -->
                <div class="col-lg-5">
                    <h4 class="mb-4">{{__('main.contact_title2')}}</h4>
                    <p class="mb-4">{{__('main.contact_details')}}</p>
                    <div class="contact-info mb-3">
                        <i class="bi bi-envelope-fill"></i>
                        <span>{{__('main.contact_email')}} <a href="mailto:info@Shoonah.com">info@Shoonah.com</a></span>
                    </div>
                    <div class="contact-info mb-3">
                        <i class="bi bi-phone-fill"></i>
                        <span>{{__('main.phone')}} : <a href="tel:+971 50 739 2277"><span dir="ltr" style="unicode-bidi: plaintext;"> {{__('main.phone1')}} </span> </a></span>
                    </div>
                    <div class="contact-info mb-3">
                        <i class="bi bi-geo-alt-fill"></i>
                        <span>{{__('main.contact_address')}}</span>
                    </div>
                    <div class="contact-info mb-3">
                        <i class="bi bi-clock-fill"></i>
                        <span>{{__('main.contact_hours')}}</span>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="col-lg-7">
                    <h4 class="mb-4">{{__('main.contact_form_title')}}</h4>
                    <form action="#" method="POST">
                        <div class="mb-3">
                            <label for="name" class="form-label">{{__('main.contact_form_name')}}</label>
                            <input type="text" class="form-control" id="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">{{__('main.contact_form_email')}}</label>
                            <input type="email" class="form-control" id="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="subject" class="form-label">{{__('main.contact_form_subject')}}</label>
                            <input type="text" class="form-control" id="subject">
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">{{__('main.contact_form_message')}}</label>
                            <textarea class="form-control" id="message" rows="5" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-brand px-4">{{__('main.contact_form_btn')}}</button>
                    </form>
                </div>
            </div>
        </div>
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


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!--===============================================================================================-->

@include('layouts.footer_front')
</body>
</html>






