<?php

namespace Obelaw\Framework\Builder\Build\Navbar;

class Links
{
    private $links = [];

    public function link($icon, $label, $href)
    {
        $link = [
            'icon' => $icon,
            'label' => $label,
            'href' => $href
        ];

        array_push($this->links, $link);

        return $this;
    }

    public function subLinks($icon, $label, $links, $id = null)
    {
        $sub = new SubLinks;

        $links($sub);

        $_links = [
            'id' => $id,
            'icon' => $icon,
            'label' => $label,
            'sublinks' => $sub->getLinks(),
        ];

        array_push($this->links, $_links);

        return $this;
    }

    public function getLinks()
    {
        return $this->links;
    }
}
