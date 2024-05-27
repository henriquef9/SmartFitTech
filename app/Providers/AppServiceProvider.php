<?php

namespace App\Providers;

use App\Repositories\Contracts\AlunoRepositoryInterface;
use App\Repositories\Contracts\PaginationInterface;
use App\Repositories\Eloquent\AlunoEloquentORM;
use App\Repositories\PaginationPresenter;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            AlunoRepositoryInterface::class,
            AlunoEloquentORM::class
        );

        $this->app->bind(
            PaginationInterface::class,
            PaginationPresenter::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
