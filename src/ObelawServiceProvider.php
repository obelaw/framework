<?php

namespace Obelaw\Framework;

use Obelaw\Framework\Base\ServiceProviderBase;
use Obelaw\Framework\Console\SetupCommand;
use Obelaw\Framework\Views\Builder\FormBuilder;
use Obelaw\Framework\Views\Builder\NavbarBuilder;
use Obelaw\Framework\Views\Layout\DashboardLayout;
use Illuminate\Routing\Router;
use Obelaw\Framework\ACL\Http\Middleware\PermissionMiddleware;

class ObelawServiceProvider extends ServiceProviderBase
{

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(Router $router)
    {
        //
        $router->aliasMiddleware('obelawPermission', PermissionMiddleware::class);

        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'obelaw');

        $this->loadViewComponentsAs('obelaw', $this->viewComponents());

        if ($this->app->runningInConsole()) {

            $this->commands([
                SetupCommand::class,
            ]);

            $this->publishes([
                __DIR__ . '/../public/assets' => public_path('vendor/obelaw'),
            ], 'obelaw:assets');

            $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        }
    }

    private function viewComponents(): array
    {
        return [
            DashboardLayout::class,
            FormBuilder::class,
            NavbarBuilder::class,
        ];
    }
}
