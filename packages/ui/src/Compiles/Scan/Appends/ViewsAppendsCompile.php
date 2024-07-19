<?php

namespace Obelaw\UI\Compiles\Scan\Appends;

use Illuminate\Console\OutputStyle;
use Obelaw\UI\Schema\View\Button;
use Obelaw\UI\Schema\View\Tabs;
use Obelaw\UI\Compiles\Scan\Modules\ViewsCompile;

class ViewsAppendsCompile extends ViewsCompile
{
    public function scanner($paths, OutputStyle $consoleOutput = null)
    {
        $outViews = [];

        foreach ($paths as $id => $path) {
            $_view = [];

            if (is_dir($path . DIRECTORY_SEPARATOR . 'etc/appends/views')) {

                foreach (glob($path . DIRECTORY_SEPARATOR . 'etc/appends/views/*.php') as $filename) {
                    $viewClass = require $filename;
                    $viewClass = new $viewClass;

                    //Columns class
                    $tabs = new Tabs;
                    $buttons = new Button;

                    if (method_exists($viewClass, 'tabs')) {
                        $viewClass->tabs($tabs);
                    }

                    if (method_exists($viewClass, 'magicButtons')) {
                        $viewClass->magicButtons($buttons);
                    }

                    $_view[$viewClass->viewId] = [
                        'tabs' => $tabs->getTabs(),
                        'buttons' => (method_exists($viewClass, 'magicButtons')) ? $buttons->getButtons() : null,
                    ];
                }

                $outViews = array_merge($outViews, $_view);
            }
        }

        $append = [];
        foreach ($this->driver->get('obelawViews') as $id => $view) {
            if (isset($outViews[$id])) {

                if (isset($outViews[$id]['tabs'])) {
                    $append[$id]['tabs'] = array_merge($view['tabs'] ?? [], $outViews[$id]['tabs']);
                } else {
                    $append[$id]['tabs'] = $view['tabs'];
                }

                if (isset($outViews[$id]['buttons'])) {
                    $append[$id]['buttons'] = array_merge($view['buttons'] ?? [], $outViews[$id]['buttons']);
                } else {
                    $append[$id]['buttons'] = $view['buttons'];
                }
            } else {
                $append[$id] = $view;
            }
        }

        return $append;
    }
}
