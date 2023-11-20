<?php

namespace Obelaw\Framework\ACL\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_CLASS)]
final class PermissionAccess
{
    public function __construct(
        public string $permission
    ) {
    }
}
