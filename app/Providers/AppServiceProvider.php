<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

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
        
        
        View::composer('*', function ($view) {
            $cartItems = [];
            if (Auth::check()) {
                $cartItems = Cart::with('product')
                ->where('user_id', auth::id())
                ->get();
                
            }
            
            //pastikan ini collection bukan array
            $view->with('cartItems', $cartItems);
        });
    }
}
