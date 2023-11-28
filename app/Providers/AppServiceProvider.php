<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

// Interface
use App\Contract\Service\BaseServiceInterface;
use App\Contract\Service\AuthServiceInterface;
use App\Contract\Service\BookServiceInterface;
use App\Contract\Service\ReviewServiceInterface;
use App\Contract\Service\ProductServiceInterface;
use App\Contract\Service\CartServiceInterface;
use App\Contract\Service\OrderServiceInterface;

// Implement
use App\Services\BaseService;
use App\Services\AuthService;
use App\Services\BookService;
use App\Services\ReviewService;
use App\Services\ProductService;
use App\Services\CartService;
use App\Services\OrderService;

use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(BaseServiceInterface::class, BaseService::class);
        $this->app->bind(AuthServiceInterface::class, AuthService::class);
        $this->app->bind(BookServiceInterface::class, BookService::class);
        $this->app->bind(ReviewServiceInterface::class, ReviewService::class);
        $this->app->bind(ProductServiceInterface::class, ProductService::class);
        $this->app->bind(CartServiceInterface::class, CartService::class);
        $this->app->bind(OrderServiceInterface::class, OrderService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        config(['app.locale' => 'id']);
        Carbon::setLocale('id');
    }
}
