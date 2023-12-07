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
use App\Contract\Service\CommentServiceInterface;
use App\Contract\Service\OrderServiceInterface;
use App\Contract\Service\ChapterServiceInterface;

// Implement
use App\Services\BaseService;
use App\Services\AuthService;
use App\Services\BookService;
use App\Services\ReviewService;
use App\Services\ProductService;
use App\Services\CartService;
use App\Services\CommentService;
use App\Services\OrderService;
use App\Services\ChapterService;

use Carbon\Carbon;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Pagination\Paginator;

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
        $this->app->bind(CommentServiceInterface::class, CommentService::class);
        $this->app->bind(ProductServiceInterface::class, ProductService::class);
        $this->app->bind(CartServiceInterface::class, CartService::class);
        $this->app->bind(OrderServiceInterface::class, OrderService::class);
        $this->app->bind(ChapterServiceInterface::class, ChapterService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        config(['app.locale' => 'id']);
        Carbon::setLocale('id');

        VerifyEmail::toMailUsing(function (object $notifiable, string $url) {
            return (new MailMessage)
                ->subject('Verifikasi Email')
                ->line('Terimakasih sudah mendaftar akun pada Audiobook Subiakto,')
                ->line('Klik button berikut untuk verifikasi email kamu.')
                ->action('Verify Email', $url)
                ->line('Jika kamu tidak merasa membuat akun, abaikan pesan ini.');
        });

        

        ResetPassword::toMailUsing(function (object $notifiable, string $token) {
            $url = env('APP_URL') . '/password/reset/' . $token . '?email=' . str_replace("@" , '%40' , $notifiable->email);
          
            return (new MailMessage)
                ->subject('Reset Password')
                ->line('Kamu mendapat pesan ini karena kami menerima permintaan reset password dari akun kamu.')
                ->action('Reset Password', $url)
                ->line('link ini akan kedaluwarsa dalam ' . env('PASSWORD_RESET_EXPIRE') . ' menit.')
                ->line('Jika kamu tidak merasa melakukan permintaan, abaikan pesan ini.');
        });
    }
}
