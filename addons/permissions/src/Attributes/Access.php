<?php

namespace Obelaw\Permissions\Attributes;

use Attribute;

#[Attribute]
final class Access
{
    public function __construct(
        public string $permission
    ) {
    }
}
