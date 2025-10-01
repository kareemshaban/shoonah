<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
        Route::get('/', [App\Http\Controllers\FrontController::class, 'index'])->name('front');

        Route::get('/cpanel', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

        Route::get('/countries', [App\Http\Controllers\CountryController::class, 'index'])->name('countries');
        Route::post('/store-country', [App\Http\Controllers\CountryController::class, 'store'])->name('store-country');
        Route::get('/getCountry/{id}', [App\Http\Controllers\CountryController::class, 'show'])->name('getCountry');
        Route::get('/deleteCountry/{id}', [App\Http\Controllers\CountryController::class, 'destroy'])->name('deleteCountry');
        Route::get('/getCountryCities/{id}', [App\Http\Controllers\CountryController::class, 'getCountryCities'])->name('getCountryCities');



        Route::get('/cities', [App\Http\Controllers\CityController::class, 'index'])->name('cities');
        Route::post('/store-city', [App\Http\Controllers\CityController::class, 'store'])->name('store-city');
        Route::get('/getCity/{id}', [App\Http\Controllers\CityController::class, 'show'])->name('getCity');
        Route::get('/deleteCity/{id}', [App\Http\Controllers\CityController::class, 'destroy'])->name('deleteCity');

        Route::get('/currencies', [App\Http\Controllers\CurrencyController::class, 'index'])->name('currencies');
        Route::post('/store-currency', [App\Http\Controllers\CurrencyController::class, 'store'])->name('store-currency');
        Route::get('/getCurrency/{id}', [App\Http\Controllers\CurrencyController::class, 'show'])->name('getCurrency');
        Route::get('/deleteCurrency/{id}', [App\Http\Controllers\CurrencyController::class, 'destroy'])->name('deleteCurrency');


        Route::get('/suppliers', [App\Http\Controllers\SupplierController::class, 'index'])->name('suppliers');
        Route::post('/store-supplier', [App\Http\Controllers\SupplierController::class, 'store'])->name('store-supplier');
        Route::get('/getSupplier/{id}', [App\Http\Controllers\SupplierController::class, 'show'])->name('getSupplier');
        Route::get('/deleteSupplier/{id}', [App\Http\Controllers\SupplierController::class, 'destroy'])->name('deleteSupplier');
        Route::get('/getUserBySupplier/{id}', [App\Http\Controllers\SupplierController::class, 'getUserBySupplier'])->name('getUserBySupplier');
        Route::get('/blockSupplier/{id}', [App\Http\Controllers\SupplierController::class, 'blockSupplier'])->name('blockSupplier');
        Route::get('/unblockSupplier/{id}', [App\Http\Controllers\SupplierController::class, 'unblockSupplier'])->name('unblockSupplier');

        Route::get('/reviews', [App\Http\Controllers\ReviewController::class, 'index'])->name('reviews');
        Route::get('/deleteReview/{id}', [App\Http\Controllers\ReviewController::class, 'destroy'])->name('deleteReview');
        Route::get('/getReview/{id}', [App\Http\Controllers\ReviewController::class, 'show'])->name('getReview');


        Route::get('/clients', [App\Http\Controllers\ClientController::class, 'index'])->name('clients');
        Route::get('/getUserByClient/{id}', [App\Http\Controllers\ClientController::class, 'getUserByClient'])->name('getUserByClient');
        Route::get('/blockClient/{id}', [App\Http\Controllers\ClientController::class, 'blockClient'])->name('blockClient');
        Route::get('/unblockClient/{id}', [App\Http\Controllers\ClientController::class, 'unblockClient'])->name('unblockClient');
        Route::get('/update-client/{id}', [App\Http\Controllers\ClientController::class, 'update'])->name('updateClient');


        Route::get('/brands', [App\Http\Controllers\BrandController::class, 'index'])->name('brands');
        Route::post('/store-brand', [App\Http\Controllers\BrandController::class, 'store'])->name('store-brand');
        Route::get('/getBrand/{id}', [App\Http\Controllers\BrandController::class, 'show'])->name('getBrand');
        Route::get('/deleteBrand/{id}', [App\Http\Controllers\BrandController::class, 'destroy'])->name('deleteBrand');

        Route::get('/departments', [App\Http\Controllers\DepartmentController::class, 'index'])->name('departments');
        Route::post('/store-department', [App\Http\Controllers\DepartmentController::class, 'store'])->name('store-department');
        Route::get('/getDepartment/{id}', [App\Http\Controllers\DepartmentController::class, 'show'])->name('getDepartment');
        Route::get('/deleteDepartment/{id}', [App\Http\Controllers\DepartmentController::class, 'destroy'])->name('deleteDepartment');
        Route::get('/getDepartmentCategories/{id}', [App\Http\Controllers\ProductController::class, 'getCats'])->name('getDepartmentCategories');
        Route::get('/getDepartmentSupplier/{id}', [App\Http\Controllers\ProductController::class, 'getDepartmentSupplier'])->name('getDepartmentSupplier');




        Route::get('/categories', [App\Http\Controllers\CategoryController::class, 'index'])->name('categories');
        Route::post('/store-category', [App\Http\Controllers\CategoryController::class, 'store'])->name('store-category');
        Route::get('/getCategory/{id}', [App\Http\Controllers\CategoryController::class, 'show'])->name('getCategory');
        Route::get('/deleteCategory/{id}', [App\Http\Controllers\CategoryController::class, 'destroy'])->name('deleteCategory');
        Route::get('/getCategorySupplier/{id}', [App\Http\Controllers\ProductController::class, 'getCategorySupplier'])->name('getCategorySupplier');


        Route::get('/products', [App\Http\Controllers\ProductController::class, 'index'])->name('products');
        Route::post('/store-product', [App\Http\Controllers\ProductController::class, 'store'])->name('store-product');
        Route::get('/getProduct/{id}', [App\Http\Controllers\ProductController::class, 'show'])->name('getProduct');
        Route::get('/deleteProduct/{id}', [App\Http\Controllers\ProductController::class, 'destroy'])->name('deleteProduct');
        Route::get('/edit-product/{id}', [App\Http\Controllers\ProductController::class, 'edit'])->name('edit-product');
        Route::get('/create-product', [App\Http\Controllers\ProductController::class, 'create'])->name('create-product');
        Route::get('/getProductCode', [App\Http\Controllers\ProductController::class, 'getProductCode'])->name('getProductCode');
        Route::post('/update-product', [App\Http\Controllers\ProductController::class, 'update'])->name('update-product');
        Route::get('/add_product_to_supplier', [App\Http\Controllers\ProductController::class, 'add_product_to_supplier'])->name('add_product_to_supplier');
        Route::post('/store_product_to_supplier', [App\Http\Controllers\ProductController::class, 'store_product_to_supplier'])->name('store_product_to_supplier');
        Route::get('/productAutoComplete/{name}', [App\Http\Controllers\ProductController::class, 'productAutoComplete'])->name('productAutoComplete');
        Route::get('/add_product_to_supplier_action/{item_id}/{supplier_id}', [App\Http\Controllers\ProductController::class, 'add_product_to_supplier_action'])->name('add_product_to_supplier_action');
        Route::get('/getSupplierProducts/{id}', [App\Http\Controllers\ProductController::class, 'getSupplierProducts'])->name('getSupplierProducts');
        Route::get('/deleteSupplierProduct/{id}', [App\Http\Controllers\SupplierProductsController::class, 'destroy'])->name('deleteSupplierProduct');
        Route::get('/getSupplierProduct/{id}', [App\Http\Controllers\SupplierProductsController::class, 'show'])->name('getSupplierProduct');
        Route::get('/showWithProductIdAndSupplierID/{product_id}/{supplier_id}', [App\Http\Controllers\SupplierProductsController::class, 'showWithProductIdAndSupplierID'])->name('showWithProductIdAndSupplierID');
        Route::get('/review_products', [App\Http\Controllers\ProductController::class, 'review_products'])->name('review_products');
        Route::get('/accept-product/{id}', [App\Http\Controllers\ProductController::class, 'Accept'])->name('accept-product');
        Route::get('/reject-product/{id}', [App\Http\Controllers\ProductController::class, 'Reject'])->name('reject-product');
        Route::get('/add_to_top/{id}', [App\Http\Controllers\ProductController::class, 'add_to_top'])->name('add_to_top');
        Route::get('/remove_from_top/{id}', [App\Http\Controllers\ProductController::class, 'remove_from_top'])->name('remove_from_top');







        Route::get('/materials', [App\Http\Controllers\MaterialController::class, 'index'])->name('materials');
        Route::post('/store-material', [App\Http\Controllers\MaterialController::class, 'store'])->name('store-material');
        Route::get('/getMaterial/{id}', [App\Http\Controllers\MaterialController::class, 'show'])->name('getMaterial');
        Route::get('/deleteMaterial/{id}', [App\Http\Controllers\MaterialController::class, 'destroy'])->name('deleteMaterial');




        Route::get('/compositions', [App\Http\Controllers\CompositionController::class, 'index'])->name('compositions');
        Route::post('/store-composition', [App\Http\Controllers\CompositionController::class, 'store'])->name('store-composition');
        Route::get('/getCompositions/{id}', [App\Http\Controllers\CompositionController::class, 'show'])->name('getCompositions');
        Route::get('/deleteCompositions/{id}', [App\Http\Controllers\CompositionController::class, 'destroy'])->name('deleteCompositions');
        Route::get('/edit-compositions/{id}', [App\Http\Controllers\CompositionController::class, 'edit'])->name('edit-compositions');
        Route::get('/create-compositions', [App\Http\Controllers\CompositionController::class, 'create'])->name('create-compositions');
        Route::post('/update-compositions', [App\Http\Controllers\CompositionController::class, 'update'])->name('update-compositions');
        Route::get('/getCompositionsCode', [App\Http\Controllers\CompositionController::class, 'getCompositionsCode'])->name('getCompositionsCode');
        Route::get('/materialAutoComplete/{name}', [App\Http\Controllers\CompositionController::class, 'materialAutoComplete'])->name('materialAutoComplete');
        Route::get('/getCompositionsItems/{id}', [App\Http\Controllers\CompositionController::class, 'getCompositionsItems'])->name('getCompositionsItems');



        Route::get('/quotationRequests', [App\Http\Controllers\QuotationRequestController::class, 'index'])->name('quotationRequests');
        Route::get('/quotationRequests-view/{id}', [App\Http\Controllers\QuotationRequestController::class, 'show'])->name('quotationRequests-view');


        Route::get('/quotations', [App\Http\Controllers\QuotationController::class, 'index'])->name('quotations');
        Route::get('/quotation-create/{request_id}', [App\Http\Controllers\QuotationController::class, 'create'])->name('quotation-create');
        Route::post('/store-quotation', [App\Http\Controllers\QuotationController::class, 'store'])->name('store-quotation');
        Route::get('/quotation_ref_number', [App\Http\Controllers\QuotationController::class, 'quotation_ref_number'])->name('quotation_ref_number');
        Route::get('/quotation-view/{id}', [App\Http\Controllers\QuotationController::class, 'show'])->name('quotation-view');



        Route::get('/users', [App\Http\Controllers\HomeController::class, 'users'])->name('users');
        Route::post('/store-user', [App\Http\Controllers\HomeController::class, 'storeUser'])->name('store-user');
        Route::get('/getUser/{id}', [App\Http\Controllers\HomeController::class, 'showUser'])->name('getUser');
        Route::get('/deleteUser/{id}', [App\Http\Controllers\HomeController::class, 'destroyUser'])->name('deleteUser');
        Route::get('/getUserProfile/{id}', [App\Http\Controllers\HomeController::class, 'getUserProfile'])->name('getUserProfile');
        Route::post('/reset-password', [App\Http\Controllers\HomeController::class, 'resetPassword'])->name('reset-password');
        Route::post('/update-supplier', [App\Http\Controllers\HomeController::class, 'updateSupplier'])->name('update-supplier');



        Route::get('/roles', [App\Http\Controllers\RolesController::class, 'index'])->name('roles');
        Route::post('/store-role', [App\Http\Controllers\RolesController::class, 'store'])->name('store-role');
        Route::get('/getRole/{id}', [App\Http\Controllers\RolesController::class, 'show'])->name('getRole');
        Route::get('/deleteRole/{id}', [App\Http\Controllers\RolesController::class, 'destroy'])->name('deleteRole');


        Route::get('/auth', [App\Http\Controllers\AuthenticationController::class, 'index'])->name('auth');
        Route::post('/store-auth', [App\Http\Controllers\AuthenticationController::class, 'store'])->name('store-auth');
        Route::get('/getAuth/{id}', [App\Http\Controllers\AuthenticationController::class, 'show'])->name('getAuth');
        Route::get('/deleteAuth/{id}', [App\Http\Controllers\AuthenticationController::class, 'destroy'])->name('deleteAuth');
        Route::get('/auth-create', [App\Http\Controllers\AuthenticationController::class, 'create'])->name('authCreate');
        Route::get('/getRoleAuthForms/{id}', [App\Http\Controllers\AuthenticationController::class, 'getRoleAuthForms'])->name('getRoleAuthForms');



        Route::get('/rates', [App\Http\Controllers\SupplierController::class, 'rates'])->name('rates');

        Route::get('/globalNews', [App\Http\Controllers\NewsController::class, 'index'])->name('globalNews');
        Route::post('/store-New', [App\Http\Controllers\NewsController::class, 'store'])->name('store-New');
        Route::get('/deleteNew/{id}', [App\Http\Controllers\NewsController::class, 'destroy'])->name('deleteNew');
        Route::get('/edit-New/{id}', [App\Http\Controllers\NewsController::class, 'edit'])->name('edit-New');
        Route::get('/create-New', [App\Http\Controllers\NewsController::class, 'create'])->name('create-New');
        Route::post('/update-New', [App\Http\Controllers\NewsController::class, 'update'])->name('update-New');


        Route::get('/ads', [App\Http\Controllers\AdsController::class, 'index'])->name('ads');
        Route::post('/store-ad', [App\Http\Controllers\AdsController::class, 'store'])->name('store-ad');
        Route::get('/getAd/{id}', [App\Http\Controllers\AdsController::class, 'show'])->name('getAd');
        Route::get('/deleteAd/{id}', [App\Http\Controllers\AdsController::class, 'destroy'])->name('deleteAd');




        Route::get('/visit_reports', [App\Http\Controllers\SiteVisitController::class, 'index'])->name('visit_reports');

        Route::get('/quotations_request_report', [App\Http\Controllers\QuotationRequestController::class, 'quotations_request_report'])->name('quotations_request_report');
        Route::post('/quotations_request_report_show', [App\Http\Controllers\QuotationRequestController::class, 'quotations_request_report_show'])->name('quotations_request_report_show');

        Route::get('/quotations_report', [App\Http\Controllers\QuotationController::class, 'quotations_report'])->name('quotations_report');
        Route::post('/quotations_report_show', [App\Http\Controllers\QuotationController::class, 'quotations_report_show'])->name('quotations_report_show');


        Route::get('/quotations_request_report_by_company', [App\Http\Controllers\QuotationController::class, 'quotations_request_report_by_company'])->name('quotations_request_report_by_company');
        Route::post('/quotations_request_report_by_company_show', [App\Http\Controllers\QuotationController::class, 'quotations_request_report_by_company_show'])->name('quotations_request_report_by_company_show');


        Route::get('/quotations_request_report_by_product', [App\Http\Controllers\QuotationController::class, 'quotations_request_report_by_product'])->name('quotations_request_report_by_product');
        Route::post('/quotations_request_report_by_product_show', [App\Http\Controllers\QuotationController::class, 'quotations_request_report_by_product_show'])->name('quotations_request_report_by_product_show');


        Route::get('/quotations_request_report_by_supplier', [App\Http\Controllers\RewardController::class, 'quotations_request_report_by_supplier'])->name('quotations_request_report_by_supplier');





        ///////////////////////////////////////////////////////////////////////////
        Route::get('/update-password/{id}', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('update-password');
        Route::post('/verify-account', [App\Http\Controllers\HomeController::class, 'verifyAccount'])->name('verify-account');





        //////////////////////////////////////////////Front Routes ////////////////////////////////
        Route::get('/profile', [App\Http\Controllers\FrontController::class, 'profile'])->name('profile');

        Route::get('/faqs', [App\Http\Controllers\FrontController::class, 'faqs'])->name('faqs');

        Route::get('/about', [App\Http\Controllers\FrontController::class, 'about'])->name('about');

        Route::get('/contact', [App\Http\Controllers\FrontController::class, 'contact'])->name('contact');

        Route::get('/all-products', [App\Http\Controllers\FrontController::class, 'products'])->name('all_products');
        Route::get('/top_products', [App\Http\Controllers\FrontController::class, 'top_products'])->name('top_products');
        Route::get('/department_products/{id}', [App\Http\Controllers\FrontController::class, 'department_products'])->name('department_products');
        Route::get('/category_products/{id}', [App\Http\Controllers\FrontController::class, 'category_products'])->name('category_products');
        Route::post('/product_search', [App\Http\Controllers\FrontController::class, 'product_search'])->name('product_search');
        Route::get('/products-view/{id}', [App\Http\Controllers\FrontController::class, 'products-view'])->name('products-view');
        Route::get('/product-view/{id}', [App\Http\Controllers\FrontController::class, 'product_view'])->name('product-view');

        Route::get('/front_news', [App\Http\Controllers\FrontController::class, 'front_news'])->name('front_news');

        Route::get('/front_ads', [App\Http\Controllers\FrontController::class, 'front_ads'])->name('front_ads');



        Route::get('/add_to_wishlist/{id}', [App\Http\Controllers\WishListController::class, 'add']) -> name('add_to_wishlist');
        Route::get('/remove_from_wishlist/{id}', [App\Http\Controllers\WishListController::class, 'remove']) -> name('remove_from_wishlist');
        Route::get('/wishlist', [App\Http\Controllers\WishListController::class, 'index']) -> name('wishlist');


        Route::get('/add_to_cart/{id}', [App\Http\Controllers\CartController::class, 'add']) -> name('add_to_cart');
        Route::get('/remove_from_cart/{id}', [App\Http\Controllers\CartController::class, 'remove']) -> name('remove_from_cart');
        Route::get('/cart', [App\Http\Controllers\CartController::class, 'index']) -> name('cart');
        Route::get('/open-cart', [App\Http\Controllers\CartController::class, 'open']) -> name('open-cart');
        Route::get('/empty-cart', [App\Http\Controllers\CartController::class, 'empty']) -> name('empty-cart');
        Route::get('/update_product_Cart_quantity/{id}/{qnt}', [App\Http\Controllers\CartController::class, 'updateQnt']) -> name('update_product_Cart_quantity');

        Route::get('/check-auth', function () {
            return response()->json(['authenticated' => auth()->check()]);
        });
        Route::get('/checkOut', [App\Http\Controllers\CartController::class, 'checkOut'])->name('checkOut') ->middleware('auth');;

        Route::get('/terms', [App\Http\Controllers\FrontController::class, 'terms'])->name('terms');

        Route::post('/update-client', [App\Http\Controllers\ClientController::class, 'update'])->name('update-client');

        Route::post('/newsletter', [App\Http\Controllers\FrontController::class, 'newsletter'])->name('newsletter');

        Route::get('/login', [\App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [\App\Http\Controllers\Auth\LoginController::class, 'login']);

        Route::get('/sendWhatsAppMessage', [\App\Http\Controllers\CartController::class, 'sendWhatsAppMessage'])->name('sendWhatsAppMessage');


        Route::get('/request-view/{id}', [App\Http\Controllers\FrontController::class, 'RequestQuotationsView']) -> name('request-view');
        Route::get('/request-accept/{id}', [App\Http\Controllers\FrontController::class, 'RequestQuotationAccept']) -> name('request-accept');
        Route::get('/request-cancel/{id}', [App\Http\Controllers\FrontController::class, 'RequestCancel']) -> name('request-cancel');





        Route::get('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
        Route::post('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'register']);
        Auth::routes();
    }
);



