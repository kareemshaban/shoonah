

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme" >
    <div class="app-brand demo">
        <a href="{{route('index')}}" class="app-brand-link">
              <span class="app-brand-logo demo">
                  <img  src="{{asset('assets/img/shoonah_trans.png')}}" style="height: 80px" />
              </span>

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
