<?php

namespace Obelaw\Framework\Pipeline\Bundles\Compiling;

use Illuminate\Support\Facades\Cache;
use Obelaw\Framework\Builder\Build\Grid\Bottom;
use Obelaw\Framework\Builder\Build\Grid\CTA;
use Obelaw\Framework\Builder\Build\Grid\Table;
use Obelaw\Framework\Contracts\Builder\Grid\WhereBuilder;

class GridsCompile
{
    public $count = 0;

    public function __construct(
        protected $cachePrefix = null,
    ) {
    }

    public function mergeGrids($paths)
    {
        $outGrids = [];

        foreach ($paths as $id => $path) {
            $_grid = [];

            if (is_dir($path . DIRECTORY_SEPARATOR . 'etc/grids')) {
                foreach (glob($path . DIRECTORY_SEPARATOR . 'etc/grids/*.php') as $filename) {
                    $gridClass = include($filename);
                    $gridClass = new $gridClass;

                    if (property_exists($gridClass, 'where')) {

                        if (!new $gridClass->where instanceof WhereBuilder) {
                            throw new \Exception('This `' . $gridClass->where . '` must have `WhereBuilder`');
                        }

                        $where = $gridClass->where;
                    }

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
                        'where' => $where ?? null,
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

    public function cacheGrids($grids)
    {
        Cache::forever($this->cachePrefix . 'obelawGrids', $grids);
    }

    public function manage($paths)
    {
        $grids = $this->mergeGrids($paths);
        $this->cacheGrids($grids);
        $this->count = count($grids);
    }
}
