<?php

namespace App\Providers;

use App\Interfaces\ItemMasterInterface;
use App\Interfaces\ProductInterface;
use App\Repositories\ItemMasterRepository;
use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ProductInterface::class, ProductRepository::class);
        $this->app->bind(ItemMasterInterface::class, ItemMasterRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);
    }
}
