<?php

namespace Obelaw\Framework\ACL\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_METHOD)]
final class PermissionDelete
{
    public function __construct(
        public string $permission
    ) {
    }
}
