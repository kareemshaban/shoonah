<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">

@include('layouts.head_front')


<!-- Navbar -->
@include('layouts.new_front_nav')



<style>
    .treeview li {
        list-style-type: none;
        margin-bottom: 6px;
    }
    .tree-toggle {
        user-select: none;
    }
    .tree-toggle:hover {
        color: #b57e10;
    }
    .nested {
        margin-left: 12px;
    }
    .category-hover:hover {
        color: #b57e10 !important;
        text-decoration: underline;
    }
    /*.brand-hover:hover {*/
    /*    background-color: #fff7e6;*/
    /*    border-radius: 6px;*/
    /*    cursor: pointer;*/
    /*}*/
    .cursor-pointer {
        cursor: pointer;
    }
    .transition-icon {
        transition: transform 0.3s ease;
    }
    .tree-toggle.open .transition-icon {
        transform: rotate(90deg);
    }


    .carousel {
        max-height: 220px; /* adjust this to medium height */

    }
    .carousel-item img {
        object-fit: cover;
        height: 220px; /* match carousel max-height */
        width: 100%;
    }

    /* Modern overlay caption style */
    .carousel-caption {
        background: rgba(0, 0, 0, 0.5);
        border-radius: 0.3rem;
        padding: 1rem 1.5rem;
    }

</style>

<!-- Thin Hero Section -->
<!-- Thin Hero Image Slider -->



<!-- Main Body -->
<div class="container mt-4">
    <div class="row" style="margin-bottom: 20px">
        <div id="mediumCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="4000">
            <div class="carousel-inner">
                @foreach($ads as $ad)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                        <img src="{{ asset('images/banner/' . $ad->banner) }}" class="d-block w-100" alt="{{ $ad->id }}">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>{{ $ad->title }}</h5>
                            <p>{{ $ad->description }}</p>
                        </div>
                    </div>
                @endforeach


            </div>

            <!-- Controls -->

            <!-- Indicators -->
            <div class="carousel-indicators">
                @foreach($ads as $ad)
                    <button
                        type="button"
                        data-bs-target="#mediumCarousel"
                        data-bs-slide-to="{{ $loop->index }}"
                        class="{{ $loop->first ? 'active' : '' }}"
                        @if($loop->first) aria-current="true" @endif
                        aria-label="Slide {{ $loop->iteration }}">
                    </button>
                @endforeach
            </div>

        </div>
    </div>

    <div class="row">

{{--        <div class="col-md-3 sidebar-shadow rounded bg-white p-4">--}}
{{--            <h5 class="mb-4 fw-bold text-primary" style="color: #b57e10 !important;">{{ __('main.f_categories') }}</h5>--}}

{{--            <ul class="treeview list-unstyled p-0">--}}
{{--                @foreach($departments as $department)--}}
{{--                    <li>--}}
{{--            <span class="tree-toggle d-flex justify-content-between align-items-center fw-semibold text-dark cursor-pointer">--}}
{{--                {{ app()->getLocale() === 'ar' ? $department->name_ar : $department->name_en }}--}}
{{--                <i class="bi--}}
{{--                    @if(app()->getLocale() === 'ar') bi-chevron-left @else bi-chevron-right @endif--}}
{{--                    transition-icon"></i>--}}
{{--            </span>--}}

{{--                        @if($department->categories->isNotEmpty())--}}
{{--                            <ul class="nested list-unstyled ps-3 mt-2" style="display: none;">--}}
{{--                                @foreach($department->categories as $category)--}}
{{--                                    <li class="py-1">--}}
{{--                                        <a href="#" class="text-decoration-none text-secondary category-hover">--}}
{{--                                            {{ app()->getLocale() === 'ar' ? $category->name_ar : $category->name_en }}--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                @endforeach--}}
{{--                            </ul>--}}
{{--                        @endif--}}
{{--                    </li>--}}
{{--                @endforeach--}}
{{--            </ul>--}}



{{--        </div>--}}


        <!-- Product Grid -->
        <div class="col-md-12">
            <div class="row g-4">
                @forelse($products as $product)
                    <div class="col-md-4">
                        <div class="card h-100 shadow-sm">
                            <img src="{{ asset('images/products/' . $product->mainImg) }}" class="card-img-top"
                                 alt="{{ $product->name_ar }}" style="height: 200px; object-fit: cover;">
                            <div class="card-body d-flex flex-column">
                                <h6 class="card-title">{{ $product->name_ar }}</h6>
                                <p class="card-text small text-muted">{{ Str::limit($product->short_description_ar, 50) }}</p>
                                <p class="fw-bold text-success" style="color: #b57e10 !important;"> {{ $product->department_ar }}  | {{ $product->category_ar }} </p>
                                <button class="btn btn-sm d-flex align-items-center justify-content-center gap-2 mt-auto add-to-cart-btn" data-id="{{ $product->id }}">
                                    <i class="bi bi-cart-plus-fill"></i>
                                    {{__('main.add_to_cart')}}
                                </button>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p>No products found.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>


</div>



@include('layouts.new_footer')
    <script>

        document.addEventListener('DOMContentLoaded', () => {
            const searchInput = document.getElementById('searchInput');
            const recentSearches = document.getElementById('recentSearches');

            // Show recent searches when input is focused
            searchInput.addEventListener('focus', () => {
                recentSearches.style.display = 'block';
            });

            // Hide recent searches when clicking outside of input or recentSearches
            document.addEventListener('click', (event) => {
                if (
                    !searchInput.contains(event.target) &&
                    !recentSearches.contains(event.target)
                ) {
                    recentSearches.style.display = 'none';
                }
            });

            // Optional: hide recentSearches on input blur with small delay to allow clicking items
            searchInput.addEventListener('blur', () => {
                setTimeout(() => {
                    if (!recentSearches.contains(document.activeElement)) {
                        recentSearches.style.display = 'none';
                    }
                }, 200);
            });
        });


        document.querySelectorAll('.department-item a').forEach((deptLink, index) => {
            deptLink.addEventListener('mouseenter', () => {
                // Hide all category grids
                document.querySelectorAll('.department-categories').forEach(catGrid => {
                    catGrid.style.display = 'none';
                });
                // Show the hovered department's categories
                const allCategories = document.querySelectorAll('.department-categories');
                if (allCategories[index]) {
                    allCategories[index].style.display = 'block';
                }
            });
        });









    </script>


<script>
    document.addEventListener("DOMContentLoaded", function () {
        const toggles = document.querySelectorAll('.tree-toggle');

        toggles.forEach(toggle => {
            toggle.addEventListener('click', function () {
                const nested = this.nextElementSibling;
                const isAlreadyOpen = nested && nested.style.display === 'block';

                // Close all
                document.querySelectorAll('.nested').forEach(n => n.style.display = 'none');
                document.querySelectorAll('.tree-toggle').forEach(t => t.classList.remove('open'));
                document.querySelectorAll('.transition-icon').forEach(i => i.classList.remove('rotate-icon'));

                if (!isAlreadyOpen) {
                    // Open the clicked one
                    if (nested) nested.style.display = 'block';
                    this.classList.add('open');

                    const icon = this.querySelector('.transition-icon');
                    if (icon) icon.classList.add('rotate-icon');
                }
            });
        });
    });
</script>




</html>
