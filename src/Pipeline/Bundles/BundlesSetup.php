<?php

namespace Obelaw\Framework\Pipeline\Bundles;

use Obelaw\Framework\BundleRegistrar;
use Obelaw\Framework\Facades\Bundles;
use Obelaw\Framework\Pipeline\Bundles\Compiling\ACLCompile;
use Obelaw\Framework\Pipeline\Bundles\Compiling\FormsCompile;
use Obelaw\Framework\Pipeline\Bundles\Compiling\GridsCompile;
use Obelaw\Framework\Pipeline\Bundles\Compiling\InfoCompile;
use Obelaw\Framework\Pipeline\Bundles\Compiling\MigrationsCompile;
use Obelaw\Framework\Pipeline\Bundles\Compiling\NavbarCompile;
use Obelaw\Framework\Pipeline\Bundles\Compiling\RoutesCompile;

class BundlesSetup
{
    public function __construct(
        public $modulesPaths = [],
    ) {
        $this->modulesPaths = BundleRegistrar::getPaths(BundleRegistrar::MODULE);
    }

    public function run(string $cachePrefix = null, array $available = null)
    {
        $cachePrefix = $cachePrefix ?? Bundles::getCachePrefix();
        $available = $available ?? Bundles::getActives();

        $infoCompile = new InfoCompile($cachePrefix, $available);
        $infoCompile->manage($this->modulesPaths);

        $formsCompile = new FormsCompile($cachePrefix, $available);
        $formsCompile->manage($this->modulesPaths);

        $gridsCompile = new GridsCompile($cachePrefix, $available);
        $gridsCompile->manage($this->modulesPaths);

        $routesCompile = new RoutesCompile($cachePrefix, $available);
        $routesCompile->manage($this->modulesPaths);

        $migrationsCompile = new MigrationsCompile($cachePrefix, $available);
        $migrationsCompile->manage($this->modulesPaths);

        $navbarCompile = new NavbarCompile($cachePrefix, $available);
        $navbarCompile->manage($this->modulesPaths);

        $ACLCompile = new ACLCompile($cachePrefix, $available);
        $ACLCompile->manage($this->modulesPaths);
    }
}
