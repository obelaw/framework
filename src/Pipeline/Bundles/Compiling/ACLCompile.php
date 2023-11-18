<?php

namespace Obelaw\Framework\Pipeline\Bundles\Compiling;

use Illuminate\Support\Facades\Cache;

class ACLCompile
{
    public $count = 0;

    public function __construct(
        protected $cachePrefix = null,
    ) {
    }

    public function merge($paths)
    {
        $outACL = [];

        foreach ($paths as $id => $path) {
            $pathNavbarFile = $path . DIRECTORY_SEPARATOR . 'etc' . DIRECTORY_SEPARATOR . 'ACL.php';

            if (file_exists($pathNavbarFile)) {
                $outACL = array_merge($outACL, [$id => require $pathNavbarFile]);
            }
        }

        return $outACL;
    }

    public function cache($ACLs)
    {
        Cache::forever($this->cachePrefix . 'obelawACLs', $ACLs);
    }

    public function manage($paths)
    {
        $ACLs = $this->merge($paths);
        $this->cache($ACLs);
        $this->count = count($ACLs);
    }
}
