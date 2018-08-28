<?php

namespace Grundmanis\Laracms\Modules\Banners\Providers;

use Grundmanis\Laracms\Modules\Pages\Exception\Handler;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;
use Grundmanis\Laracms\Facades\MenuFacade;

class BannerProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../views', 'laracms.banner');
        $this->loadMigrationsFrom(__DIR__ . '/../migrations');
        $this->loadRoutesFrom(__DIR__ . '/../laracms_banners_routes.php');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->addMenuRoutes();
    }

    private function addMenuRoutes()
    {
        $menu = [
            'Banners' => 'laracms.banners',
        ];

        MenuFacade::addMenu($menu);
    }

}
