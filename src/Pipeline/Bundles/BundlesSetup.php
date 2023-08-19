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
        private $compiles = [],
    ) {

        if (ExternalDirectory::hasDirectory()) {
            ExternalDirectory::scan();
        }

        $this->modulesPaths = BundleRegistrar::getPaths(BundleRegistrar::MODULE);

        $this->compiles = [
            InfoCompile::class,
            FormsCompile::class,
            GridsCompile::class,
            RoutesCompile::class,
            MigrationsCompile::class,
            NavbarCompile::class,
            ACLCompile::class,
        ];
    }

    public function run(string $cachePrefix = null, array $available = null)
    {
        $cachePrefix = $cachePrefix ?? Bundles::getCachePrefix();
        $available = $available ?? Bundles::getActives();

        foreach ($this->compiles as $compile) {
            $compileObj = new $compile($cachePrefix, $available);
            $compileObj->manage($this->modulesPaths);
        }
    }
}
