<?php

use Obelaw\UI\Schema\Navbar\Links;

return new class
{
    public function navbar(Links $links)
    {
        $links->link(
            icon: 'home-2',
            label: 'Home',
            href: 'obelaw.permissions.home',
        );

        $links->link(
            icon: 'user-shield',
            label: 'Admins',
            href: 'obelaw.permissions.admins.index',
            permission: 'Admins',
        );

        $links->link(
            icon: 'gavel',
            label: 'Rules',
            href: 'obelaw.permissions.rules.index',
            permission: 'Rules',
        );
    }
};
