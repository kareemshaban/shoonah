<!DOCTYPE html>
<html   @if(Config::get('app.locale')=='ar' )  lang="ar"   dir="rtl" @else lang="en"   dir="ltr" @endif>
<style>



.contact {
background-color: #fff8e6;
border: 1px solid #f0d98b;
padding: 20px;
margin-top: 40px;
border-radius: 8px;
text-align: center;
}
a {
    text-decoration: none !important;
}
.contact_ele{
color: #B57E10 !important;
text-decoration: underline !important;
}

@media (max-width: 600px) {
h1 {
font-size: 1.8rem;
}
}
@if(Config::get('app.locale')=='ar' )
.accordion-button::after {
    margin-right: auto !important;
    margin-left: unset !important;
}

@else

    .accordion-button::after {
    margin-left: auto !important;
    margin-right: unset !important;
}
    @endif

</style>
@include('layouts.head_front')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap JS (include at bottom of page) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<body class="animsition">

<!-- Header -->
@include('layouts.nav_front' , ['slag' => -1])


<div class="sec-banner bg0 p-t-80 p-b-50 py-5 bg-light">
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center  mb-5" style="color: #B57E10">Frequently Asked Questions</h2>

            <!-- For Buyers -->
            <h4 class="mb-3 ">🛍️ {{__('main.buyers')}}</h4>
            <div class="accordion mb-5" id="buyerFAQ">
                <!-- Question 1 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="buyerHeading1">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#buyerCollapse1">
                            {{__('main.q1')}}
                        </button>
                    </h2>
                    <div id="buyerCollapse1" class="accordion-collapse collapse show" data-bs-parent="#buyerFAQ">
                        <div class="accordion-body">
                            {{__('main.a1')}}
                        </div>
                    </div>
                </div>

                <!-- Question 2 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="buyerHeading2">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#buyerCollapse2">
                            {{__('main.q2')}}
                        </button>
                    </h2>
                    <div id="buyerCollapse2" class="accordion-collapse collapse" data-bs-parent="#buyerFAQ">
                        <div class="accordion-body">
                            {{__('main.a2')}}
                        </div>
                    </div>
                </div>

                <!-- Question 3 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="buyerHeading3">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#buyerCollapse3">
                            {{__('main.q3')}}
                        </button>
                    </h2>
                    <div id="buyerCollapse3" class="accordion-collapse collapse" data-bs-parent="#buyerFAQ">
                        <div class="accordion-body">
                            {{__('main.a3')}}
                        </div>
                    </div>
                </div>

                <!-- Question 4 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="buyerHeading4">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#buyerCollapse4">
                            {{__('main.q4')}}
                        </button>
                    </h2>
                    <div id="buyerCollapse4" class="accordion-collapse collapse" data-bs-parent="#buyerFAQ">
                        <div class="accordion-body">
                            {{__('main.a4')}}
                        </div>
                    </div>
                </div>
            </div>

            <!-- For Sellers -->
            <h4 class="mb-3 ">🏪 {{__('main.sellers')}}</h4>
            <div class="accordion mb-5" id="sellerFAQ">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="sellerHeading1">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#sellerCollapse1">
                            {{__('main.q5')}}
                        </button>
                    </h2>
                    <div id="sellerCollapse1" class="accordion-collapse collapse show" data-bs-parent="#sellerFAQ">
                        <div class="accordion-body">
                            {{__('main.a5')}}
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="sellerHeading2">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sellerCollapse2">
                            {{__('main.q6')}}
                        </button>
                    </h2>
                    <div id="sellerCollapse2" class="accordion-collapse collapse" data-bs-parent="#sellerFAQ">
                        <div class="accordion-body">
                            {{__('main.a6')}}
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="sellerHeading3">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sellerCollapse3">
                            {{__('main.q7')}}
                        </button>
                    </h2>
                    <div id="sellerCollapse3" class="accordion-collapse collapse" data-bs-parent="#sellerFAQ">
                        <div class="accordion-body">
                            {{__('main.a7')}}
                        </div>
                    </div>
                </div>
            </div>

            <!-- General -->
            <h4 class="mb-3 ">⚙️ {{__('main.general')}}</h4>
            <div class="accordion" id="generalFAQ">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="generalHeading1">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#generalCollapse1">
                           {{__('main.q8')}}
                        </button>
                    </h2>
                    <div id="generalCollapse1" class="accordion-collapse collapse show" data-bs-parent="#generalFAQ">
                        <div class="accordion-body">
                           {{__('main.a8')}}
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="generalHeading2">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#generalCollapse2">
                            {{__('main.q9')}}
                        </button>
                    </h2>
                    <div id="generalCollapse2" class="accordion-collapse collapse" data-bs-parent="#generalFAQ">
                        <div class="accordion-body">
                            {{__('main.a9')}}
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="generalHeading3">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#generalCollapse3">
                            {{__('main.q10')}}
                        </button>
                    </h2>
                    <div id="generalCollapse3" class="accordion-collapse collapse" data-bs-parent="#generalFAQ">
                        <div class="accordion-body">
                            {{__('main.a10')}}
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="generalHeading4">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#generalCollapse4">
                            {{__('main.q11')}}
                        </button>
                    </h2>
                    <div id="generalCollapse4" class="accordion-collapse collapse" data-bs-parent="#generalFAQ">
                        <div class="accordion-body">
                            {{__('main.a111')}} <a href="mailto:info@shoonah.com">info@shoonah.com</a> {{__('main.a112')}}
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="generalHeading5">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#generalCollapse5">
                            {{__('main.q12')}}
                        </button>
                    </h2>
                    <div id="generalCollapse5" class="accordion-collapse collapse" data-bs-parent="#generalFAQ">
                        <div class="accordion-body">
                            {{__('main.a12')}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="contact">
            <p>{{__('main.contact_title')}}</p>
            <p>{{__('main.contact_sub_title')}} <a href="mailto:info@shoonah.com" class="contact_ele">info@Shoonah.com</a></p>
        </div>
    </section>

    <!-- Bootstrap JS -->


</div>

<!-- Slider -->









<!-- Footer -->
@include('layouts.footer_design_front')


<!-- Back to top -->
<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
</div>

<!-- Modal1 -->
<div class="wrap-modal1 js-modal1 p-t-60 p-b-20">
    <div class="overlay-modal1 js-hide-modal1"></div>
    <section class="faq-section" style="padding: 40px 0; background-color: #fdfdfd;">
        <div class="container" style="max-width: 960px; margin: auto; padding: 0 20px;">
            <h2 style="color: #B57E10; text-align: center; margin-bottom: 30px;">Frequently Asked Questions</h2>

            <div class="faq-item" style="margin-bottom: 25px;">
                <h4 style="color: #333; font-weight: 600;">How do I request a quotation on Shoonah?</h4>
                <p style="color: #555; margin-top: 8px;">
                    As a buyer, you can submit a quote request from the product or category page. Just fill in the necessary details (quantity, specifications, delivery time) and submit. Sellers will respond directly with their best offers.
                </p>
            </div>

            <div class="faq-item" style="margin-bottom: 25px;">
                <h4 style="color: #333; font-weight: 600;">How do sellers respond to quotations?</h4>
                <p style="color: #555; margin-top: 8px;">
                    Registered sellers can view quote requests from their dashboard. They can then submit their pricing, terms, and expected delivery time through a simple form.
                </p>
            </div>

            <div class="faq-item" style="margin-bottom: 25px;">
                <h4 style="color: #333; font-weight: 600;">Is communication allowed between buyers and sellers?</h4>
                <p style="color: #555; margin-top: 8px;">
                    Yes. Once a quotation is submitted, both parties can communicate via the built-in messaging system to clarify details or negotiate.
                </p>
            </div>

            <div class="faq-item" style="margin-bottom: 25px;">
                <h4 style="color: #333; font-weight: 600;">Does Shoonah handle payments?</h4>
                <p style="color: #555; margin-top: 8px;">
                    No. Shoonah only facilitates the connection between buyer and seller. All payments and transactions take place directly between both parties.
                </p>
            </div>

            <div class="faq-item" style="margin-bottom: 25px;">
                <h4 style="color: #333; font-weight: 600;">Can I compare multiple quotations?</h4>
                <p style="color: #555; margin-top: 8px;">
                    Absolutely. You can receive multiple quotes for the same request and compare them based on price, delivery time, and seller ratings.
                </p>
            </div>



        </div>

        <div class="contact">
            <p>Still have questions? We're here to help.</p>
            <p>Contact us at <a href="mailto:info@shoonah.com" class="contact_ele">info@Shoonah.com</a></p>
        </div>
    </section>




</div>


<!--===============================================================================================-->

@include('layouts.footer_front')
</body>
</html>
