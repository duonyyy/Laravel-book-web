<?php

namespace App\Providers;

use App\Models\About;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Setting;
use App\Models\Social;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->composer('*', function ($view) {
            $categories = Category::all();
            $listSocial = Social::all();
            $about = About::first();
            $setting = Setting::first();

            $cart = Cart::where('user_id', Auth::id())
            ->with('cartDetails:id,cart_id,product_id,quantity')
            ->with('cartDetails.product:id,name,price')
            ->with('cartDetails.product.images:id,product_id,image_url')
            ->first();

            $view->with(compact('categories', 'listSocial', 'cart', 'setting','about' ));
        });
    }
}
