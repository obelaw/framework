<?php

namespace Obelaw\Framework;

use Composer\InstalledVersions;
use Illuminate\Foundation\Console\AboutCommand;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Livewire\Livewire;
use Obelaw\Facades\Bundles;
use Obelaw\Framework\Base\ServiceProviderBase;
use Obelaw\Framework\Compiles\Scan\Modules\InstallCompile;
use Obelaw\Framework\Console\InstallCommand;
use Obelaw\Framework\Console\MigrateCommand;
use Obelaw\Framework\Console\OAboutCommand;
use Obelaw\Framework\Console\SeedCommand;
use Obelaw\Framework\Console\SetupCommand;
use Obelaw\Framework\Livewire\Account\SettingsPage;
use Obelaw\Framework\Livewire\Components\Account\UpdatePassword;
use Obelaw\Framework\Managers\Middlewares;
use Obelaw\Framework\Mixin\BundlesMixin;
use Obelaw\Framework\Pipeline\Locale\Languages;
use Obelaw\Framework\Utils\Currency;
use Obelaw\Framework\Views\Components\Amount;
use Obelaw\Framework\Views\Components\Loading;
use Obelaw\Render\BundlesScaneers;
use Obelaw\Schema\Scaneer\Scaneer;

class ObelawServiceProvider extends ServiceProviderBase
{

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        Languages::setLanguage('ar', 'العربية');

        $this->app->singleton('manager.middleware', Middlewares::class);

        $this->mergeConfigFrom(
            __DIR__ . '/../config/obelaw.php',
            'obelaw'
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('currency', fn () => Currency::symbol());

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
                __DIR__ . '/../config/obelaw.php' => config_path('obelaw.php'),
            ], ['obelaw:config']);

            $this->publishes([
                __DIR__ . '/../public/assets' => public_path('vendor/obelaw'),
            ], 'obelaw:assets');
        }

        View::composer('*', function ($view) {
            if ($user = Auth::guard('obelaw')->user()) {
                $view->with('admin', $user);
            }
        });

        // Livewire::component('obelaw-auth-login', LoginPage::class);
        BundlesScaneers::mergeModuleScaneers(function (Scaneer $scaneers) {
            $scaneers->add(InstallCompile::class);
        });

        Livewire::component('obelaw-account-settings', SettingsPage::class);
        Livewire::component('obelaw-account-settings-update-password', UpdatePassword::class);

        Bundles::mixin(new BundlesMixin());
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
