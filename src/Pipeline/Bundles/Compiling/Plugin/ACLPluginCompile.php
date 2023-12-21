<?php

namespace Obelaw\Framework\Pipeline\Bundles\Compiling\Plugin;

use Illuminate\Support\Facades\Cache;
use Obelaw\Framework\Builder\Build\Permission\Section;

class ACLPluginCompile
{
    public $count = 0;

    public function __construct(
        protected $cachePrefix = null,
    ) {
    }

    public function merge($paths)
    {
        $outACL = Cache::get($this->cachePrefix . 'obelawACLs', []);

        foreach ($paths as $id => $path) {
            $pathACLFile = $path . DIRECTORY_SEPARATOR . 'etc' . DIRECTORY_SEPARATOR . 'ACL.php';

            if (file_exists($pathACLFile)) {

                $ACLClass = include($pathACLFile);
                $ACLClass = new $ACLClass;

                $section = new Section;

                $ACLClass->permissions($section);

                $outACL = array_merge($outACL, [$id => $section->getSection()]);
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
