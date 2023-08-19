<?php

namespace Obelaw\Framework\Pipeline\Bundles\Compiling;

use Illuminate\Support\Facades\Cache;

class ACLCompile
{
    public $count = 0;

    public function __construct(
        protected $cachePrefix = null,
        protected $actives = null
    ) {
    }

    public function merge($paths)
    {
        $outACL = [];

        foreach ($paths as $id => $path) {
            //
            if (is_array($this->actives) && !in_array($id, $this->actives)) {
                continue;
            }

            $pathNavbarFile = $path . DIRECTORY_SEPARATOR . 'etc' . DIRECTORY_SEPARATOR . 'ACL.php';


            if (file_exists($pathNavbarFile)) {
                $outACL = array_merge($outACL, [$id => require $pathNavbarFile]);
            }
        }

        return $outACL;
    }

    public function cache($ACLs)
    {
        Cache::forever($this->cachePrefix . 'obelawACL', $ACLs);
    }

    public function manage($paths)
    {
        $ACLs = $this->merge($paths);
        $this->cache($ACLs);
        $this->count = count($ACLs);
    }
}
