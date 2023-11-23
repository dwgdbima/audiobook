<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

// Interface
use App\Contract\Repository\BaseCachableRepositoryInterface;
use App\Contract\Repository\BaseRepositoryInterface;
use App\Contract\Repository\UserRepositoryInterface;
use App\Contract\Repository\BookRepositoryInterface;

// Implement
use App\Repositories\BaseRepository;
use App\Repositories\UserRepository;
use App\Repositories\BookRepository;

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
