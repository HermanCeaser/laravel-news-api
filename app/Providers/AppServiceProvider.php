<?php

namespace App\Providers;

use App\Services\Contracts\NewsService;
use App\Services\NewsAPI\NewsApiService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->singleton(
            abstract: NewsService::class,
            concrete: fn () => new NewsApiService(
                baseUrl: strval(config('services.news-api.url')),
                apiToken: strval(config('services.news-api.key')),
            ),
        );
    }
}
