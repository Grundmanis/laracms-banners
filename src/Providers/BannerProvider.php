<?php

namespace Grundmanis\Laracms\Modules\Banners\Providers;

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
            'admin.menu.banners' => 'laracms.banners',
        ];

        MenuFacade::addMenu($menu);
    }

}
