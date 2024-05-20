<?php

namespace Obelaw\Permissions\Compiles\Scan\Modules;

use Obelaw\Compiles\Abstracts\Compile;
use Obelaw\UI\Schema\ACL\Section;

class ACLCompile extends Compile
{
    public $driverKey = 'obelawACLs';

    public function scanner($paths)
    {
        $outACL = [];

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
