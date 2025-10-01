<?php

namespace App\Providers;

use App\Models\Department;
use App\Services\TwilioService;
use Illuminate\Support\ServiceProvider;
use  Illuminate\Support\Facades\Schema;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(TwilioService::class, function ($app) {
            return new TwilioService();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);
        View::composer('*', function ($view) {
            $cartCount = count(session()->get('cart', []));
            $wishlistCount = count(session()->get('wishlist', []));
            $departments = Department::all();
            $view->with([
                'wishlistCount' => $wishlistCount,
                'departments' => $departments,
                'cartCount' => $cartCount
            ]);;
        });
    }
}
