<?php

namespace Obelaw\Framework\Modules;

use Illuminate\Support\Facades\Cache;
use Obelaw\Framework\Builder\Build\Grid\Bottom;
use Obelaw\Framework\Builder\Build\Grid\CTA;
use Obelaw\Framework\Builder\Build\Grid\Table;

class GridsManagement
{
    public static function mergeGrids($modules)
    {
        $outGrids = [];

        foreach ($modules as $id => $data) {
            $_grid = [];

            if (is_dir($data['root'] . '/grids')) {
                foreach (glob($data['root'] . '/grids/*.php') as $filename) {
                    $gridClass = include($filename);
                    $gridClass = new $gridClass;


                    //Columns class
                    $table = new Table;
                    $CTA = new CTA;
                    $bottom = new Bottom;

                    if (method_exists($gridClass, 'createBottom')) {
                        $gridClass->createBottom($bottom);
                    }

                    $gridClass->table($table);
                    $gridClass->CTA($CTA);

                    $_grid[$id . '_' . basename($filename, '.php')] = [
                        'model' => $gridClass->model(),
                        'filter' => (method_exists($gridClass, 'filter')) ? $gridClass->filter() : null,
                        'bottoms' => $bottom->getBottoms(),
                        'rows' => $table->getColumns(),
                        'CTAs' => $CTA->getCalls(),
                    ];
                }
                $outGrids = array_merge($outGrids, $_grid);
            }
        }

        return $outGrids;
    }

    public static function cacheGrids($grids)
    {
        Cache::forever('obelawGrids', $grids);
    }

    public static function manage($modules)
    {
        static::cacheGrids(static::mergeGrids($modules));
    }
}
