<?php

namespace App\Providers;

use App\Services\Contracts\NewsService;
use App\Services\NewsApi\NewsApiService;
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
                key: strval(config('services.news-api.key')),
                timeout: env(config('services.github.timeout')),
                retryTimes: intval(config('services.github.retry.times')),
                retrySleep: intval(config('services.github.retry.sleep')),

            ),
        );
    }
}
