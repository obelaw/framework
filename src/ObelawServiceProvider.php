<?php

namespace Obelaw\Framework;

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Livewire\Livewire;
use Obelaw\Framework\ACL\Http\Middleware\PermissionMiddleware;
use Obelaw\Framework\Base\ServiceProviderBase;
use Obelaw\Framework\Console\InstallCommand;
use Obelaw\Framework\Console\SetupCommand;
use Obelaw\Framework\Livewire\Account\SettingsPage;
use Obelaw\Framework\Livewire\Auth\LoginPage;
use Obelaw\Framework\Livewire\Components\Account\UpdatePassword;
use Obelaw\Framework\Pipeline\Identification\Http\Middleware\IdentifierMiddleware;
use Obelaw\Framework\Pipeline\Locale\Languages;
use Obelaw\Framework\Views\Builder\Form\CheckboxField;
use Obelaw\Framework\Views\Builder\Form\DateField;
use Obelaw\Framework\Views\Builder\Form\SelectField;
use Obelaw\Framework\Views\Builder\Form\TextareaField;
use Obelaw\Framework\Views\Builder\Form\TextField;
use Obelaw\Framework\Views\Builder\FormBuilder;
use Obelaw\Framework\Views\Builder\NavbarBuilder;
use Obelaw\Framework\Views\Components\Amount;
use Obelaw\Framework\Views\Layout\DashboardLayout;

class ObelawServiceProvider extends ServiceProviderBase
{

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        config([
            'auth.guards.obelaw' => array_merge([
                'driver' => 'session',
                'provider' => 'obelaw',
            ], config('auth.guards.store', [])),
        ]);

        config([
            'auth.providers.obelaw' => array_merge([
                'driver' => 'eloquent',
                'model' => \Obelaw\Framework\ACL\Models\Admin::class,
            ], config('auth.providers.obelaw', [])),
        ]);

        Languages::setLanguage('ar', 'العربية');
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
        $router->aliasMiddleware('obelawIdentifier', IdentifierMiddleware::class);

        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'obelaw');

        $this->loadViewComponentsAs('obelaw', $this->viewComponents());

        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'obelaw');

        if ($this->app->runningInConsole()) {

            $this->commands([
                InstallCommand::class,
                SetupCommand::class,
            ]);

            $this->publishes([
                __DIR__ . '/../public/assets' => public_path('vendor/obelaw'),
            ], 'obelaw:assets');

            $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        }

        View::composer('*', function ($view) {
            if ($user = Auth::guard('obelaw')->user()) {
                $view->with('admin', $user);
            }
        });

        Livewire::component('obelaw-auth-login', LoginPage::class);

        Livewire::component('obelaw-account-settings', SettingsPage::class);
        Livewire::component('obelaw-account-settings-update-password', UpdatePassword::class);
    }

    private function viewComponents(): array
    {
        return [
            DashboardLayout::class,
            FormBuilder::class,
            NavbarBuilder::class,

            Amount::class,

            TextField::class,
            SelectField::class,
            TextareaField::class,
            DateField::class,
            CheckboxField::class,
        ];
    }
}
