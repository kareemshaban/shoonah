<nav
    class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
    id="layout-navbar"
>
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="bx bx-menu bx-sm"></i>
        </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
        <!-- Search -->
        <div class="navbar-nav align-items-center">
            <div class="nav-item d-flex align-items-center">
               <img  src="{{asset('assets/img/shoonah_trans.png')}}" style="height: 40px" />
            </div>
        </div>
        <!-- /Search -->

        <ul class="navbar-nav flex-row align-items-center @if(Config::get('app.locale')=='ar' ) me-auto @else ms-auto @endif ">
            <!-- Place this tag where you want the button to render. -->

            <li class="nav-item" style="@if(Config::get('app.locale')=='en' )  padding-right: 30px  ; @else padding-left: 30px ;  @endif">
                @if(Config::get('app.locale')=='en' )
                    <a el="alternate" hreflang="ar"
                       href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}" class="d-flex align-items-center gap-2 dropdown-item">
                       <img src="{{asset('assets/img/arab.png')}}" style="width: 40px; cursor: pointer; ">
                    </a>
                    @else
                    <a el="alternate" hreflang="en"
                       href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}" class="d-flex align-items-center gap-2 dropdown-item">
                       <img src="{{asset('assets/img/english.png')}}" style="width: 40px; cursor: pointer; ">
                    </a>
                @endif

            </li>
            <!-- User -->
            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                        <img src="{{asset('assets/img/avatars/1.png')}}" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                </a>
                <ul class="dropdown-menu @if(Config::get('app.locale')=='ar' ) dropdown-menu-start  @else  dropdown-menu-end @endif ">
                    <li>
                        <a class="dropdown-item" href="#">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar avatar-online">
                                        <img src="{{asset('assets/img/avatars/1.png')}}" alt class="w-px-40 h-auto rounded-circle" />
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <span class="fw-semibold d-block">{{auth()->user()->name }}</span>
                                    <small class="text-muted">Admin</small>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">
                            <i class="bx bx-user me-2"></i>
                            <span class="align-middle">My Profile</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">
                            <i class="bx bx-cog me-2"></i>
                            <span class="align-middle">Settings</span>
                        </a>
                    </li>

                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <a class="dropdown-item" href="auth-login-basic.html">
                            <i class="bx bx-power-off me-2"></i>
                            <span class="align-middle">Log Out</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!--/ User -->
        </ul>
    </div>
</nav>
