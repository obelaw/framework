<?php

namespace Obelaw\Framework\Pipeline\Bundles\Compiling\Configurations;

use Illuminate\Support\Facades\Cache;
use Obelaw\Framework\Base\ServiceProviderBase;

class ProvidersCompile
{
    public $count = 0;

    public function __construct(
        protected $cachePrefix = null,
    ) {
    }

    public function merge($providers)
    {
        $outProviders = [];

        foreach ($providers as $provider) {
            foreach ($provider as $_provider) {
                if (!in_array($_provider, $outProviders)) {
                    throw_if(!is_subclass_of($_provider, ServiceProviderBase::class), 'This ' . $_provider . ' is not extends from ' . ServiceProviderBase::class);
                    array_push($outProviders, $_provider);
                }
            }
        }

        return $outProviders;
    }

    public function cache($providers)
    {
        Cache::forever($this->cachePrefix . 'obelawProviders', $providers);
    }

    public function manage($paths)
    {
        $providers = $this->merge($paths);
        $this->cache($providers);
        $this->count = count($providers);
    }
}
