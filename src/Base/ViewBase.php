<?php

namespace Obelaw\Framework\Base;

use Illuminate\Support\Str;
use Livewire\Component;
use Obelaw\Framework\Facades\Bundles;

abstract class ViewBase extends Component
{
    protected $pretitle = 'Pre Title View';
    protected $title = 'Title View';
    protected $paginationTheme = 'bootstrap';

    private $view = null;
    private $buttons = null;

    public function boot()
    {
        $view = Bundles::getViews($this->viewId);

        $this->view = $view['tabs'];
        $this->buttons = $view['buttons'];
    }

    public function preTitle()
    {
        return Str::contains($this->pretitle, '::views') ? __($this->pretitle) : $this->pretitle;
    }

    public function title()
    {
        return Str::contains($this->title, '::views') ? __($this->title) : $this->title;
    }

    public function render()
    {
        return view('obelaw::builder.build.view', [
            'pretitle' => $this->preTitle(),
            'title' => $this->title(),
            'buttons' => $this->buttons,
            'tabs' => array_keys($this->view),
            'components' => $this->view,
            'parameters' => $this->parameters,
        ])->layout($this->layout());
    }

    protected function parameters(array $parameters = [])
    {
        $this->parameters = $parameters;
    }

    protected function layout()
    {
        //
    }
}
