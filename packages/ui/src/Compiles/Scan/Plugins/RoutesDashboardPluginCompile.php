<?php

namespace Obelaw\UI\Compiles\Scan\Plugins;

use Obelaw\UI\Compiles\Scan\Modules\RoutesDashboardCompile;

class RoutesDashboardPluginCompile extends RoutesDashboardCompile
{
    public function scanner($paths)
    {
        $this->routes = $this->driver->get('obelawDashboardRoutes');

        $outRoutes = [];
        foreach ($paths as $id => $path) {
            $pathRoutesFile = $path . DIRECTORY_SEPARATOR . 'etc' . DIRECTORY_SEPARATOR . 'routes' . DIRECTORY_SEPARATOR . 'dashboard.php';

            if (file_exists($pathRoutesFile)) {
                $outRoutes[$id] = $pathRoutesFile;
            }
        }

        return array_merge($this->routes, $outRoutes);
    }
}
