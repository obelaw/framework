<?php

namespace Obelaw\Framework;

use Composer\InstalledVersions;
use Illuminate\Foundation\Console\AboutCommand;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Livewire\Livewire;
use Obelaw\Framework\ACL\Http\Middleware\PermissionMiddleware;
use Obelaw\Framework\Base\ServiceProviderBase;
use Obelaw\Framework\Console\InstallCommand;
use Obelaw\Framework\Console\MigrateCommand;
use Obelaw\Framework\Console\OAboutCommand;
use Obelaw\Framework\Console\SeedCommand;
use Obelaw\Framework\Console\SetupCommand;
use Obelaw\Framework\Livewire\Account\SettingsPage;
use Obelaw\Framework\Livewire\Auth\LoginPage;
use Obelaw\Framework\Livewire\Components\Account\UpdatePassword;
use Obelaw\Framework\Pipeline\Locale\Languages;
use Obelaw\Framework\Utils\Currency;
use Obelaw\Framework\Views\Components\Amount;
use Obelaw\Framework\Views\Components\Loading;

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
        Blade::directive('currency', fn () => Currency::symbol());

        $router->aliasMiddleware('obelawPermission', PermissionMiddleware::class);

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'obelaw');

        $this->loadViewComponentsAs('obelaw', $this->viewComponents());

        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'obelaw');

        if ($this->app->runningInConsole()) {

            $this->bootAboutCommand();

            $this->commands([
                OAboutCommand::class,
                InstallCommand::class,
                SetupCommand::class,
                MigrateCommand::class,
                SeedCommand::class,
            ]);

            $this->publishes([
                __DIR__ . '/../public/assets' => public_path('vendor/obelaw'),
            ], 'obelaw:assets');
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
            // DashboardLayout::class,
            // FormBuilder::class,
            // NavbarBuilder::class,

            Amount::class,
            Loading::class,

            // TextField::class,
            // SelectField::class,
            // TextareaField::class,
            // DateField::class,
            // CheckboxField::class,
        ];
    }

    private function bootAboutCommand()
    {
        if (class_exists(AboutCommand::class) && class_exists(InstalledVersions::class)) {
            AboutCommand::add('Obelaw Environment', [
                'Obelaw Version' => InstalledVersions::getPrettyVersion('obelaw/framework'),
            ]);
        }
    }
}
