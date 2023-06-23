<?php

namespace Obelaw\Framework\Views\Layout;

use Illuminate\View\Component;
use Illuminate\View\View;

class DashboardLayout extends Component
{
    /**
     * The alert message.
     *
     * @var string
     */
    public $modules;

    /**
     * Create the component instance.
     *
     * @param  string  $type
     * @param  string  $message
     * @return void
     */
    public function __construct()
    {
        $this->modules = \Obelaw\Framework\Registrar::getListModules();
    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('obelaw::layouts.dashboard');
    }
}
