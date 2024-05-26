<?php

namespace Obelaw\Permissions\Compiles\Scan\Plugins;

use Obelaw\Facades\Bundles;
use Obelaw\Permissions\Compiles\Scan\Modules\ACLCompile;
use Obelaw\UI\Schema\ACL\Section;

class ACLPluginCompile extends ACLCompile
{
    public function scanner($paths)
    {
        $outACL = Bundles::getACLs();

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
}
