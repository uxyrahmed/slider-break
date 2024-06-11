<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class TallstackuiServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        TallStackUi::personalize()
            ->form('input')
            ->block('input.class.base', 'w-full rounded-full')
            ->and()
            ->avatar()
            ->block('wrapper.sizes.sm', 'w-8 h-8 text-xs')
    }
}
