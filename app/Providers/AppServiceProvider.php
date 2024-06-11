<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use TallStackUi\Facades\TallStackUi;
class AppServiceProvider extends ServiceProvider
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
            ->alert()
            ->block('wrapper', 'p-4 bg-blue-500/20 border-l-4 border-blue-500');
    }
}
