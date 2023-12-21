<?php

namespace Obelaw\Framework\Pipeline\Bundles\Compiling;

use Illuminate\Support\Facades\Cache;
use Obelaw\Framework\Builder\Build\View\Button;
use Obelaw\Framework\Builder\Build\View\Tabs;

class ViewsCompile
{
    public $count = 0;

    public function __construct(
        protected $cachePrefix = null,
    ) {
    }

    public function mergeViews($paths)
    {
        $outViews = [];

        foreach ($paths as $id => $path) {
            $_view = [];

            if (is_dir($path . DIRECTORY_SEPARATOR . 'etc/views')) {
                foreach (glob($path . DIRECTORY_SEPARATOR . 'etc/views/*.php') as $filename) {
                    $viewClass = require $filename;
                    $viewClass = new $viewClass;

                    //Columns class
                    $tabs = new Tabs;
                    $buttons = new Button;

                    $viewClass->tabs($tabs);

                    if (method_exists($viewClass, 'magicButtons')) {
                        $viewClass->magicButtons($buttons);
                    }

                    $_view[$id . '_' . basename($filename, '.php')] = [
                        'tabs' => $tabs->getTabs(),
                        'buttons' => (method_exists($viewClass, 'magicButtons')) ? $buttons->getButtons() : null,
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
