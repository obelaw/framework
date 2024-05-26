<?php

namespace Obelaw\UI\Compiles\Scan\Modules;

use Obelaw\Compiles\Abstracts\Compile;
use Obelaw\Facades\Bundles;
use Obelaw\UI\Schema\Configurations\Configurations;

class ConfigurationsCompile extends Compile
{
    public $driverKey = 'obelawConfigurations';

    public function scanner($paths)
    {
        $outoutConfigurations = [];


        foreach ($paths as $id => $path) {
            $pathConfigurationsFile = $path . DIRECTORY_SEPARATOR . 'etc' . DIRECTORY_SEPARATOR . 'configurations.php';

            if (file_exists($pathConfigurationsFile)) {

                $configurationsSchema = new Configurations;

                $configurationsClass = require $pathConfigurationsFile;
                $configurationsClass->configs($configurationsSchema);

                $outoutConfigurations = array_merge($outoutConfigurations, [$id => [
                    'module' => Bundles::getModules($id),
                    'configs' => $configurationsSchema->getConfigs(),
                ]]);
            }
        }

        return $outoutConfigurations;
    }
}
