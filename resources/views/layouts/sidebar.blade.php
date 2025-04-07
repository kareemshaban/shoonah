

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme" >
    <div class="app-brand demo">
        <a href="{{route('index')}}" class="app-brand-link">
              <span class="app-brand-logo demo">
                <svg
                    width="25"
                    viewBox="0 0 25 42"
                    version="1.1"
                    xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink"
                >
                  <defs>
                    <path
                        d="M13.7918663,0.358365126 L3.39788168,7.44174259 C0.566865006,9.69408886 -0.379795268,12.4788597 0.557900856,15.7960551 C0.68998853,16.2305145 1.09562888,17.7872135 3.12357076,19.2293357 C3.8146334,19.7207684 5.32369333,20.3834223 7.65075054,21.2172976 L7.59773219,21.2525164 L2.63468769,24.5493413 C0.445452254,26.3002124 0.0884951797,28.5083815 1.56381646,31.1738486 C2.83770406,32.8170431 5.20850219,33.2640127 7.09180128,32.5391577 C8.347334,32.0559211 11.4559176,30.0011079 16.4175519,26.3747182 C18.0338572,24.4997857 18.6973423,22.4544883 18.4080071,20.2388261 C17.963753,17.5346866 16.1776345,15.5799961 13.0496516,14.3747546 L10.9194936,13.4715819 L18.6192054,7.984237 L13.7918663,0.358365126 Z"
                        id="path-1"
                    ></path>
                    <path
                        d="M5.47320593,6.00457225 C4.05321814,8.216144 4.36334763,10.0722806 6.40359441,11.5729822 C8.61520715,12.571656 10.0999176,13.2171421 10.8577257,13.5094407 L15.5088241,14.433041 L18.6192054,7.984237 C15.5364148,3.11535317 13.9273018,0.573395879 13.7918663,0.358365126 C13.5790555,0.511491653 10.8061687,2.3935607 5.47320593,6.00457225 Z"
                        id="path-3"
                    ></path>
                    <path
                        d="M7.50063644,21.2294429 L12.3234468,23.3159332 C14.1688022,24.7579751 14.397098,26.4880487 13.008334,28.506154 C11.6195701,30.5242593 10.3099883,31.790241 9.07958868,32.3040991 C5.78142938,33.4346997 4.13234973,34 4.13234973,34 C4.13234973,34 2.75489982,33.0538207 2.37032616e-14,31.1614621 C-0.55822714,27.8186216 -0.55822714,26.0572515 -4.05231404e-15,25.8773518 C0.83734071,25.6075023 2.77988457,22.8248993 3.3049379,22.52991 C3.65497346,22.3332504 5.05353963,21.8997614 7.50063644,21.2294429 Z"
                        id="path-4"
                    ></path>
                    <path
                        d="M20.6,7.13333333 L25.6,13.8 C26.2627417,14.6836556 26.0836556,15.9372583 25.2,16.6 C24.8538077,16.8596443 24.4327404,17 24,17 L14,17 C12.8954305,17 12,16.1045695 12,15 C12,14.5672596 12.1403557,14.1461923 12.4,13.8 L17.4,7.13333333 C18.0627417,6.24967773 19.3163444,6.07059163 20.2,6.73333333 C20.3516113,6.84704183 20.4862915,6.981722 20.6,7.13333333 Z"
                        id="path-5"
                    ></path>
                  </defs>
                  <g id="g-app-brand" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g id="Brand-Logo" transform="translate(-27.000000, -15.000000)">
                      <g id="Icon" transform="translate(27.000000, 15.000000)">
                        <g id="Mask" transform="translate(0.000000, 8.000000)">
                          <mask id="mask-2" fill="white">
                            <use xlink:href="#path-1"></use>
                          </mask>
                          <use fill="#696cff" xlink:href="#path-1"></use>
                          <g id="Path-3" mask="url(#mask-2)">
                            <use fill="#696cff" xlink:href="#path-3"></use>
                            <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-3"></use>
                          </g>
                          <g id="Path-4" mask="url(#mask-2)">
                            <use fill="#696cff" xlink:href="#path-4"></use>
                            <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-4"></use>
                          </g>
                        </g>
                        <g
                            id="Triangle"
                            transform="translate(19.000000, 11.000000) rotate(-300.000000) translate(-19.000000, -11.000000) "
                        >
                          <use fill="#696cff" xlink:href="#path-5"></use>
                          <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-5"></use>
                        </g>
                      </g>
                    </g>
                  </g>
                </svg>
              </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2">Sneat</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item @if($slag == 0)  active @endif">
            <a href="{{route('index')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">{{__('main.dashboard')}}</div>
            </a>
        </li>

        <!-- Layouts -->
        <li class="menu-item @if($slag == 1)  active @endif">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">{{__('main.basicData')}}</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item @if($subSlag == 11)  active @endif">
                    <a href="{{route('countries')}}" class="menu-link">
                        <div data-i18n="Without menu">{{__('main.countries')}}</div>
                    </a>
                </li>
                <li class="menu-item @if($subSlag == 12)  active @endif">
                    <a href="{{route('cities')}}" class="menu-link">
                        <div data-i18n="Without navbar">{{__('main.cities')}}</div>
                    </a>
                </li>

            </ul>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">{{__('main.factory_department')}}</span>
        </li>
        <li class="menu-item @if($slag == 2)  active @endif" >
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings">{{__('main.suppliers')}}</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item @if($subSlag == 21)  active @endif">
                    <a href="{{route('suppliers')}}"  class="menu-link">
                        <div data-i18n="Account">{{__('main.suppliers_list')}}</div>
                    </a>
                </li>
                <li class="menu-item @if($subSlag == 22)  active @endif">
                    <a href="{{route('reviews')}}"  class="menu-link">
                        <div data-i18n="Rates">{{__('main.supplier_rate')}}</div>
                    </a>
                </li>

            </ul>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">{{__('main.clients_department')}}</span>
        </li>
        <li class="menu-item @if($slag == 3)  active @endif">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings">{{__('main.clients_list')}}</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item @if($subSlag == 31)  active @endif">
                    <a href="{{route('clients')}}"  class="menu-link">
                        <div data-i18n="Account">{{__('main.clients')}}</div>
                    </a>
                </li>


            </ul>
        </li>

        <!-- Components -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">{{__('main.product_department')}}</span></li>
        <!-- Cards -->

        <!-- User interface -->
        <li class="menu-item @if($slag == 4)  active @endif">
            <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-box"></i>
                <div data-i18n="User interface">{{__('main.product_list')}}</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item @if($subSlag == 41)  active @endif">
                    <a href="{{route('brands')}}" class="menu-link">
                        <div data-i18n="Accordion">{{__('main.brands')}}</div>
                    </a>
                </li>
                <li class="menu-item @if($subSlag == 42)  active @endif">
                    <a href="{{route('departments')}}" class="menu-link">
                        <div data-i18n="Alerts">{{__('main.departments')}}</div>
                    </a>
                </li>
                <li class="menu-item @if($subSlag == 43)  active @endif">
                    <a href="{{route('categories')}}" class="menu-link">
                        <div data-i18n="Badges">{{__('main.categories')}}</div>
                    </a>
                </li>
                <li class="menu-item @if($subSlag == 44)  active @endif">
                    <a href="{{route('products')}}" class="menu-link">
                        <div data-i18n="Buttons">{{__('main.products')}}</div>
                    </a>
                </li>
                <li class="menu-item @if($subSlag == 45)  active @endif">
                    <a href="{{route('create-product')}}" class="menu-link">
                        <div data-i18n="Buttons">{{__('main.create_product')}}</div>
                    </a>
                </li>
                <li class="menu-item @if($subSlag == 46)  active @endif">
                    <a href="{{route('add_product_to_supplier')}}" class="menu-link">
                        <div data-i18n="Buttons">{{__('main.add_product_to_supplier')}}</div>
                    </a>
                </li>

            </ul>
        </li>

        <!-- Extended components -->
        <li class="menu-item @if($slag == 5)  active @endif">
            <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-copy"></i>
                <div data-i18n="Extended UI">{{__('main.material_list')}}</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item @if($subSlag == 51)  active @endif">
                    <a href="{{route('materials')}}" class="menu-link">
                        <div data-i18n="Perfect Scrollbar">{{__('main.materials')}}</div>
                    </a>
                </li>
                <li class="menu-item @if($subSlag == 52)  active @endif">
                    <a href="{{route('compositions')}}" class="menu-link">
                        <div data-i18n="Text Divider">{{__('main.compositions')}}</div>
                    </a>
                </li>
                <li class="menu-item @if($subSlag == 53)  active @endif">
                    <a href="{{route('create-compositions')}}" class="menu-link">
                        <div data-i18n="Text Divider">{{__('main.composition_create')}}</div>
                    </a>
                </li>
            </ul>
        </li>



        <!-- Forms & Tables -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">{{__('main.quotations_department')}}</span></li>
        <!-- Forms -->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-detail"></i>
                <div data-i18n="Form Elements">{{__('main.quotations_request_list')}}</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{route('quotationRequests')}}" class="menu-link">
                        <div data-i18n="Basic Inputs">{{__('main.quotations_requests')}}</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-detail"></i>
                <div data-i18n="Form Layouts">{{__('main.quotations_list')}}</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{route('quotations')}}" class="menu-link">
                        <div data-i18n="Vertical Form">{{__('main.quotations')}}</div>
                    </a>
                </li>

            </ul>
        </li>

        <li class="menu-header small text-uppercase"><span class="menu-header-text">{{__('main.news_ads_department')}}</span></li>
        <!-- Forms -->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-detail"></i>
                <div data-i18n="Form Elements">{{__('main.news_list')}}</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{route('globalNews')}}" class="menu-link">
                        <div data-i18n="Basic Inputs">{{__('main.news')}}</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-detail"></i>
                <div data-i18n="Form Layouts">{{__('main.ads_list')}}</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{route('ads')}}" class="menu-link">
                        <div data-i18n="Vertical Form">{{__('main.ads')}}</div>
                    </a>
                </li>

            </ul>
        </li>

        <li class="menu-header small text-uppercase"><span class="menu-header-text">{{__('main.reports_department')}}</span></li>
        <!-- Forms -->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-detail"></i>
                <div data-i18n="Form Elements">{{__('main.report_list')}}</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{route('visit_reports')}}" class="menu-link">
                        <div data-i18n="Basic Inputs">{{__('main.visit_reports')}}</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{route('quotations_request_report')}}" class="menu-link">
                        <div data-i18n="Basic Inputs">{{__('main.quotations_request_report')}}</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{route('quotations_report')}}" class="menu-link">
                        <div data-i18n="Basic Inputs">{{__('main.quotations_report')}}</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{route('quotations_request_report_by_company')}}" class="menu-link">
                        <div data-i18n="Basic Inputs">{{__('main.quotations_request_report_by_company')}}</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{route('quotations_request_report_by_product')}}" class="menu-link">
                        <div data-i18n="Basic Inputs">{{__('main.quotations_request_report_by_product')}}</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{route('quotations_request_report_by_supplier')}}" class="menu-link">
                        <div data-i18n="Basic Inputs">{{__('main.quotations_request_report_by_supplier')}}</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Misc -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">{{__('main.users_and_auth_department')}}</span></li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-detail"></i>
                <div data-i18n="Form Elements">{{__('main.users_list')}}</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{route('users')}}" class="menu-link">
                        <div data-i18n="Basic Inputs">{{__('main.users')}}</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{route('roles')}}" class="menu-link">
                        <div data-i18n="Basic Inputs">{{__('main.roles')}}</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{route('auth')}}" class="menu-link">
                        <div data-i18n="Basic Inputs">{{__('main.auth')}}</div>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</aside>
