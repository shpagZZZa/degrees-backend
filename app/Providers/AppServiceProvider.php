<?php

namespace App\Providers;

use App\Service\AnswerService;
use App\Service\AuthService;
use App\Service\CompanyService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CompanyService::class, function ($app) {
            return new CompanyService();
        });
        $this->app->bind(AuthService::class, function ($app) {
            return new AuthService();
        });
        $this->app->bind(AnswerService::class, function ($app) {
            return new AnswerService();
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
    }
}
