<?php

namespace Obelaw\Framework\Compiles\Scan\Modules;

use Obelaw\Compiles\Abstracts\Compile;
use Obelaw\Framework\Schema\Install\Install;

class InstallCompile extends Compile
{
    public $driverKey = 'obelawInstall';

    public function scanner($modules)
    {
        $outInstall = [];

        foreach ($modules as $id => $path) {
            $installFile = $path . DIRECTORY_SEPARATOR . 'etc' . DIRECTORY_SEPARATOR . 'install.php';

            if (file_exists($installFile)) {
                $install = require $installFile;

                $installSchema = new Install;
                $installSchema->setBundleId($id);
                $install->commands($installSchema);

                $outInstall = array_merge($outInstall, $installSchema->getCommands());
            }
        }

        return $outInstall;
    }
}
