<?php

namespace App\Providers;

use App\Interfaces\ItemBrandInterface;
use App\Interfaces\ItemCategoryInterface;
use App\Interfaces\ItemMasterInterface;
use App\Interfaces\ProductInterface;
use App\Repositories\ItemBrandRepository;
use App\Repositories\ItemCategoryRepository;
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
        $this->app->bind(ItemBrandInterface::class, ItemBrandRepository::class);
        $this->app->bind(ItemCategoryInterface::class, ItemCategoryRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);
    }
}
