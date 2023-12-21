<?php

namespace Obelaw\Framework\Base\Traits;

use Obelaw\Framework\Facades\Bundles;

trait ObelawRegisterProvoiders
{
    protected function registerProvoiders()
    {
        try {
            if ($providers = Bundles::getProviders()) {
                foreach ($providers as $provider) {
                    $this->app->register($provider);
                }
             }
        } catch (\Throwable $th) {
            if (!$this->app->runningInConsole()) {
                throw $th;
            }
        }
    }
}
