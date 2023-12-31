<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

// Interface
use App\Contract\Repository\BaseCachableRepositoryInterface;
use App\Contract\Repository\BaseRepositoryInterface;
use App\Contract\Repository\UserRepositoryInterface;
use App\Contract\Repository\BookRepositoryInterface;
use App\Contract\Repository\ReviewRepositoryInterface;
use App\Contract\Repository\ProductRepositoryInterface;
use App\Contract\Repository\CartRepositoryInterface;
use App\Contract\Repository\CommentRepositoryInterface;
use App\Contract\Repository\OrderRepositoryInterface;
use App\Contract\Repository\OrderDetailRepositoryInterface;
use App\Contract\Repository\ChapterRepositoryInterface;
use App\Contract\Repository\AffiliatorRepositoryInterface;
use App\Contract\Repository\PayAffiliateRepositoryInterface;

// Implement
use App\Repositories\BaseRepository;
use App\Repositories\UserRepository;
use App\Repositories\BookRepository;
use App\Repositories\ReviewRepository;
use App\Repositories\ProductRepository;
use App\Repositories\CartRepository;
use App\Repositories\CommentRepository;
use App\Repositories\OrderRepository;
use App\Repositories\OrderDetailRepository;
use App\Repositories\ChapterRepository;
use App\Repositories\AffiliatorRepository;
use App\Repositories\PayAffiliateRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(BaseRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(BookRepositoryInterface::class, BookRepository::class);
        $this->app->bind(ReviewRepositoryInterface::class, ReviewRepository::class);
        $this->app->bind(CommentRepositoryInterface::class, CommentRepository::class);
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
        $this->app->bind(CartRepositoryInterface::class, CartRepository::class);
        $this->app->bind(OrderRepositoryInterface::class, OrderRepository::class);
        $this->app->bind(OrderDetailRepositoryInterface::class, OrderDetailRepository::class);
        $this->app->bind(ChapterRepositoryInterface::class, ChapterRepository::class);
        $this->app->bind(AffiliatorRepositoryInterface::class, AffiliatorRepository::class);
        $this->app->bind(PayAffiliateRepositoryInterface::class, PayAffiliateRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
