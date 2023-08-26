<?php

namespace Obelaw\Framework\Pipeline\Bundles;

use Illuminate\Support\Facades\Cache;

class BundlesManagement
{
    private $cachePrefix = null;

    private $actives = null;

    private $aliases = [];

    /**
     * Get the value of cachePrefix
     */
    public function getCachePrefix()
    {
        return ($this->cachePrefix) ? $this->cachePrefix . '_' : $this->cachePrefix;
    }

    /**
     * Set the value of cachePrefix
     *
     * @return  self
     */
    public function setCachePrefix($cachePrefix)
    {
        $this->cachePrefix = $cachePrefix;

        return $this;
    }

    /**
     * Get the value of actives
     */
    public function getActives()
    {
        return $this->actives;
    }

    /**
     * Set the value of actives
     *
     * @return  self
     */
    public function setActives(array $actives = [])
    {
        $this->actives = $actives;

        return $this;
    }

    /**
     * Get the value of modules
     */
    public function getModules($id = null)
    {
        $modules = Cache::get($this->getCachePrefix() . 'obelawModules');

        if (!is_null($id) && isset($modules[$id])) {
            return $modules[$id];
        }

        return $modules;
    }

    /**
     * Get the value of forms
     */
    public function getForms($id = null)
    {
        $forms = Cache::get($this->getCachePrefix() . 'obelawForms');

        if (!is_null($id)) {
            return $forms[$id];
        }

        return $forms;
    }

    /**
     * Get the value of grids
     */
    public function getGrids($id = null)
    {
        $grids = Cache::get($this->getCachePrefix() . 'obelawGrids');

        if (!is_null($id)) {
            return $grids[$id];
        }

        return $grids;
    }

    /**
     * Get the value of views
     */
    public function getViews($id = null)
    {
        $views = Cache::get($this->getCachePrefix() . 'obelawViews');

        if (!is_null($id)) {
            return $views[$id];
        }

        return $views;
    }

    /**
     * Get the value of routes
     */
    public function getRoutes()
    {
        return Cache::get($this->getCachePrefix() . 'obelawRoutes');
    }

    /**
     * Get the value of navbars
     */
    public function getNavbars($id = null)
    {
        $navbars = Cache::get($this->getCachePrefix() . 'obelawNavbars');

        if (!is_null($id) && isset($navbars[$id])) {
            return $navbars[$id];
        }

        return $navbars;
    }

    /**
     * Get the value of migrations
     */
    public function getMigrations()
    {
        return Cache::get($this->getCachePrefix() . 'obelawMigration');
    }

    public function hasModule($id)
    {
        $modules = Cache::get($this->getCachePrefix() . 'obelawModules');

        if (isset($modules[$id])) {
            return true;
        }

        return false;
    }

    public function pluginAlias($from, $to)
    {
        $this->aliases = array_merge($this->aliases, [$from => $to]);
    }

    public function getPluginAliases()
    {
        return $this->aliases;
    }
}
