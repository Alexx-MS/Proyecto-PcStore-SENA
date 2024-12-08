<?php

namespace App\Providers;

use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\View;
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
    public function boot()
    {
        // Compartir las categorías con la vista 'layouts.app'
        View::composer('layouts.app', function ($view) {
            $categories = Category::all(); 
            $view->with('categories', $categories); 
        });

        // Compartir los productos con todas las vistas
        View::composer('*', function ($view) {
            $products = Product::all(); 
            $view->with('products', $products);
        });

        View::composer('*', function ($view) {
            $users = User::all(); 
            $view->with('users', $users);
        });
    }

}