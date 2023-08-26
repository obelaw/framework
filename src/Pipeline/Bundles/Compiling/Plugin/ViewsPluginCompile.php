<?php

namespace Obelaw\Framework\Pipeline\Bundles\Compiling\Plugin;

use Illuminate\Support\Facades\Cache;
use Obelaw\Framework\Builder\Build\View\Tabs;

class ViewsPluginCompile
{
    public $count = 0;

    public function __construct(
        protected $cachePrefix = null,
    ) {
    }

    public function mergeViews($paths)
    {
        $outViews = Cache::get($this->cachePrefix . 'obelawViews', []);;

        foreach ($paths as $id => $path) {
            $_view = [];

            if (is_dir($path . DIRECTORY_SEPARATOR . 'etc/views')) {
                foreach (glob($path . DIRECTORY_SEPARATOR . 'etc/views/*.php') as $filename) {
                    $viewClass = require $filename;
                    $viewClass = new $viewClass;

                    //Columns class
                    $tabs = new Tabs;

                    $viewClass->tabs($tabs);

                    $_view[$id . '_' . basename($filename, '.php')] = [
                        'tabs' => $tabs->getTabs(),
                    ];
                }
                $outViews = array_merge($outViews, $_view);
            }
        }

        return $outViews;
    }

    public function cacheViews($views)
    {
        Cache::forever($this->cachePrefix . 'obelawViews', $views);
    }

    public function manage($paths)
    {
        $views = $this->mergeViews($paths);
        $this->cacheViews($views);
        $this->count = count($views);
    }
}
