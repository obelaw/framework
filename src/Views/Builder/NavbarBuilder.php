<?php

namespace Obelaw\Framework\Views\Builder;

use Illuminate\View\Component;
use Illuminate\View\View;
use Obelaw\Facades\Bundles;
use Obelaw\Framework\Pipeline\Identification\Identifier;

class NavbarBuilder extends Component
{
    public $links = [];

    /**
     * Create the component instance.
     *
     * @param  string  $type
     * @param  string  $message
     * @return void
     */
    public function __construct($id = null)
    {
        if ($module = Identifier::getModule()) {
            $id = $module['id'];
        }

        if (is_null($id)) {
            throw new \Exception('You must select the module id to show a navbar');
        }

        $this->links = Bundles::getNavbars($id);
    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('obelaw::builder.navbar');
    }
}
