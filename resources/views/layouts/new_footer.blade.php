<!-- Footer -->
<footer class="bg-light text-dark pt-5 pb-4 mt-5 shadow-sm border-top">
    <div class="container text-center text-md-start">
        <div class="row">

            <!-- Logo and Description -->
            <div class="col-md-4 mb-4">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('assets/img/shoonah_trans.png') }}" alt="Logo" style="width: 120px;">
                </a>
                <p class="mt-3 text-muted">
                    {{ __('main.front_nav_title') }}
                </p>
            </div>

            <!-- Quick Links -->
            <div class="col-md-2 mb-4">
                <h6 class="text-uppercase fw-bold" style="color: #b57e10;">{{ __('main.quick_links') }}</h6>
                <ul class="list-unstyled">
                    <li><a href="{{ route('front') }}" class="text-decoration-none text-secondary d-block py-1">{{ __('main.home') }}</a></li>
                    <li><a href="{{ route('about') }}" class="text-decoration-none text-secondary d-block py-1">{{ __('main.about') }}</a></li>
                    <li><a href="{{ route('contact') }}" class="text-decoration-none text-secondary d-block py-1">{{ __('main.contact') }}</a></li>
                    <li><a href="{{ route('terms') }}" class="text-decoration-none text-secondary d-block py-1">{{ __('main.privacy') }}</a></li>
                    <li><a href="{{ route('faqs') }}" class="text-decoration-none text-secondary d-block py-1">{{ __('main.help') }}</a></li>

                </ul>
            </div>

            <!-- Categories -->
            <div class="col-md-3 mb-4">
                <h6 class="text-uppercase fw-bold" style="color: #b57e10;">{{ __('main.f_categories') }}</h6>
                <ul class="list-unstyled">
                    @foreach($departments->take(5) as $department)
                        <li>
                            <a href="#" class="text-decoration-none text-secondary d-block py-1">
                                {{ app()->getLocale() === 'ar' ? $department->name_ar : $department->name_en }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Social & Newsletter -->
            <div class="col-md-3 mb-4">
                <h6 class="text-uppercase fw-bold" style="color: #b57e10;">{{ __('main.follow_us') }}</h6>
                <div class="d-flex gap-3 mb-3">
                    <a href="https://www.facebook.com/omarco2020" target="_blank" class="text-secondary fs-5"><i class="bi bi-facebook"></i></a>
                    <a href="https://www.instagram.com/shoonah_international/" target="_blank" class="text-secondary fs-5"><i class="bi bi-instagram"></i></a>
                    <a href="https://x.com/shoonahuae" target="_blank" class="text-secondary fs-5"><i class="bi bi-twitter"></i></a>
                    <a href="https://wa.me/971507392277" target="_blank" class="text-secondary fs-5"><i class="bi bi-whatsapp"></i></a>
                </div>
                <form>
                    <div class="input-group">
                        <input type="email" class="form-control form-control-sm" placeholder="{{ __('main.subscribe_email') }}">
                        <button class="btn btn-sm text-white" style="background-color: #b57e10;">{{ __('main.subscribe') }}</button>
                    </div>
                </form>
            </div>

        </div>

        <hr>

        <!-- Copyright -->
        <div class="text-center">
            <p class="text-muted mb-0 text-center">
                &copy; {{ now()->year }} SHOONAH. {{ __('main.all_rights_reserved') }} |
                {{ __('main.designed_by') }}
                <a href="#" target="_blank" class="text-decoration-none text-primary fw-semibold">
                    NileArc
                </a>
            </p>
        </div>
    </div>
</footer>
