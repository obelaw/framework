<?php

namespace Obelaw\Framework\Pipeline\Bundles;

use Obelaw\Framework\BundleRegistrar;
use Obelaw\Facades\Bundles;
use Obelaw\Framework\Pipeline\Bundles\Compiling\Configurations\ProvidersCompile;
use Obelaw\Framework\Pipeline\Bundles\Compiling\Plugin\ACLPluginCompile;
use Obelaw\Framework\Pipeline\Bundles\Compiling\Plugin\FormsPluginCompile;
use Obelaw\Framework\Pipeline\Bundles\Compiling\Plugin\GridsPluginCompile;
use Obelaw\Framework\Pipeline\Bundles\Compiling\Plugin\MigrationsPluginCompile;
use Obelaw\Framework\Pipeline\Bundles\Compiling\Plugin\NavbarPluginCompile;
use Obelaw\Framework\Pipeline\Bundles\Compiling\Plugin\PluginCompile;
use Obelaw\Framework\Pipeline\Bundles\Compiling\Plugin\RoutesPluginCompile;
use Obelaw\Framework\Pipeline\Bundles\Compiling\Plugin\ViewsPluginCompile;

class BundlesSetup
{
    public function __construct(
        public $modulesPaths = [],
        public $pluginsPaths = [],
        private $pluginCompiles = [],
    ) {

        if (ExternalDirectory::hasDirectory()) {
            ExternalDirectory::scan();
        }

        $this->modulesPaths = BundleRegistrar::getPaths(BundleRegistrar::MODULE);

        $this->pluginsPaths = BundleRegistrar::getPaths(BundleRegistrar::PLUGIN);

        $this->pluginCompiles = [
            PluginCompile::class,
            NavbarPluginCompile::class,
            RoutesPluginCompile::class,
            FormsPluginCompile::class,
            GridsPluginCompile::class,
            ViewsPluginCompile::class,
            ACLPluginCompile::class,
            MigrationsPluginCompile::class,
        ];
    }

    public function run(string $cachePrefix = null, array $actives = null)
    {
        $cachePrefix = $cachePrefix ?? Bundles::getCachePrefix();
        $actives = $actives ?? Bundles::getActives();

        if (!is_null($actives)) {
            $inactives = array_diff(array_keys($this->modulesPaths), $actives);

            foreach ($inactives as $unactive) {
                unset($this->modulesPaths[$unactive]);
            }

            $pluginsInactives = array_diff(array_keys($this->pluginsPaths), $actives);

            foreach ($pluginsInactives as $pluginUnactive) {
                unset($this->pluginsPaths[$pluginUnactive]);
            }
        }

        if ($this->pluginsPaths) {
            foreach ($this->pluginCompiles as $compile) {
                $compileObj = new $compile($cachePrefix);
                $compileObj->manage($this->pluginsPaths);
            }
        }

        if ($allProviders = BundleRegistrar::getProviders()) {
            (new ProvidersCompile($cachePrefix))->manage($allProviders);
        }
    }
}
